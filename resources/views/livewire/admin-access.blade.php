
<div class="py-12">

  
  <div class="flex justify-center items-center mb-4">

  <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl text-center">ADMIN VIEW <br>Products</h1>
    <!-- Other content here -->
    
  </div>

  <div class="flex justify-center items-center mb-4">
  <div class="ml-auto mr-72">
    <a href="/admin/orders">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        ORDERS
      </button>
    </a>
    <a href="/admin/add">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
      ADD PRODUCT
    </button>
    
  </a>

  </div>
 
  </div> 

  <div class="max-w-7xl mx-auto sm:px-5 lg:px-8">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
  @foreach($product as $products)
      <div class="bg-white shadow-md rounded-md p-1">
        {{-- <img src="{{ asset('images/product1.jpg')}}" alt="Product 2" class="w-full"> --}}
        <img src="{{ asset('storage/' . $products->image) }}" alt="Product 2" class="w-full">
        <h3 class="text-lg font-bold mt-2">{{$products->title}}</h3>
        <p class="text-gray-500">{{$products->price}} rs</p>
        <td class="px-6 py-4">
          {{-- <button onclick="Livewire.dispatch('openModal', { component: 'edit-post',  arguments: { post: {{ $posts->id }} }})"> --}}
              <button wire:click="$dispatch('openModal', { component: 'edit-product-admin', arguments: { product: '{{ $products->id }}' }})">
          <div  class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 24" fill="currentColor" class="w-6 h-6">
              <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
              <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
            </svg>
          </div>
          </button>
          <button  wire:click="deleteProduct({{$products->id}})" wire:confirm="Are you sure you want to delete this product?" >
          <div class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 24" fill="currentColor" class="w-6 h-6">
              <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
            </svg>
          </div>
          </button>
      </td>
        {{-- <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-md" wire:click="addtoCart({{$products->id}})">Add to Cart</button> --}}
      </div>

  @endforeach 
       </div>
      </div>
</div>

