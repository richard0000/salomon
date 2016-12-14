<?php

use Illuminate\Database\Seeder;

class meses_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meses')->insert([
            'descripcion' => 'enero'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'febrero'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'marzo'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'abril'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'mayo'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'junio'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'julio'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'agosto'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'septiembre'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'octubre'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'noviembre'
        ]);

        DB::table('meses')->insert([
            'descripcion' => 'diciembre'
        ]);
    }
}
