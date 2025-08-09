<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expense;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Arr;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = Category::pluck('id')->toArray();
        for ($i = 1; $i <= 20; $i++) {
            Expense::create([
                'amount' => rand(10, 500),
                'category_id' => Arr::random($categories),
                'description' => 'Expense ' . $i,
                'date' => now()->subDays(rand(0, 30)),
                'user_id' => $user ? $user->id : 1,
            ]);
        }
    }
}
