<?php

use Illuminate\Database\Seeder;

class MauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Mẫu 1", "Mẫu 2", "Mẫu 3", "Mẫu 4", "Mẫu 5"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'm_ma'      => $i,
                'm_ten'     => $types[$i-1],
                'm_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'm_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_mau')->insert($list);
    }
}
