<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commentaires')->insert([
            [
                'prenom' => 'Chris',
                'nom' => 'DG',
                'commentaire' => 'Une force de frappe inégalable !'
            ]
        ]);
    }
}
