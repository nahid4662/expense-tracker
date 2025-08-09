<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function getAllForUser($userId = null)
    {
        $userId = $userId ?: Auth::id();
        return Category::where('user_id', $userId)->get();
    }

    public function create(array $data)
    {
        $data['user_id'] = $data['user_id'] ?? Auth::id();
        return Category::create($data);
    }

    public function update(Category $category, array $data)
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }
}
