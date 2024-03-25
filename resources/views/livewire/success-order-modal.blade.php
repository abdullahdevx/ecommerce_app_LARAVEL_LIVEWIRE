   <div 
   class="fixed z-50 inset-0 backdrop-blur-lg "
   
    x-data = "{ show : false}"
    x-show = "show"
    x-on:success-modal.window = "show = true"
    x-on:keydown.escape.window = "show = false"

    x-on:closeSuccess-modal.window = "show = false"
   x-cloak
   x-transition:enter="transition ease-out duration-300"
   x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in duration-300"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0"
     >
     
    <div class="fixed inset-0 opacity-100 ">
      
        <div class=" bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height:270px; max-width:500px; top:1%; left:10%;">
<br> <br> <br> <br>
            <p class="mb-6 text-sky-600 text-1x font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl text-center" >ORDER PLACED SUCCESSFULLY. THANKS FOR SHOPPING!</p>
           <div class="flex flex-col items-center">
            <button wire:click="closeModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                CONTINUE
              </button>
           </div>
        </div>
    </div>
</div>