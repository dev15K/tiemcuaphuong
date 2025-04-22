<?php

namespace App\Http\Controllers\admin;

use App\Enums\ConsultantStatus;
use App\Http\Controllers\Controller;
use App\Models\Consultants;
use Illuminate\Http\Request;

class AdminConsultantController extends Controller
{
    public function list()
    {
        $consultants = Consultants::where('status', '!=', ConsultantStatus::DELETED())
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.consultants.list', compact('consultants'));
    }

    public function detail($id)
    {
        $consultant = Consultants::find($id);

        if (!$consultant || $consultant->status == ConsultantStatus::DELETED()) {
            return redirect()->route('error.not.found');
        }

        return view('admin.pages.consultants.detail', compact('consultant'));
    }

    public function update($id, Request $request)
    {
        try {
            $consultant = Consultants::find($id);

            if (!$consultant || $consultant->status == ConsultantStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $status = $request->input('status');
            $consultant->status = $status;
            $consultant->save();

            toast('Consultant updated successfully!', 'success', 'top-right');
            return redirect()->route('admin.consultants.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $consultant = Consultants::find($id);

            if (!$consultant || $consultant->status == ConsultantStatus::DELETED()) {
                return redirect()->route('error.not.found');
            }

            $consultant->status = ConsultantStatus::DELETED();
            $consultant->save();

            toast('Consultant deleted successfully!', 'success', 'top-right');
            return redirect()->route('admin.consultants.list');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
