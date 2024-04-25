<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveComplaintController extends Controller
{
    public function index($id)

    {
        $complaint = Complaint::with('user', 'image')->findOrFail($id);

       // dd($complaint);

        return view('expert.aproveComplainte', compact('complaint'));
    }

}
