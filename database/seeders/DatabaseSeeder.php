<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminName = Config::get('admin.name');
        $adminEmail = Config::get('admin.email');
        $adminPassword = Config::get('admin.password');

        $adminUser = User::query()->where('is_admin', true)->orderBy('id')->first();

        if ($adminUser) {
            $adminUser->name = $adminName;
            $adminUser->email = $adminEmail;
            $adminUser->is_admin = true;
            $adminUser->password = $adminPassword;
            $adminUser->save();
        } else {
            User::query()->create([
                'name' => $adminName,
                'email' => $adminEmail,
                'password' => $adminPassword,
                'is_admin' => true,
            ]);
        }
    }
}
