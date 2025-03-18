<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RehashPasswords extends Command
{
    protected $signature = 'rehash:passwords';
    protected $description = 'Rehash all user passwords in the database';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }

        $this->info('Passwords rehashed successfully.');
    }
}
