<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\ShoppingCartComponent;
use App\Livewire\FetchProducts;
use App\Livewire\AdminAccess;
use App\Livewire\AddProductAdmin;
use App\Livewire\ShowSingleProduct;
use App\Livewire\CheckoutModal;
use App\Livewire\SuccessOrderModal;
use App\Livewire\OrdersAdmin;
use App\Livewire\PaymentController;
use App\Http\Controllers\stripePaymentController;

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

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', FetchProducts::class)->name('welcome');
Route::get('/cart', ShoppingCartComponent::class)->middleware(['auth'])->name('cart');
Route::get('/product/{id}', [ShowSingleProduct::class, 'render'])->name('showProduct');

Route::get('/gandu', PaymentController::class);



Route::middleware(['auth', 'isAdmin'])->group(function ()
{
Route::get('/admin', AdminAccess::class)->middleware(['auth'])->name('admin');
Route::get('/admin/add', AddProductAdmin::class)->middleware(['auth'])->name('addproduct');
Route::get('/admin/orders', OrdersAdmin::class)->name('ordersAdmin');
});


Route::get('/success', [stripePaymentController::class, 'success'])->name('success');
Route::get('/cancel', [stripePaymentController::class, 'cancel'])->name('cancel');



require __DIR__.'/auth.php';
