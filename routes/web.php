<?php
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Visitor1Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MarktingController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InstallmentController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/register',[AuthController::class,'loadRegister'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.store');
Route::get('/login',function(){
    return redirect('/');
});
Route::get('/login',[AuthController::class,'loadLogin'])->name('login');
Route::post('/loginstore',[AuthController::class,'login'])->name('login.store');
Route::get('/logout',[AuthController::class,'logout']);
//forget
route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgot.password');
route::get('forgot',[AuthController::class,'forgot'])->name('forgot');
route::get('verify/email',[AuthController::class,'verification'])->name('verify.email');
route::get('/reset-password/{token}',[AuthController::class,'resetPassword'])->name('reset.password');
route::get('verify/otp',[AuthController::class,'verifyOTP'])->name('verifyOTP');
route::put('/update-password/{token}',[AuthController::class,'updatePassword'])->name('update.password');
//visitor
// ********** visitor Routes *********
Route::group(['prefix' => 'visitor-home','middleware'=>['web','isUser']],function(){
    Route::get('/town',[VisitorController::class, 'home'])->name('visitor.home');
    Route::get('/visitor/plots',[VisitorController::class, 'plot'])->name('visitor.plot');
    Route::get('/visitor/discount',[VisitorController::class, 'discount'])->name('visitor.discount');
    Route::get('/visitor/contact',[VisitorController::class, 'contact'])->name('visitor.contact');
    Route::get('/user-installments', [VisitorController::class, 'getInstallmentsByUserEmail'])->name('installments.user');
});


// //admin
// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
 Route::get('/dashboard',[SuperadminController::class, 'dashboard'])->name('superadmin.home');
Route::get('/users',[SuperadminController::class,'users'])->name('superadminUsers');
Route::get('/manage-role',[SuperadminController::class,'manageRole'])->name('manageRole');
Route::post('/update-role',[SuperadminController::class,'updateRole'])->name('updateRole');
Route::delete('user/delete{id}', [AuthController::class, 'destroy'])->name('user.delete');
//plot
Route::get('/plot/create', [PlotController::class, 'plots'])->name('plot.create');
Route::post('/plot/store', [PlotController::class, 'plotstore'])->name('plot.store');
Route::get('/plot/show', [PlotController::class, 'plotshow'])->name('plot.show');
Route::get('plot/edit{id}',[PlotController::class,'edit'])->name('plot.edit');
Route::post('plot/update{id}',[PlotController::class,'update'])->name('plot.update');
Route::delete('plot/delete{id}', [PlotController::class, 'destroy'])->name('plot.delete');
//customer
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'customerstore'])->name('customer.store');
Route::get('/customer/show', [CustomerController::class, 'customershow'])->name('customer.show');
Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('customers/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('customers/{customer}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');
    //booking
Route::get('/customer/booking/read', [BookingController::class, 'create'])->name('booking.create');
Route::post('/customer/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/customer/booking/index', [BookingController::class, 'bookingindex'])->name('booking.show');
Route::delete('/customer/booking/delete{id}', [BookingController::class, 'destroy'])->name('booking.delete');
Route::get('/customer/booking/edit{id}',[BookingController::class,'edit'])->name('booking.edit');
Route::post('/customer/booking/update{id}',[BookingController::class,'update'])->name('booking.update');

//installment
Route::get('/customer/installment/read', [InstallmentController::class, 'create'])->name('ins.create');
Route::post('/customer/installment/store', [InstallmentController::class, 'store'])->name('ins.store');
Route::get('/get-installments/{booking_id}', [InstallmentController::class, 'getInstallments'])->name('get.installments');
Route::get('/customer/installment/index', [InstallmentController::class, 'index'])->name('ins.index');
Route::delete('/installments/{id}', [InstallmentController::class, 'destroy'])->name('ins.delete');
});

// ********** marketing Routes *********
Route::group(['prefix' => 'markting-team','middleware'=>['web','isMarktingTeam']],function(){
    Route::get('/dashboard',[MarktingController::class,'dashboard'])->name('discount.dashboard');
    Route::get('/discount/show', [DiscountController::class, 'index'])->name('discount.show');
Route::delete('/discounts/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy');
Route::get('/contactshow', [ContactController::class, 'contactshow'])->name('contact.show');
Route::delete('/contactdelete{id}', [ContactController::class, 'contactdestroy'])->name('contact.delete');
});

//discount
Route::post('/discount/store', [DiscountController::class, 'discountstore'])->name('discount.store');

//contact
Route::post('/contactstore', [ContactController::class, 'contactstore'])->name('contact.store');

//visitor1
// ********** visitor1 Routes *********
Route::get('/',[Visitor1Controller::class, 'home'])->name('visitor1.home');
Route::get('/visitor/plots',[Visitor1Controller::class, 'plot'])->name('visitor1.plot');
Route::get('/visitor/discount',[Visitor1Controller::class, 'discount'])->name('visitor1.discount');
 Route::get('/visitor/contact',[Visitor1Controller::class, 'contact'])->name('visitor1.contact');

 Route::get('/remainder/mail',[InstallmentController::class, 'installmentmail'])->name('remainder.mail');
