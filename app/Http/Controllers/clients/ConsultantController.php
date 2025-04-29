<?php

namespace App\Http\Controllers\clients;

use App\Enums\ConsultantStatus;
use App\Http\Controllers\Controller;
use App\Models\Consultants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultantController extends Controller
{
    public function store(Request $request)
    {
        try {
            if (!Auth::check()) {
                return redirect(route('error.unauthorized'));
            }
            $consultant = new Consultants();

            $full_name = $request->input('full_name');
            $email = $request->input('email');
            $phone = $request->input('phone');

            $user_id = Auth::user()->id;

            $service_required = $request->input('service_required');
            $notes = $request->input('notes');

            $status = ConsultantStatus::PENDING();

            $consultant->full_name = $full_name;
            $consultant->email = $email;
            $consultant->phone = $phone;

            $consultant->user_id = $user_id;

            $consultant->service_required = $service_required;
            $consultant->notes = $notes;

            $consultant->status = $status;
            $consultant->save();

            toast('Cảm ơn bạn đã tin tưởng. Chúng tôi sẽ sớm liên hệ báo giá nhanh nhất!', 'success', 'top-right');
            return redirect()->route('home');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error', 'top-right');
            return redirect()->back();
        }
    }
}
