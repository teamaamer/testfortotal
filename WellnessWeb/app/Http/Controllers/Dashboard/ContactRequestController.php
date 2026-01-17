<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_id'        => 'nullable|exists:accounts,id',
            'device_id'         => 'nullable|exists:devices,id',
            'target_device_id'  => 'nullable|exists:devices,id',
            'message'           => 'required|string',
            'phone'             => 'nullable|string|max:50',
            'email'             => 'nullable|email|max:255',
            'name'              => 'nullable|string|max:255',
            'type'              => 'required|in:trade_in,support,contact',
            'problem_type'      => 'nullable|string|max:255',
            'city'              => 'nullable|string|max:255',
            'country'           => 'nullable|string|max:255',
        ]);

        $contact = ContactRequest::create($validated);

        return response()->json([
            'message' => 'Contact request submitted successfully',
            'data' => $contact,
        ], 201);
    }

     public function index()
    {
        return view('dashboard.contactrequest.index');
    }


    /**
     * Show a single request.
     */
    public function show(ContactRequest $contactRequest)
    {
        return view('dashboard.contactrequest.show')->with(compact('contactRequest'));
    }
}
