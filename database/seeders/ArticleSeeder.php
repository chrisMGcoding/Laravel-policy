<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'titre' => 'Un été à Bruxelles',
                'url' => '/',
                'description' => "De quoi remplir votre agenda si vous passez l'été à Bruxelles !",
            ]
        ]);
    }
}
