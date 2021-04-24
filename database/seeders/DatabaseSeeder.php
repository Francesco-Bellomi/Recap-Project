<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['rosso' , 'blu' , 'verde' , 'nero', 'grigio' ,'bianco' , 'rosa' , 'giallo' ,'blallo' , 'viola', 'gianniCeleste', 'arancione' ];

        foreach ($colors as $color) {
            
            DB::table('colors')->insert([
                'name'=>$color,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }

        

    }
}
