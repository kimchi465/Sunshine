<?php

use Illuminate\Database\Seeder;

class ThanhToanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Thanh toán 1", "Thanh toán 2", "Thanh toán 3"];
        $types2 = ["aaa 1", "bbb 2", "ccc 3"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'tt_ma'      => $i,
                'tt_ten'     => $types[$i-1],
                'tt_dienGiai'     => $types2[$i-1],
                'tt_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'tt_capNhat'  => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_thanhtoan')->insert($list);
    }
}
