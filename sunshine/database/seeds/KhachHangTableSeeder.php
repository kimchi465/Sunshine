<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Tài Khoản 1", "Tài Khoản 2", "Tài Khoản 3"];
        $types2 = ["1343", "2456", "9473"];
        $types3 = ["aaa", "bbb", "ccc"];
        $types4 = ["a@gmail.com", "b@gmail.com", "c@gmail.com"];
        //$types5 = ["1986", "1992", "1990"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
       // $day = new DateTime1('1992-01-01');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'kh_ma'      => $i,
                'kh_taikhoan'     => $types[$i-1],
                'kh_matkhau'     => $types2[$i-1],
                'kh_hoten'     => $types3[$i-1],
                'kh_email'     => $types4[$i-1],
                //'kh_ngaySinh' => $day[$i-1]->format('Y-m-d'),
                'kh_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'kh_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_khachhang')->insert($list);
    }
}
