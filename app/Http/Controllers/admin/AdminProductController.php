<?php

namespace App\Http\Controllers\admin;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function list()
    {
        $products = Products::where('status', '!=', ProductStatus::DELETED())
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.products.list', compact('products'));
    }

    public function detail($id)
    {
        return view('admin.pages.products.detail');
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        try {

        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {

        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {

        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
