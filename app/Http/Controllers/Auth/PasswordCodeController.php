<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetCodeMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordCodeController extends Controller
{
    // Show email form (forgot password)
    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    // Send 6-digit code to email
    public function sendCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        // For security, don't disclose if email not found
        if (! $user) {
            return back()->with('status', 'If the email exists, we have sent a code.');
        }

        $code = (string) random_int(100000, 999999);
        $hash = Hash::make($code);

        // Remove old codes for this email
        DB::table('password_reset_codes')->where('email', $request->email)->delete();

        DB::table('password_reset_codes')->insert([
            'email' => $request->email,
            'code_hash' => $hash,
            'expires_at' => Carbon::now()->addMinutes(15),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Send mail (requires MAIL_* configured in .env)
        try {
            Mail::to($request->email)->send(new PasswordResetCodeMail($code));
        } catch (\Throwable $e) {
            return back()->withErrors(['email' => 'Unable to send email. Please check mail configuration.']);
        }

        // Persist email to session for next steps
        session(['password_reset_email' => $request->email]);

        return redirect()->route('password.code.verify')->with('status', 'We have emailed your 6-digit code.');
    }

    // Show code verification form
    public function showCodeForm(Request $request)
    {
        $email = session('password_reset_email');

        return view('auth.verify-reset-code', compact('email'));
    }

    // Verify submitted code
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);
        $email = session('password_reset_email');
        if (! $email) {
            return redirect()->route('password.request');
        }

        $record = DB::table('password_reset_codes')->where('email', $email)->first();
        if (! $record) {
            return back()->withErrors(['code' => 'Invalid or expired code.']);
        }
        if (Carbon::parse($record->expires_at)->isPast()) {
            return back()->withErrors(['code' => 'Code has expired. Please request a new one.']);
        }
        if (! Hash::check($request->code, $record->code_hash)) {
            return back()->withErrors(['code' => 'Incorrect code.']);
        }

        // Mark as verified in session
        session(['password_code_verified' => true]);

        return redirect()->route('password.code.reset');
    }

    // Show new password form
    public function showNewPasswordForm(Request $request)
    {
        if (! session('password_code_verified') || ! session('password_reset_email')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password-code');
    }

    // Update password
    public function resetPassword(Request $request)
    {
        if (! session('password_code_verified') || ! session('password_reset_email')) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $email = session('password_reset_email');
        $user = User::where('email', $email)->first();
        if (! $user) {
            return redirect()->route('password.request');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Cleanup
        DB::table('password_reset_codes')->where('email', $email)->delete();
        session()->forget(['password_reset_email', 'password_code_verified']);

        return redirect()->route('login')->with('status', 'Password updated successfully. Please log in.');
    }
}
