<x-app-layout>
    <div class="flex justify-between items-center">
      <div class="max-w-md ml-auto">
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product" class="object-cover">
      </div>
      <div class="ml-auto mr-96">
          {{$product->title}}<br>
        <b><h1 class="text-xl font-bold">Description</h1></b>
          {{$product->description}}
        <br>
      <button class="bg-blue-500 text-white px-4 py-2 mt-1 rounded-md hover:bg-blue-600" wire:click="addtoCart({{$product->id}})" >Add to Cart</button>
    </div>

    </div>

</x-app-layout>