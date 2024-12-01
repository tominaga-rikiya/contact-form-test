<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 他のシーダーを呼び出すことができます
        $this->call([
            ContactSeeder::class,
            CategorySeeder::class
            // 例: UserSeeder::class,
        ]);
    }
}
