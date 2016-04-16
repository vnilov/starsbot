<?php

use Illuminate\Database\Seeder;

class BotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bot')->insert([
            'name'  => 'stars365_bot',
            'token' => '212227548:AAE-5XX0gjPZ-YxNIIszEMwuxk2sVc0FZC4'
        ]);
    }
}
