<?php

namespace App\Http\Controllers\clients;

use App\Enums\AttributeStatus;
use App\Enums\CategoryStatus;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Properties;

class ProductController extends Controller
{
    public function list()
    {
        $categories = Categories::where('status', CategoryStatus::ACTIVE())->orderByDesc('id')->get();
        $products = Products::where('status', ProductStatus::ACTIVE())->orderByDesc('id')->paginate(24);

        $news_products = Products::where('status', ProductStatus::ACTIVE())->orderByDesc('id')->limit(4)->get();

        $attributes = Attributes::where('status', AttributeStatus::ACTIVE())
            ->orderByDesc('id')
            ->cursor()
            ->map(function ($item) {
                $attribute = $item->toArray();

                $properties = Properties::where('attribute_id', $item->id)
                    ->orderByDesc('id')
                    ->get();

                $attribute['properties'] = $properties->toArray();

                return $attribute;
            })->toArray();

        return view('clients.pages.shop', compact('products', 'categories', 'news_products', 'attributes'));
    }

    public function detail($id)
    {
        $product = Products::find($id);
        if (!$product || $product->status !== ProductStatus::ACTIVE()) {
            return redirect()->route('error.not.found');
        }
        return view('clients.pages.product-detail');
    }
}
