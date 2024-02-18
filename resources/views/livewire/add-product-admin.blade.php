<div class="bg-grey  overflow-hidden shadow-sm sm:rounded-lg">

    <div class="p-10 text-gray-900 dark:text-gray-100">
      <div class="flex justify-center items-center mb-4">

        <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl  text-center">ADMIN VIEW <br>Add Product</h1>
          <!-- Other content here -->
          
        </div>
            <form wire:submit="addProduct">
              
                <div class="mb-4 px-96">
                  <label for="title" class="block text-gray-700 font-bold mb-2" >Title:</label>
                  
                  <input type="text"  wire:model="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Product title" required>
                  @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4 px-96">
                  <label for="body" class="block text-gray-700 font-bold mb-2">Description:</label>
                  <textarea wire:model="description" rows="20" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Description" required></textarea>
                </div>

                <div class="mb-4 px-96">
                  <label class="block text-gray-700 font-bold mb-2" >Product Picture:</label>
                  
                  <input accept="image/png, image/jpeg, image/jpg" type="file"  wire:model="image" class="w-full px-31 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Quantity" required>
                </div>


                <div class="mb-4 px-96">
                  <label for="quantity" class="block text-gray-700 font-bold mb-2" >Product Quantity: (Not Visible to User)</label>
                  
                  <input type="text"  wire:model="quantity" class="w-full px-31 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Quantity" required>
                </div>
                <div class="mb-4 px-96">
                  <label for="price" class="block text-gray-700 font-bold mb-2" >Price:</label>
                  
                  <input type="text"  wire:model="price" class="w-full px-31 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Price" required>
                  @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
                
                
                </div>



                <div class="mb-4 px-96">

                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600" >Add Product</button>
                </div>
              </form>
              
    </div>
</div>