<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Carbon\Carbon;

class UserController extends Controller
{
    protected $genderMap = [
        '1' => '男性',
        '2' => '女性',
        '3' => 'その他',
    ];

    public function index()
    {
        // カテゴリ選択用
        $categories = Category::all();
        // 性別マップをビューに渡す
        $genderMap = $this->genderMap;

        // お問い合わせデータをページネーションして取得（検索条件なし）
        $contacts = Contact::with('category')->paginate(7);

        return view('admin', compact('contacts','categories','genderMap'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $genderMap = $this->genderMap;

        //検索条件の取得
        $keyword = $request->input('keyword');
        $category_id = $request->input('category_id');
        $gender = $request->input('gender');
        $created_at = $request->input('created_at');

        // クエリビルダの初期化とスコープ適用
        $query = Contact::with('category'); // カテゴリ情報も取得

        $query->keywordSearch($keyword)         // キーワード検索スコープ
            ->whereCategoryId($category_id)   // カテゴリIDスコープ
            ->whereGender($gender)            // 性別スコープ
            ->whereCreatedAt($created_at);     // 作成日スコープ

        // ページネーション
        $contacts = $query->paginate(7);

        return view('admin', compact('contacts','categories','genderMap'));
    }

    public function destroy(Contact $contact) // 引数名はルーティングの {contact}と揃える
    {

        // Contact::find($contact->id)->delete();
        $contact->delete();

        // 削除後、adminページにリダイレクトする例
        return redirect('admin');
    }

    public function exportCsv(Request $request)
    {
        // === 1. リクエストから検索条件を取得 ===
        $keyword = $request->input('keyword');
        $category_id = $request->input('category_id');
        $gender = $request->input('gender');
        $created_at = $request->input('created_at'); // YYYY-MM-DD 形式を想定

        // === 2. データベースから条件に合うデータを取得 ===
        // index メソッドと同様の検索ロジックを適用
        $query = Contact::with('category'); // N+1問題回避

        $query->keywordSearch($keyword); // Contactモデルに定義したスコープ
        $query->whereCategoryId($category_id);
        $query->whereGender($gender);
        $query->whereCreatedAt($created_at);

        $contacts = $query->get(); // ページネーションは不要なのでget()

        // === 3. CSVファイルとしてダウンロードさせるためのヘッダー設定 ===
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8', // CSVであることを示す
            'Content-Disposition' => 'attachment; filename="inquiries_' . Carbon::now()->format('YmdHis') . '.csv"', // ダウンロード時のファイル名
            'Pragma' => 'no-cache', // キャッシュさせない
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // === 4. CSVデータ生成のコールバック関数 ===
        // ストリーム形式でメモリ消費を抑えながら出力
        $callback = function () use ($contacts) {
            $file = fopen('php://output', 'w'); // 出力ストリームを開く

            // Excelでの文字化け対策（BOM: Byte Order Mark）
            fwrite($file, "\xEF\xBB\xBF");

            // CSVのヘッダー行を書き込む
            // データベースのカラム名や表示したい日本語名に合わせて調整
            fputcsv($file, [
                'ID',
                '姓',
                '名',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせ種類',
                'お問い合わせ内容',
                '作成日時'
            ]);

            // 性別変換マップをCSV生成内でも使えるようにする（コントローラのプロパティから取得）
            $genderMap = $this->genderMap;

            // 各お問い合わせデータをCSV行として書き込む
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->last_name,
                    $contact->first_name,
                    // 性別を文字列に変換して出力
                    $genderMap[$contact->gender] ?? '不明',
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    // カテゴリ名をリレーションから取得して出力
                    $contact->category->content ?? 'カテゴリなし',
                    $contact->detail,
                    $contact->created_at->format('Y/m/d H:i:s'), // 日時フォーマット
                ]);
            }

            fclose($file); // ファイルストリームを閉じる
        };

        // === 5. レスポンスとしてCSVをダウンロードさせる ===
        return response()->stream($callback, 200, $headers);
    }
}
