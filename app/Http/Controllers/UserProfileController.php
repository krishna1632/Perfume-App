<?php

namespace App\Http\Controllers;

use App\Mail\EmailOtpMail;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('userregister.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $otp = rand(100000, 999999);

        EmailOtp::updateOrCreate(
            [
                'email' => $request->email,
            ],
            [
                'email' => $request->email,
                'otp' => $otp,
                'expired_at' => Carbon::now()->addMinutes(10),
            ]
        );

        Mail::to($request->email)->send(new EmailOtpMail($otp));

        $request->session()->put('register_email', $request->email);
        $request->session()->put('register_name', $request->name);
        $request->session()->put('register_password', Hash::make($request->password));

        return redirect()->route('verify.otp');
    }

    public function verifyOtp()
    {
        return view('userregister.email_otp_verify');
    }

    public function verifyOtpStore(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $email = $request->session()->get('register_email');
        $name = $request->session()->get('register_name');
        $password = $request->session()->get('register_password');

        $emailOtp = EmailOtp::where('email', $email)
            ->where('otp', $request->otp)
            ->where('expired_at', '>=', Carbon::now())
            ->first();

        if (!$emailOtp) {
            return redirect()->back()->withInput()->with(['message' => 'Inavlid OTP or Otp has expired!']);
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $emailOtp->delete();

        $request->session()->forget('register_email');
        $request->session()->forget('register_name');
        $request->session()->forget('register_password');

        // ✅ "Customer" Role Assign aur Sync karo (Force Save in `model_has_roles`)
        $role = Role::where('name', 'Customer')->first();
        if ($role) {
            $user->syncRoles([$role->name]); // Yeh ensure karega ki role assign ho
        }

        event(new Registered($user));

        Auth::login($user);

        // Role-based redirection after registration
        if ($user->hasRole(['Superadmin', 'Admin'])) {
            return redirect()->route('dashboard');
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
