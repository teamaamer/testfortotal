<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AccountsController extends Controller
{
    public function index()
    {
        return view('dashboard.accounts.index');
    }

    public function show(Account $account)
    {

        if (auth()->id() != $account->user->id && !auth()->user()->hasAnyRole(['admin', 'center'])) {
            abort(403);
        }

        return view('dashboard.accounts.show')->with(compact('account'));
    }

    public function create()
    {
        return view('dashboard.accounts.create_edit');
    }

    public function edit(Account $account)
    {

         if (auth()->id() != $account->user->id && !auth()->user()->hasRole('admin')) {
            abort(403);
        }

        return view('dashboard.accounts.create_edit')->with(compact('account'));
    }

    public function store(AccountRequest $request)
    {
        $avatar = 'avatar.png';

        if ($request->hasFile('avatar')) {

            $destinationPath = base_path('uploads/avatars');

            // Generate new name
            $avatar = hash('sha256', mt_rand()) . '.' . $request->file('avatar')->getClientOriginalExtension();

            // Move original file
            $request->file('avatar')->move($destinationPath, $avatar);

            // Resize using Intervention Image V3
            $manager = new ImageManager(new Driver());

            $imagePath = $destinationPath . '/' . $avatar;
            $image = $manager->read($imagePath);

            // Resize (fit) to 300x300 — use whatever size you want
            $image->coverDown(300, 300);

            // Save final avatar
            $image->save($imagePath);
        }


        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        $user->save();


        $account = Account::create([
            'avatar' => $avatar,
            'status' => $request->status,
            'summary' => $request->summary,
            'name' =>  $request->name,
            'user_id' => $user->id,
            // Address info (Card 2)
            'address'           => $request->address,
            'city'              => $request->city,
            'state'             => $request->state,
            'zip_code'          => $request->zip_code,
            'country'           => $request->country,

            // Education / Employment info (Card 3)
            'department'        => $request->department,
            'job_title'         => $request->job_title,
            'degree'            => $request->degree,
            'specialty'         => $request->specialty,
            'state_of_license'  => $request->state_of_license,
            'certifying_board'  => $request->certifying_board,
        ]);

        $account->save();

        return redirect('dashboard/accounts/' . $account->id)->with('success', $account->name . ' has been Created Successfully');
    }

    public function update(AccountRequest $request, Account $account)
    {
        $account->name = $request->input('name');
        $account->user->role = $request->input('role');
        $account->summary = $request->input('summary');
        $account->user->email = $request->input('email');
        $account->status = $request->input('status');

        if ($request->hasFile('avatar')) {

            $destinationPath = base_path('../uploads/avatars');

            // delete old file if not default
            if ($account->avatar != "../uploads/avatars/avatar.png") {
                @unlink(base_path($account->avatar));
            }

            $avatar = hash('sha256', mt_rand()) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move($destinationPath, $avatar);

            // Correct Intervention Image V3 usage
            $manager = new ImageManager(new Driver());

            $imagePath = base_path('../uploads/avatars/' . $avatar);
            $image = $manager->read($imagePath);

            // example of resize (coverDown = crop+fit)
            $image->coverDown(300, 300); // adjust as needed

            $image->save($imagePath);

            $account->avatar =  $avatar;
        }

        // --- Address Info (Card 2) ---
        $account->address  = $request->input('address');
        $account->city     = $request->input('city');
        $account->state    = $request->input('state');
        $account->zip_code = $request->input('zip_code');
        $account->country  = $request->input('country');

        // --- Education / Employment Info (Card 3) ---
        $account->department        = $request->input('department');
        $account->job_title         = $request->input('job_title');
        $account->degree            = $request->input('degree');
        $account->specialty         = $request->input('specialty');
        $account->state_of_license  = $request->input('state_of_license');
        $account->certifying_board  = $request->input('certifying_board');

        $account->save();
        $account->user->save();

        return redirect('dashboard/accounts/' . $account->id)->with('success', $account->full_name . ' has been updated Successfully');
    }

    public function destroy(Request $request, Account $account)
    {

        $account->user->delete();
        $account->delete();
        return redirect('dashboard/accounts/')->with('success', $account->name . ' has been Created Successfully');
    }
}
