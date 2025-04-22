<?php

namespace App\Http\Controllers\admin;

use App\Enums\PurchaseStatus;
use App\Http\Controllers\Controller;
use App\Models\Purchases;
use Illuminate\Http\Request;

class AdminPurchaseController extends Controller
{
    public function list()
    {
        $purchases = Purchases::where('status', '!=', PurchaseStatus::DELETED())
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.purchases.list', compact('purchases'));
    }

    public function detail($id)
    {
        $purchase = Purchases::find($id);

        if (!$purchase || $purchase->status == PurchaseStatus::DELETED()) {
            return redirect()->route('error.not.found');
        }
        return view('admin.pages.purchases.detail', compact('purchase'));
    }

    public function update($id, Request $request)
    {
        try {
            $purchase = Purchases::find($id);

            if (!$purchase || $purchase->status == PurchaseStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $status = $request->input('status');

            $purchase->status = $status;
            $purchase->save();

            toast('Purchase updated successfully!', 'success', 'top-right');
            return redirect()->route('admin.purchases.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $purchase = Purchases::find($id);

            if (!$purchase || $purchase->status == PurchaseStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $purchase->status = PurchaseStatus::DELETED();
            $purchase->save();

            toast('Purchase deleted successfully!', 'success', 'top-right');
            return redirect()->route('admin.purchases.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
