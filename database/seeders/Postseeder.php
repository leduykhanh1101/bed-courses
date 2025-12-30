<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class Postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        post::factory()->count(10)->create();
    }
}
