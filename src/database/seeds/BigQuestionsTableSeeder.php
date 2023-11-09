<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Factory as FakerFactory;

class BigQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $params = [
        //     [
        //         'name' => '東京の難読地名クイズ',
        //     ],
        //     [
        //         'name' => '広島の難読地名クイズ',
        //     ],
        // ];

        // $now = Carbon::now();

        // foreach ($params as $param) {
        //     $param['created_at'] = $now;
        //     $param['updated_at'] = $now;
        //     DB::table('big_questions')->insert($param);
        // }

        $faker = FakerFactory::create(); // Fakerのインスタンスを初期化

        $now = Carbon::now();

        for ($i = 1; $i <= 10; $i++) { // 10個のテストデータを生成する例
            $data = [
                'name' => $faker->sentence, // ダミーの文章を生成
                'created_at' => $now,
                'updated_at' => $now,
            ];

            DB::table('big_questions')->insert($data);
        }
    }
}
