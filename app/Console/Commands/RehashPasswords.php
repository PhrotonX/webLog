<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rehash-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'App\Console\Commands\RehashPasswords';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach($users as $user){
            if(!Hash::needsRehash($user->password_hash)){
                $user->password_hash = Hash::make($user->password_hash);
                $user->save();
            }
        }

        $this->info("Rehashing completed.");

        return 0;
    }
}
