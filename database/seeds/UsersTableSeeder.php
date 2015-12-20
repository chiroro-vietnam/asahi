<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {


        DB::table('users')->truncate();

        DB::table('users')->insert(array(
            array(
                'username'       => 'Admin',
                'name'           => 'admin',
                'email'          => 'admin@chiroro.co.jp',
                'password'       => '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu',
                'remember_token' => '4U8rKiqrMNAQMOfj13UGUmFvmvPsfNfP40EkmsfKuDVT0N9RY69EmiMKEGBT',
                'created_at'     => new DateTime,
                'updated_at'     => new DateTime,               
            ),
            
            array(
                'username'       => 'kyuma',
                'name'           => 'Kyuma ANDO ',
                'email'          => 'kyuma@chiroro.com.vn',
                'password'       => '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu',
                'remember_token' => '4U8rKiqrMNAQMOfj13UGUmFvmvPsfNfP40EkmsfKuDVT0N9RY69EmiMKEGBT',
                'created_at'     => new DateTime,
                'updated_at'     => new DateTime,               
            ),

            array(
                'username'      => 'urakami',
                'name'          => 'Urakami Yuzo',
                'email'         => 'urakami@chiroro.co.jp',
                'password'       => '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu',
                'remember_token' => '4U8rKiqrMNAQMOfj13UGUmFvmvPsfNfP40EkmsfKuDVT0N9RY69EmiMKEGBT',
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime,
            )
        ));
    }
}
