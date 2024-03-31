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
use App\Livewire\CheckoutModalForOnlinePayment;
use App\Http\Controllers\stripePaymentController;
use App\Livewire\Check;

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


Route::middleware(['auth', 'isAdmin'])->group(function ()
{
Route::get('/admin', AdminAccess::class)->middleware(['auth'])->name('admin');
Route::get('/admin/add', AddProductAdmin::class)->middleware(['auth'])->name('addproduct');
Route::get('/admin/orders', OrdersAdmin::class)->name('ordersAdmin');
});

Route::get('/success', [CheckoutModalForOnlinePayment::class, 'success'])->name('success');

require __DIR__.'/auth.php';
