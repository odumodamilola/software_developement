<?php




use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ReceiptController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AdminRegistrationController;





Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::middleware(['guest'])->group(function () {


Route::get('/user-register', [RegisteredUserController::class, 'showStudentRegistrationForm'])
->name('register.student');
Route::post('/user-register', [RegisteredUserController::class, 'register']);

Route::get('/admin-register', [AdminRegistrationController::class, 'showAdminRegistrationForm'])
->name('register.admin');
Route::post('/admin-register', [AdminRegistrationController::class, 'register']);


});



// Route::middleware(['guest'])->group(function () {
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [RegisterController::class, 'register']);
// });


Route::middleware(['auth', CheckUserRole::class . ':admin'])->group(function () {
    // Only accessible by admin

    // Admin Registration Routes


    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/receipts', [ReceiptController::class, 'index'])->middleware('auth');

    Route::post('/receipts', [ReceiptController::class, 'store'])->middleware('auth')->name('receipts.store');

    Route::get('/receipt-upload', [ReceiptController::class, 'uploadReceipt'])->name('admin.receipt-upload');

    
});

Route::middleware(['auth', CheckUserRole::class . ':student'])->group(function () {
    // Only accessible by students
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');


// Route::post('/register/student', [RegisteredUserController::class, 'register']);
});


require __DIR__ . '/auth.php';
