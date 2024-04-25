<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['user', 'image'])
        ->where('expert_id', null)
        ->orderBy('created_at', 'desc')
        ->get();
        //dd($complaints);


        $expertId = Expert::where('user_id', Auth::id())->first()->id;
        $aprovetComplaints = Complaint::where('expert_id',$expertId)->with(['user', 'image'])->get();
        $ComplaintsCount = Complaint::where('expert_id',$expertId)->count();


        $count = Complaint::where('expert_id', null)->count();




        return view ('expert.index',compact('complaints','count','aprovetComplaints','ComplaintsCount'));
    }

    public function approve(Request $request)
    {
        try {

            // Validate request data
            $request->validate([
                'complaint_id' => 'required|exists:complaints,id',
            ]);

            // Find the complaint by ID
            $complaint = Complaint::findOrFail($request->complaint_id);
            $expert = Expert::where('user_id', Auth::id())->firstOrFail();

            // Update the complaint status and expert ID
            $complaint->status = 'approved';
            $complaint->expert_id = $expert->id; // Set expert_id to the ID of the authenticated user's expert profile
            $complaint->save();

            // Return a success response
            return response()->json(['message' => 'Complaint approved successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => 'Failed to approve complaint'], 500);
        }
    }}
