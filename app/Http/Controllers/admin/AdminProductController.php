<?php

namespace App\Http\Controllers\admin;

use App\Enums\AttributeStatus;
use App\Enums\CategoryStatus;
use App\Enums\CategoryType;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Categories;
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
        $product = Products::find($id);
        if (!$product || $product->status == ProductStatus::DELETED()) {
            return redirect()->route('error.not.found');
        }

        $categories = Categories::where('type', CategoryType::PRODUCTS())
            ->where('status', CategoryStatus::ACTIVE())
            ->orderByDesc('id')
            ->get();

        $attributes = Attributes::where('status', '!=', AttributeStatus::DELETED())
            ->orderByDesc('id')
            ->get();

        $properties = Attributes::where('status', '!=', AttributeStatus::DELETED())
            ->orderByDesc('id')
            ->get();
        return view('admin.pages.products.detail', compact('product', 'categories', 'attributes', 'properties'));
    }

    public function create()
    {
        $categories = Categories::where('type', CategoryType::PRODUCTS())
            ->where('status', CategoryStatus::ACTIVE())
            ->orderByDesc('id')
            ->get();

        $attributes = Attributes::where('status', '!=', AttributeStatus::DELETED())
            ->orderByDesc('id')
            ->get();

        $properties = Attributes::where('status', '!=', AttributeStatus::DELETED())
            ->orderByDesc('id')
            ->get();

        return view('admin.pages.products.create', compact('categories', 'attributes', 'properties'));
    }

    public function store(Request $request)
    {
        try {
            $product = new Products();

            $product = $this->saveProduct($request, $product);
            $product->save();

            toast('Product created successfully!', 'success', 'top-right');
            return redirect()->route('admin.products.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $product = Products::find($id);
            if (!$product || $product->status == ProductStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $product = $this->saveProduct($request, $product);
            $product->save();

            toast('Product updated successfully!', 'success', 'top-right');
            return redirect()->route('admin.products.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $product = Products::find($id);
            if (!$product || $product->status == ProductStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $product->status = ProductStatus::DELETED();
            $product->save();
            toast('Product deleted successfully!', 'success', 'top-right');
            return redirect()->route('admin.products.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    private function saveProduct(Request $request, Products $product)
    {
        return $product;
    }
}
