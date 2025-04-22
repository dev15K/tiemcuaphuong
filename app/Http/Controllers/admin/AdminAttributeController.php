<?php

namespace App\Http\Controllers\admin;

use App\Enums\AttributeStatus;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use Illuminate\Http\Request;

class AdminAttributeController extends Controller
{
    public function list()
    {
        $attributes = Attributes::where('status', '!=', AttributeStatus::DELETED())
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.attributes.list', compact('attributes'));
    }

    public function detail($id)
    {
        $attribute = Attributes::find($id);
        if (!$attribute || $attribute->status == AttributeStatus::DELETED()) {
            return redirect()->route('error.not.found');
        }
        return view('admin.pages.attributes.detail', compact('attribute'));
    }

    public function create()
    {
        return view('admin.pages.attributes.create');
    }

    public function store(Request $request)
    {
        try {
            $name = $request->input('name');
            $status = $request->input('status');

            $attribute = new Attributes();
            $attribute->name = $name;
            $attribute->status = $status;

            $attribute->save();

            toast('Attribute created successfully!', 'success', 'top-right');
            return redirect()->route('admin.attributes.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $attribute = Attributes::find($id);
            if (!$attribute || $attribute->status == AttributeStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $name = $request->input('name');
            $status = $request->input('status');

            $attribute->name = $name;
            $attribute->status = $status;
            $attribute->save();

            toast('Attribute updated successfully!', 'success', 'top-right');
            return redirect()->route('admin.attributes.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $attribute = Attributes::find($id);
            if (!$attribute || $attribute->status == AttributeStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $attribute->status = AttributeStatus::DELETED();
            $attribute->save();

            toast('Attribute deleted successfully!', 'success', 'top-right');
            return redirect()->route('admin.attributes.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
