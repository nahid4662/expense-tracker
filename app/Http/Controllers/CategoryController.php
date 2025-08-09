<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // Use the same form for create and edit
        return view('categories.form');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->create($request->validated(), Auth::id());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        // Use the same form for create and edit
        return view('categories.form', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryService->update($category, $request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
