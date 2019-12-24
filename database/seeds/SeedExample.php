<?php

use Illuminate\Database\Seeder;

class SeedExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert(
            [
                ['name'=>'ဝန်ထမ်း','department_type'=>'r'],
            ]);
    }
}
