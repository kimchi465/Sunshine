<?php

use Illuminate\Database\Seeder;

class XuatXuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Xuất xứ 1", "Xuất xứ 2", "Xuất xứ 3", "Xuất xứ 4", "Xuất xứ 5"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'xx_ma'      => $i,
                'xx_ten'     => $types[$i-1],
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_xuatxu')->insert($list);
    }
}
