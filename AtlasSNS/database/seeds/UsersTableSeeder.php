<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'username' => 'tanaka tarou',
            'mail' => 'tanaka@tarou.ne.jp',
            'password' => 'tanakatanaka',
        ];
        DB::table('users')->insert($param);

        $param = [
            'username' => 'yamada jirou',
            'mail' => 'yamada@jirou.ne.jp',
            'password' => 'yamadayamada',
        ];
        DB::table('users')->insert($param);

        $param = [
            'username' => 'suzuki kouta',
            'mail' => 'suzuki@kouta.ne.jp',
            'password' => 'suzukisuzuki',
        ];
        DB::table('users') -> insert($param);
    }
}
