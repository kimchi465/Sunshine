<?php

use Illuminate\Database\Seeder;

class QuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Xem", "Sửa", "Cập nhật"];
        //$types2 = [];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'q_ma'      => $i,
                'q_ten'     => $types[$i-1],
                //'q_diengiai'     => $types2,
                'q_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'q_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_quyen')->insert($list);
    }
}
