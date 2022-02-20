<?php

namespace App\Http\Controllers;

use App\Mail\CodeConfirm;
use App\Mail\TestEmail;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use SebastianBergmann\Environment\Console;

class AuthController extends Controller
{
    public function index()
    {
        Mail::to('angelj.dtv@gmail.com')->send(new TestEmail());
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if($user = User::where('email', $request->input('email'))->first()){
            if($user->email_verified_at == null){
                return back()->withErrors([
                    'email' => 'Your email is not verified. Please verify your email.',
                ]);
            }
            if(Hash::check($password, $user->password)){
                $url = URL::temporarySignedRoute('code', now()->addMinutes(10), ['email' => $user->email]);
                Mail::to($user->email)->send(new CodeConfirm($user->one_time_code));
                return redirect($url);
            }
            return back()->withErrors([
                'password' => 'Password is incorrect.',
            ]);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function loginWithCode(Request $request){
        $request->validate([
            'code' => 'required|numeric'
        ]);
        $code = $request->input('code');
        error_log($code);
        if($user = User::where('email', $request->input('email'))->first()){
            error_log($user->one_time_code);
            if($user->one_time_code == $code){
                if(Auth::loginUsingId($user->id)){
                    $request->session()->regenerate();
                    $user->one_time_code = rand(100000, 999999);
                    $user->save();
                    return redirect()->intended('home');
                }
                error_log('yes');
            }
            return back()->withErrors([
                'code' => 'The provided code is incorrect.',
            ]);
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $code = rand(100000, 999999);
        $email = $request->input('email');
        $user = new User();
        $user->email = $request->input('email');
        $user->one_time_code = $code;
        $user->password = Hash::make($request->input('password'));
        if($user->save()){
            $this->sendVerificationEmail($email);
            return redirect('/login')->with('success', 'Please check your email to verify your account');
        }
        return response()->json(['message' => 'User could not be created'], 500);
    }

    public function sendVerificationEmail($email="angeldtvv@gmail.com"){
        $url = URL::temporarySignedRoute('verifyEmail', now()->addMinutes(30), ['email' => $email]);



        Mail::to($email)->send(new VerifyEmail($url));
        print_r($url);
    }

    public function verifyEmail(Request $request){
        if (! $request->hasValidSignature()) {
            return abort(401);
        }
        try{
            $user = User::where('email', $request->input('email'))->first();
            if($user->email_verified_at != null){
                return redirect('/login')->with('success', 'Your account is already verified');
            }
            $user->email_verified_at = now();
            $user->save();
            return redirect('/login')->with('success', 'Your account has been verified');
        }catch (\Exception $e){
            return response()->json(['message' => 'User could not be verified'], 500);
        }
        //return redirect('/login')->with('success', 'Your email has been verified');

    }

}
