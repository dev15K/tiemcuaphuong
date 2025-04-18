<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function list()
    {
        return view('admin.pages.orders.list');
    }

    public function detail()
    {
        return view('admin.pages.orders.detail');
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
