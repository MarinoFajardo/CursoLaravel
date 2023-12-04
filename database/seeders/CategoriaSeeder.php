<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Categoria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for($i = 0; $i < 20; $i++){
            Categoria::create(
                [
                    'title' => "Categoria $i",
                    'slug' =>  "categoria-$i" 
                ]
                );
        }
    }
}
