<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPropertyController extends Controller
{
    public function list()
    {
        return view('admin.pages.properties.list');
    }

    public function detail($id)
    {
        return view('admin.pages.properties.detail');
    }

    public function create()
    {
        return view('admin.pages.properties.create');
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
