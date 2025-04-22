<?php

namespace App\Http\Controllers\clients;

use App\Enums\AttributeStatus;
use App\Enums\PropertyStatus;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function list(Request $request)
    {
        $name = $request->input('name');
        $attribute_id = $request->input('attribute_id');

        $properties = Properties::where('properties.status', '!=', PropertyStatus::DELETED())
            ->orderBy('properties.id', 'desc')
            ->join('attributes', 'properties.attribute_id', '=', 'attributes.id')
            ->where('attributes.status', '!=', AttributeStatus::DELETED());

        if ($name) {
            $properties = $properties->where('properties.name', 'like', '%' . $name . '%');
        }

        if ($attribute_id) {
            $properties = $properties->where('properties.attribute_id', $attribute_id);
        }

        $properties = $properties->select('properties.*', 'attributes.name as attribute_name')->get();
        $data = returnMessage(1, $properties, 'Success!');
        return response()->json($data, 200);
    }
}
