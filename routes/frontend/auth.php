<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Panel\Student\StudentAuthController;
use App\Http\Controllers\Panel\Instructor\InstructorAuthController;



// common auth routes
Route::controller(AuthController::class)->group(function () {

    Route::get('sign-in',          'signIn')->name('frontend.signIn'); 
    Route::post('/sign-in',        'signInPost')->name('student.sign_in_post');

    
    
    Route::get('verify-email/{email}',                  'verifyEmail')->name('frontend.verify_email');
    // reset password
    Route::get('forgot-password',                       'forgotPassword')->name('frontend.forgot_password');
    Route::post('forgot-password',                      'forgotPasswordPost')->name('frontend.forgot_password_post');

    Route::get('reset-password/{email}',        'resetPassword')->name('frontend.reset_password');
    Route::post('reset-password',               'resetPasswordPost')->name('frontend.reset_password_post');

    Route::prefix('email')->middleware(['auth'])->group(function () {
        Route::get('/verify', 'verify')->name('verification.notice');
        Route::get('/send/verify/{id}', 'sendVerify')->name('send.verification.verify')->middleware(['throttle:6,1']);
    });
});
// common auth routes



// Students Auth related routes
Route::controller(StudentAuthController::class)->group(function () {

    Route::get('/sign-up',                              'signUp')->name('student.sign_up');
    Route::post('/sign-up',                             'signUpPost')->name('student.sign_up_post');
});
//  Students Auth related routes





// instructors Auth related routes
Route::controller(InstructorAuthController::class)->prefix('instructor')->group(function () {
    Route::get('/become-instructor',                            'becomeInstructor')->name('becomeInstructor');
    Route::post('/sign-up',                                     'signUp')->name('instructor.sign_up');
});
//  instructors Auth related routes