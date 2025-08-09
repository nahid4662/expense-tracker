<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = [
            'Food', 'Transport', 'Utilities', 'Entertainment', 'Health', 'Education',
            'Shopping', 'Travel', 'Gifts', 'Insurance', 'Savings', 'Other'
        ];
        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'description' => $name . ' related expenses',
                'user_id' => $user ? $user->id : 1,
            ]);
        }
    }
}
