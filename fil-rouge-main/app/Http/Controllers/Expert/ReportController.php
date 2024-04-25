<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'complaint_id' => 'required|exists:complaints,id',
            'summary' => 'required|string',
            'findings' => 'required|string',
            'recommendations' => 'nullable|string',
        ]);

        // Create a new Report record
        $report = Report::create($validatedData);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Report created successfully.');
    }
}
