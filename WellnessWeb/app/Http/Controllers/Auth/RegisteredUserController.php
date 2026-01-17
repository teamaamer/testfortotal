<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Account;
use Illuminate\Http\JsonResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $status = $request->role === 'student' ? 'active' : 'new';

        $account = Account::create([
            'avatar' => 'avatar.png',
            'status' => $status,
            'name' =>  $request->name,
            'user_id' => $user->id,
        ]);

        $account->save();

        Auth::login($user);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Registration successful!',
            ]);
        }

        return redirect(route('dashboard', absolute: false));
    }

    public function ajaxRegister(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $status = $request->role === 'student' ? 'active' : 'new';

        $account = Account::create([
            'avatar' => 'avatar.png',
            'status' => $status,
            'name' =>  $request->name,
            'user_id' => $user->id,
        ]);

        $account->save();

        Auth::login($user);

            $redirectTo = $request->input('redirect_to', route('dashboard'));

if ($request->ajax()) {
        return response()->json([
            'message' => 'Account created successfully!',
            'redirect' => $redirectTo,
        ]);
    }

        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful!, Please wait until the administration contact you back',
        ]);
    }
}
