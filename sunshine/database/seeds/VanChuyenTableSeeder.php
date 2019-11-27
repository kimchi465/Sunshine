<?php

use Illuminate\Database\Seeder;

class VanChuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Vận chuyển 1", "Vận chuyển 2", "Vận chuyển 3"];
        $types2 = ["ddd", "vvv", "aaaa"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'vc_ma'      => $i,
                'vc_ten'     => $types[$i-1],
                'vc_dienGiai' => $types2[$i-1],
                'vc_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'vc_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_vanchuyen')->insert($list);
    }
}
