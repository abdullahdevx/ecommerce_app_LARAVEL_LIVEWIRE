<div>
    
<div 
class="fixed z-50 inset-0 backdrop-blur-lg "

x-data = "{ show : false}"
x-show = "show"
x-on:open-paymentmodal.window = "show = true"
x-on:keydown.escape.window = "show = false"

x-on:close-modal.window = "show = false"
class="fixed z-50 inset-0"
x-cloak
x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in duration-300"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
>

<div class="fixed-center inset-0 bg-gray-500 opacity-300 ">
  
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height:509px; max-width:500px; top:1%; left:1%;">
        <br>
        <div>
          <button x-on:click="show = false" type="button" class="bg-white rounded-md p-1 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 2 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
          </div>


    {{-- Its a Modal --}}
    <div class="container mx-auto">
        <h1 class="text-center text-3xl font-bold mt-8 mb-4">Pay Via Debit or Credit Card</h1>
        
        <div class="max-w-lg mx-auto">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @if (Session::has('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
    
                <form role="form" id="payment-form" wire:submit="processPayment()" class="require-validation" data-cc-on-file="false">
                    @csrf
    
                    <div class="mb-4">
                        <label for="card_name" class="block text-gray-700 text-sm font-bold mb-2">Name on Card</label>
                        <input wire:model="cardName" id="card_name" name="card_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="John Doe">
                    </div>
    
                    <div class="mb-4">
                        <label for="card_number" class="block text-gray-700 text-sm font-bold mb-2">Card Number</label>
                        <input wire:model="cardNumber" id="card_number" name="card_number" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="4242 4242 4242 4242">
                    </div>
    
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                            <label for="card_cvc" class="block text-gray-700 text-sm font-bold mb-2">CVC</label>
                            <input wire:model="cvc" id="card_cvc" name="card_cvc" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="123">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                            <label for="card_expiry_month" class="block text-gray-700 text-sm font-bold mb-2">Expiration Month</label>
                            <input wire:model="expirationMonth" id="card_expiry_month" name="card_expiry_month" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="MM">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                            <label for="card_expiry_year" class="block text-gray-700 text-sm font-bold mb-2">Expiration Year</label>
                            <input wire:model="expirationYear" id="card_expiry_year" name="card_expiry_year" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="YYYY">
                        </div>
                    </div>
    
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Pay Now ($100)</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

</div>
</div>
</div>