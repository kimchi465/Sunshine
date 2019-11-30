<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChuDeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$list = [];
        $types = ["Chủ đề 1", "Chủ đề 2", "Chủ đề 3", "Chủ đề 4", "Chủ đề 5"];
        sort($types);
        $today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'cd_ma'      => $i,
                'cd_ten'     => $types[$i-1],
                'cd_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'cd_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }*/
        $faker = Faker\Factory::create('vi_VN');
        $now = new Carbon('2019-11-28', 'Asia/Ho_Chi_Minh');
        $list = [];
        for($i=1; $i <= 100; $i++){
            $create = $now->copy()->addSeconds($faker->numberBetween(1, 259200));
            $updated = $create->copy()->addSeconds($faker->numberBetween(300, 172800));

            array_push($list,
            [
                'cd_ten'    =>$faker->text(50),
                'cd_taoMoi' =>$create,
                'cd_capNhat' =>$updated,
                'cd_trangThai' =>2
            ]       
            );
            $now = $updated->copy();
        }

        DB::table('cusc_chude')->insert($list);
    }
}
