
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <form wire:submit="updateProduct">
                      
                        <div class="mb-4">
                          <label for="title" class="block text-gray-700 font-bold mb-2" >Title:</label>
                          
                          <input type="text"  wire:model="title" class="w-full px-31 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Product title" required>
                          @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                          <label for="body" class="block text-gray-700 font-bold mb-2">Description:</label>
                          <textarea wire:model="description" rows="20" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Description" required></textarea>
                        </div>
                        <div class="mb-4">
                          <label for="quantity" class="block text-gray-700 font-bold mb-2" >Product Quantity:</label>
                          
                          <input type="text"  wire:model="quantity" class="w-full px-31 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Quantity" required>
                        </div>
                        <div class="mb-4">
                          <label for="price" class="block text-gray-700 font-bold mb-2" >Price:</label>
                          
                          <input type="text"  wire:model="price" class="w-full px-31 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 text-black" placeholder="Enter Price" required>
                          @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
                        
                        </div>




                       
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600" >Update</button>
                      </form>
                      
            </div>
        </div>
