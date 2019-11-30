<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThanhToanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$list = [];
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
        }*/


        $faker = Faker\Factory::create('vi_VN');
        $now = new Carbon('2019-11-28', 'Asia/Ho_Chi_Minh');
        $list = [];

        for($i = 1; $i <= 100; $i++){
            $created = $now->copy()->addSeconds($faker->numberBetween(1, 259200));
            $updated = $now->copy()->addSeconds($faker->numberBetween(300, 172000));

            $data = [
                'tt_ten' => $faker->text(100),
                'tt_diengiai' => $faker->paragraph(),
                'tt_taoMoi' => $created,
                'tt_capNhat' => $updated,
                'tt_trangThai' => $faker->numberBetween(1, 2)
            ];
            array_push($list, $data);
            $now = $updated->copy();
        }
        
        //DB::table('cusc_thanhtoan')->insert($list);
        DB::table('cusc_thanhtoan')->insert($list);
    }
}
