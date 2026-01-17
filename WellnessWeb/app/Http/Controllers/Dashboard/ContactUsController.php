<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
            'type'    => 'required|string',
        ]);

        // rename "message" to avoid conflict with Laravel's internal $message
        $validated['userMessage'] = $validated['message'];
        unset($validated['message']);

         $contact = ContactRequest::create([
            'type'    => 'contact', 
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'message' => $validated['userMessage'],
        ]);

        try {
            Mail::send('emails.contact', $validated, function ($mail) use ($validated) {
                $mail->to('mkihmouda@gmail.com')
                    ->from($validated['email'], $validated['name'])
                    ->subject('Contact Form: ' . $validated['type']);
            });

            return response()->json([
                'message' => 'Your message has been sent successfully!',
                'data' => $contact
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to send message: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function maintenance(Request $request)
    {
        $user = auth()->user(); 

        $validated = $request->validate([
            'phone_no'           => 'required|string|max:50',
            'device_id'          => 'required|string|max:255',
        ]);

        $validated['device'] = Device::find($validated['device_id'])->name;

          $contact = ContactRequest::create([
            'account_id' => $user?->account?->id,
            'type'    => 'support', 
            'phone_no'    => $validated['phone_no'],
            'device_id'   => $validated['device_id'],
        ]);

        try {
            Mail::send('emails.support', $validated, function ($mail) use ($validated) {
                $mail->to('mkihmouda@gmail.com')
                    ->from('mkihmouda@gmail.com', 'Maintenance')
                    ->subject('Trade-In & Maintenance');
            });

            return response()->json([
                'message' => 'Your request has been sent successfully!',
                 'data' => $contact
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to send request: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function tradein(Request $request)
    {

        $user = auth()->user(); 

        $validated = $request->validate([
            'phone_no'           => 'required|string|max:50',
            'target_device_id'  => 'required|string|max:255',
        ]);

        $validated['target_device'] = Device::find($validated['target_device_id'])->name;


        $user = auth()->user();

           $contact = ContactRequest::create([
            'account_id' => $user?->account?->id,
            'type'    => 'trade_in', 
            'phone_no'    => $validated['phone_no'],
            'target_device_id'   => $validated['target_device_id'],
        ]);

        try {
            Mail::send('emails.tradein', $validated, function ($mail) use ($validated) {
                $mail->to('mkihmouda@gmail.com')
                    ->from('mkihmouda@gmail.com', 'Trade-In & Maintenance:')
                    ->subject('Trade-In & Maintenance');
            });

            return response()->json([
                'message' => 'Your request has been sent successfully!',
                'data' => $contact
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to send request: ' . $e->getMessage(),
            ], 500);
        }
    }
}
