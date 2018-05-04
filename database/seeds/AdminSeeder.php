<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(App\User::class)->create([
                "name" => env('ADMIN_USER', "Roge Melich"),
                "email" => env('ADMIN_EMAIL', "rogermelich@gmail.com"),
                "password" => bcrypt(env('ADMIN_PWD', '123456'))]);
        } catch (\Illuminate\Database\QueryException $exception) {
        }

    }
}
