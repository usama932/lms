<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\SignInRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Interfaces\UserInterface;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    use ApiReturnFormatTrait;

    protected $user;
    protected $authenticationRepository;

    public function __construct(UserInterface $userInterface, AuthenticationRepositoryInterface $authenticationRepository)
    {
        $this->user = $userInterface;
        $this->authenticationRepository = $authenticationRepository;
    }

    public function signIn()
    {
        if (auth()->check()) {
            return redirect()->route('home')->with('warning', ___('alert.You are already logged in'));
        }
        $data['title'] = ___('auth.Sign In'); // title
        return view('frontend.auth.sign_in', compact('data'));
    }
    // email verification
    public function verifyEmail(Request $request, $email)
    {
        try {
            $result = $this->authenticationRepository->verifyEmail(decrypt($email), $request->expire, );
            if ($result->original['result']) {
                if (auth()->check()) {
                    return redirect()->route('home')->with('success', $result->original['message']);
                }
                return redirect()->route('frontend.signIn')->with('success', $result->original['message']);
            } else {
                return redirect()->route('frontend.signIn')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function forgotPassword()
    {
        try {
            $data['title'] = ___('student.Forgot Password'); // title
            return view('frontend.auth.forgot_password', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function forgotPasswordPost(Request $request)
    {
        try {
            $result = $this->authenticationRepository->forgotPassword($request);
            if ($result->original['result']) {
                return redirect()->route('frontend.forgot_password')->with('success', $result->original['message']);
            } else {
                return redirect()->route('frontend.forgot_password')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function resetPassword(Request $request, $email)
    {
        try {
            $result = $this->authenticationRepository->resetPasswordPage(decrypt($email), $request->expire, );
            if ($result->original['result']) {
                $data['title'] = ___('student.Set New Password'); // title
                $data['email'] = ($email);
                return view('frontend.auth.reset_password', compact('data'));
            } else {
                return redirect()->route('frontend.forgot_password')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    public function resetPasswordPost(ResetPasswordRequest $request)
    {
        try {
            $result = $this->authenticationRepository->resetPassword($request);
            if ($result->original['result']) {
                return redirect()->route('frontend.signIn')->with('success', $result->original['message']);
            } else {
                return redirect()->route('frontend.forgot_password')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function signInPost(SignInRequest $request)
    {
        try {
            $result = $this->authenticationRepository->panelLogin($request);
            if ($result->original['result']) {
                $user = Auth::user();
                if ($user->email_verified_at == null) {
                    $data['redirect_url'] = route('frontend.signIn');
                    return $this->responseWithError( ___('users_roles.account_not_verified_yet'), $data, 400);
                }
        
                if ($user->status == 0) {
                    $data['redirect_url'] = route('frontend.signIn');
                    return $this->responseWithError( ___('users_roles.you_are_inactive'), $data, 400);
                }
                if ($user->role->status == 0) {
                    $data['redirect_url'] = route('frontend.signIn');
                    return $this->responseWithError( ___('users_roles.this_user_role_is_inactive'), $data, 400);
                }
                if (Auth::user()->status_id == 5) {
                    Auth::logout();
                    $data['redirect_url'] = route('frontend.signIn');
                    return $this->responseWithError(___('alert.Your account has been suspended'), $data, 400);
                }
                $data['redirect_url'] = route('home');
                return $this->responseWithSuccess(___('alert.Successfully Logged in'), $data);
            } else {
                return $this->responseWithError($result->original['message'], [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    // email verification

    public function verify(Request $request)
    {
        try {
            if (auth()->user()->email_verified_at != null) {
                return redirect()->route('home')->with('success', ___('alert.Email already verified'));
            }
            $data['url'] = route('send.verification.verify', encrypt(auth()->user()->email) . '?expire=' . strtotime(now()->addMinutes(30)));
            $data['title'] = ___('auth.Email Verification'); // title
            $data['button'] = ___('auth.Send Verification Email'); // title
            if ($request->session()->has('resend_email')) {
                $data['button'] = ___('auth.Resend Verification Email'); // title
            }
            return view('frontend.auth.email_verify', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    public function sendVerify(Request $request)
    {
        try {
            $result = $this->authenticationRepository->sendEmailVerification();
            if ($result->original['result']) {
                $data['title'] = ___('auth.Email Verification'); // title
                $request->session()->put('resend_email', true);
                return redirect()->route('verification.notice')->with('success', $result->original['message']);
            } else {
                return redirect()->route('home')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
