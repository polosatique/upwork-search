<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'vyacheslav.brazhenenko@gmail.com',
            'password' => Hash::make('vyacheslav1'),
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'administrator']);

        $admin->assignRole($adminRole);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $admin = User::where('email', 'vyacheslav.brazhenenko@gmail.com')->first();
        if ($admin) {
            $admin->delete();
        }
    }
};
