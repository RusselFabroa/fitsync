<?php

use App\Http\Controllers\AboutController;
use App\Models\ClassBookings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\ClassBookingsController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\UserForumController;
use App\Http\Controllers\MembershipFeesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\RegisterMemberController;
use App\Http\Controllers\TrainingBookingsController;
use App\Http\Controllers\TrainingScheduleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClassesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/edit', [ProfileController::class, 'membership'])->name('profile.update-membership');

});

Route::prefix('superadmin')->middleware(['web', 'superadmin'])->group(function () {
    Route::get('/superadmin-dashboard', [UserController::class, 'superadminDashboard'])->name('superadmin.superadmin-dashboard');
    Route::get('/superadmin-dashboard-edit/{class_id}', [UserController::class, 'superadminDashboardEdit'])->name('superadmin.superadmin-dashboard-edit');

    Route::resources([
        'registerMember' => RegisterMemberController::class,
    ]);
    Route::get('/reportSale',[SaleController::class,'index'])->name('reportSale');
  
    Route::get('/printSale',[SaleController::class,'print'])->name('printSale');

    Route::post('/saveClass',[ClassesController::class,'SaveClass'])->name('SaveClass');
    Route::get('/deleteClass',[ClassesController::class,'DeleteClass'])->name('DeleteClass');


});

Route::prefix('trainer')->middleware(['web', 'trainer'])->group(function () {
    Route::get('/trainer-dashboard', [UserController::class, 'trainerDashboard'])->name('trainer.trainer-dashboard');
    Route::resources([
        'admin-forums' => ForumController::class,
        'classSchedule' => ClassScheduleController::class,
        'trainingSchedule' => TrainingScheduleController::class,
        'classBookings' => ClassBookingsController::class,
        'trainingBookings' => TrainingBookingsController::class,
        'membershipFees' => MembershipFeesController::class,
        'bmi' => BmiController::class,
        'exercises' => ExercisesController::class,
        'feedback' => FeedbackController::class,
        'members' => MembersController::class,
        'sms' => SMSController::class,
        
    ]);
    Route::get('trainer-bookings', [ClassBookingsController::class, 'trainerindex'])->name('classBookings.trainerindex');
    Route::put('/classBookings/{cb_id}', [ClassBookingsController::class, 'update'])->name('classBookings.update');
    Route::put('/membershipFees/{membershipFees}/update', [MembershipFeesController::class, 'customUpdate'])->name('membershipFees.customUpdate');
    Route::post('/send-reminder', [SMSController::class, 'store'])->name('sendReminder');
    Route::get('/reportSale',[SaleController::class,'index'])->name('reportSale');
    Route::get('/printSale',[SaleController::class,'print'])->name('printSale');
    Route::get('/trainer-dashboardPrint', [UserController::class, 'trainerPrint'])->name('trainer.trainer-print');

    Route::get('/try-sms',[SMSController::class,'trySMS'])->name('trySMS');
    Route::get('/send-sms',[SMSController::class,'store'])->name('sendSMS');

});

Route::prefix('user')->middleware(['web', 'user'])->group(function () {
    Route::get('/user-dashboard', [UserController::class, 'userDashboard'])->name('user.user-dashboard');
    Route::resources([
        'forums' => UserForumController::class,
        'user-classes' => ClassBookingsController::class,
        'user-trainingBooking' => TrainingBookingsController::class,
        'user-membershipFees' => MembershipFeesController::class,
        'user-bmi' => BmiController::class,
        'user-exercises' => ExercisesController::class,
        'user-feedback' => FeedbackController::class,
        'fitsync-about' => AboutController::class,
       
    ]);
    Route::get('user-classes/create/{classId}', [ClassBookingsController::class, 'create'])->name('user-classes.create');
    Route::get('user-pendingclasses/', [ClassBookingsController::class, 'pending'])->name('user-classes.pending');
    Route::delete('user-classes/userdestroy/{id}', [ClassBookingsController::class, 'userdestroy'])->name('user-classes.userdestroy');
        

    Route::post('AttendClass', [ClassesController::class, 'AttendClass'])->name('AttendClass');
});


require __DIR__ . '/auth.php';
