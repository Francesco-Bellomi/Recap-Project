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
        $elements = ['rosso' , 'blu' , 'verde' , 'nero', 'grigio' ,'bianco' , 'rosa' , 'giallo' ,'blallo' , 'viola', 'gianniCeleste', 'arancione' ];

        foreach ($elements as $color) {
            
            DB::table('colors')->insert([
                'name'=>$color,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }

        $elements = ['1' , '2' , '3', '4' ,'5' , '6' , '7' ,'8' , '9', '10', '10+' ];

        foreach ($elements as $element) {
            
            DB::table('elements')->insert([
                'name'=>$element,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
        

    }
}
