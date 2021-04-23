<?php

use Illuminate\Database\Seeder;

class PrefsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefs')->delete();
        DB::table('prefs') -> insert([
            ['id' => 1, 'name' => '札幌市'],
            ['id' => 2, 'name' => '青森市'],
            ['id' => 3, 'name' => '盛岡市'],
            ['id' => 4, 'name' => '仙台市'],
            ['id' => 5, 'name' => '秋田市'],
            ['id' => 6, 'name' => '山形市'],
            ['id' => 7, 'name' => '福島市'],
            ['id' => 8, 'name' => '水戸市'],
            ['id' => 9, 'name' => '宇都宮市'],
            ['id' => 10, 'name' => '前橋市'],
            ['id' => 11, 'name' => 'さいたま市'],
            ['id' => 12, 'name' => '千葉市'],
            ['id' => 13, 'name' => '新宿区', '渋谷区', '世田谷区', '杉並区', '港区'],
            ['id' => 14, 'name' => '横浜市', '川崎市'],
            ['id' => 15, 'name' => '新潟市'],
            ['id' => 16, 'name' => '富山市'],
            ['id' => 17, 'name' => '金沢市'],
            ['id' => 18, 'name' => '福井市'],
            ['id' => 19, 'name' => '甲府市'],
            ['id' => 20, 'name' => '長野市'],
            ['id' => 21, 'name' => '岐阜市'],
            ['id' => 22, 'name' => '静岡市'],
            ['id' => 23, 'name' => '名古屋市'],
            ['id' => 24, 'name' => '津市'],
            ['id' => 25, 'name' => '大津市'],
            ['id' => 26, 'name' => '京都府'],
            ['id' => 27, 'name' => '大阪市'],
            ['id' => 28, 'name' => '神戸市'],
            ['id' => 29, 'name' => '奈良市'],
            ['id' => 30, 'name' => '和歌山市'],
            ['id' => 31, 'name' => '鳥取市'],
            ['id' => 32, 'name' => '松江市'],
            ['id' => 33, 'name' => '岡山市'],
            ['id' => 34, 'name' => '広島市'],
            ['id' => 35, 'name' => '山口市'],
            ['id' => 36, 'name' => '徳島市'],
            ['id' => 37, 'name' => '高松市'],
            ['id' => 38, 'name' => '松山市'],
            ['id' => 39, 'name' => '高知市'],
            ['id' => 40, 'name' => '福岡市'],
            ['id' => 41, 'name' => '佐賀市'],
            ['id' => 42, 'name' => '長崎市'],
            ['id' => 43, 'name' => '熊本市'],
            ['id' => 44, 'name' => '大分市'],
            ['id' => 45, 'name' => '宮崎市'],
            ['id' => 46, 'name' => '鹿児島市'],
            ['id' => 47, 'name' => '沖縄県'],
        ]);
    }
}
