<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{       
        $this->call(CategorySeeder::class);
        \App\Models\Contact::factory(35)->create();
    }
}
