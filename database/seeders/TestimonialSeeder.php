<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'nom' => 'CDG',
                'poste' => 'rédacteur',
                'url' => '/',
                'commentaire' => 'Gage de grande qualité !'
            ]
        ]);
    }
}
