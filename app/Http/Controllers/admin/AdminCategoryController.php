<?php

namespace App\Http\Controllers\admin;

use App\Enums\CategoryStatus;
use App\Enums\CategoryType;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function list()
    {
        $categories = Categories::where('status', '!=', CategoryStatus::DELETED())
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.categories.list', compact('categories'));
    }

    public function detail($id)
    {
        $category = Categories::find($id);

        if (!$category || $category->status == CategoryStatus::DELETED()) {
            return redirect()->route('error.not.found');
        }
        return view('admin.pages.categories.detail', compact('category'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        try {
            $category = new Categories();
            $name = $request->input('name');

            $category->name = $name;
            $category->status = $request->input('status');
            $category->type = CategoryType::PRODUCTS;

            $category->save();

            toast('Category created successfully!', 'success', 'top-right');
            return redirect()->route('admin.categories.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $category = Categories::find($id);

            if (!$category || $category->status == CategoryStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $category->name = $request->input('name');
            $category->status = $request->input('status');
            $category->save();

            toast('Category updated successfully!', 'success', 'top-right');
            return redirect()->route('admin.categories.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $category = Categories::find($id);

            if (!$category || $category->status == CategoryStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $category->status = CategoryStatus::DELETED();
            $category->save();

            toast('Category deleted successfully!', 'success', 'top-right');
            return redirect()->route('admin.categories.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
