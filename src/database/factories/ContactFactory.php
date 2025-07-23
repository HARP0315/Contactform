<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){

        // tinyint'gender'の日本語変換リスト
        $gender_list = [
            1 => '男性',
            2 => '女性',
            3 => 'その他'
        ];

        //1~3の間でランダム取得
        $gender_list = $this->faker->numberBetween(1, 3);

        // bigint'category_id'の日本語変換リスト
        $category_id = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他',
        ];

        //1~5の間でランダム取得
        $category_id = $this->faker->numberBetween(1, 5);

        // 都道府県市町村番地までのダミーデータ取得準備
        $prefecture = $this->faker->prefecture;
        $city = $this->faker->city();
        $streetAddress = $this->faker->streetAddress();

        return [
            'category_id' => $category_id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $gender_list,
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            // 事前準備したものを結合（都道府県市町村番地）
            'address' => $prefecture . $city . $streetAddress,
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->realText(20)
        ];
    }
}
