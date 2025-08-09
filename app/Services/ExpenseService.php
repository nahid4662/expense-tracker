<?php

namespace App\Services;

use App\Models\Expense;

class ExpenseService
{
    public function create(array $data, int $userId)
    {
        $data['user_id'] = $userId;
        return Expense::create($data);
    }

    public function update(Expense $expense, array $data)
    {
        return $expense->update($data);
    }
}
