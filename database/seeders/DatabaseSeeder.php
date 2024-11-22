<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            $gender = '';
            if(($i % 2) != 0){
                $gender = 'F';
            }else{
                $gender = 'M';
            }

            $year = date('Y');
            $birthdate = (($year - 25) + $i) . '1010';

            \App\Models\User::factory()->create([
                'username' => 'Sample' . $i,
                'firstname' => 'Sample',
                'middlename' => '(Testing)',
                'lastname' => 'Account ' . $i,
                'handle' => '@sample' . $i,
                'email' => 'sample'.$i.'@example.com',
                'password_hash' => bcrypt('sample'.$i),
                'birthdate' => $birthdate,
                'gender' => $gender,
                'country' => 'Philippines',
                'type' => 'test',
                'description' => 'Test Account ' . $i . '. For testing purposes only.'
            ]);
        }
        
    }
}
