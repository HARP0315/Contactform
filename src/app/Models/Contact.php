<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [

            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
    ];

    /**
     * 主テーブル（categorys）よりデータを一つ持ってくる
     *
     * @return void
     */
    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    /**
     * カテゴリIDで絞り込むスコープ
     *
     * @param [object] $query
     * @param [bigint] $category_id
     * @return void
     */
    public function scopeWhereCategoryId($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
        return $query;
    }

    /**
     * 性別で絞り込むスコープ
     *
     * @param [object] $query
     * @param [tinyint] $gender
     * @return void
     */
    public function scopeWhereGender($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
        return $query;
    }

    // TODO 課題：もっとシンプルに書きたいがどうしても検索できず、AIに試行錯誤して書いてもらった
    /**
     * 作成日で絞り込むスコープ
     *
     * @param [object] $query
     * @param [timestamp] $createdAtDate
     * @return void
     */
    public function scopeWhereCreatedAt($query, $createdAtDate)
    {
        if (!empty($createdAtDate)) {
            // 入力された日付文字列 (例: '2025-07-16') をCarbonオブジェクトとしてパース
            $date = Carbon::parse($createdAtDate);

            // その日の午前0時0分0秒 (JST)
            $startOfDay = $date->copy()->startOfDay();
            // その日の午後11時59分59秒 (JST)
            $endOfDay = $date->copy()->endOfDay();

            // ここがポイント: whereBetween を使用し、
            // データベースに保存されている created_at カラム (UTC) が
            // JSTのその日の開始から終了までの範囲内に収まるかを検索
            // Laravel (Eloquent) が、この Carbon オブジェクトを適切に
            // データベースのタイムゾーン (通常UTC) に変換してくれます。
            $query->whereBetween('created_at', [$startOfDay, $endOfDay]);
        }
        return $query;
    }

    /**
     * キーワードで部分マッチ検索するスコープ（OR条件）
     *
     * @param [object] $query
     * @param [string] $keyword
     * @return void
     */
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            // OR 条件をグループ化（キーワード以外も検索している時のために）
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    // CONCAT関数を使って苗字と名前を結合する
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ['%' . $keyword . '%'])
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
        return $query;
    }
}
