<?php

namespace App\Http\Controllers\admin;

use App\Enums\AttributeStatus;
use App\Enums\PropertyStatus;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Properties;
use Illuminate\Http\Request;

class AdminPropertyController extends Controller
{
    public function list()
    {
        $properties = Properties::where('status', '!=', PropertyStatus::DELETED())
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.properties.list', compact('properties'));
    }

    public function detail($id)
    {
        $property = Properties::find($id);

        if (!$property || $property->status == PropertyStatus::DELETED()) {
            return redirect()->route('error.not.found');
        }

        $attributes = Attributes::where('status', '!=', AttributeStatus::DELETED())->get();

        return view('admin.pages.properties.detail', compact('property', 'attributes'));
    }

    public function create()
    {
        $attributes = Attributes::where('status', '!=', AttributeStatus::DELETED())->get();
        return view('admin.pages.properties.create', compact('attributes'));
    }

    public function store(Request $request)
    {
        try {
            $name = $request->input('name');
            $attribute_id = $request->input('attribute_id');
            $status = $request->input('status');

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('property', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $thumbnail_path = $thumbnail;
            } else {
                toast('Thumbnail is required!', 'error', 'top-right');
                return redirect()->back();
            }

            $property = new Properties();
            $property->name = $name;
            $property->attribute_id = $attribute_id;
            $property->thumbnail = $thumbnail_path;
            $property->status = $status;

            $property->save();

            toast('Property created successfully!', 'success', 'top-right');
            return redirect()->route('admin.properties.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $property = Properties::find($id);

            if (!$property || $property->status == PropertyStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $name = $request->input('name');
            $attribute_id = $request->input('attribute_id');
            $status = $request->input('status');

            $thumbnail_path = $property->thumbnail;
            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('property', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $thumbnail_path = $thumbnail;
            }

            $property->name = $name;
            $property->attribute_id = $attribute_id;
            $property->thumbnail = $thumbnail_path;
            $property->status = $status;

            $property->save();

            toast('Property updated successfully!', 'success', 'top-right');
            return redirect()->route('admin.properties.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $property = Properties::find($id);

            if (!$property || $property->status == PropertyStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $property->status = PropertyStatus::DELETED();
            $property->save();

            toast('Property deleted successfully!', 'success', 'top-right');
            return redirect()->route('admin.properties.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
