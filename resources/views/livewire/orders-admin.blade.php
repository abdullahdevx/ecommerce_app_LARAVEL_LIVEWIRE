<div>
    <br><br>
    <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl text-center">ADMIN PANEL <br> RECIEVED ORDERS</h1>
  <div class="justify-center">
    @foreach($order as $orders)
    <br>
   <b> <h2 class="lg:text-2xl">Order No: {{$orders->id}} </h2></b>
  <b>  Name: </b>{{$orders->name}}<br>
    <b>Email:</b> {{$orders->email}}<br>
    <b>Phone number:</b> {{$orders->number}}<br>
    <b>Address:</b> {{$orders->address}}<br>
    <b>Complete Address:</b> {{$orders->completeAddress}}<br>
    <b>City:</b> {{$orders->city}}<br>
    
    <b>Provice:</b> {{$orders->Province}} <br>
    <b> Payment Type:</b>    {{$orders->payment_type}} <br>

    <ul>
       <b> Total Order Price:</b> {{number_format($orders->totalorderprice)}} rs <br>
      <b>  PRODUCTS <br></b>
        
        
        
        
      <b> ORDERED PRODUCTS </b> <br>
        @foreach($orders->orderItemsRelation as $items)
        {{-- <b>   Product ID: {{$items->product_id}} <br></b> --}}
         <b> Product Name:</b> {{$items->product_name}} <br>
       <b> Quantity:</b>    {{$items->product_quantity}} <br>
      

        {{-- Picture: {{$items->product_image}} <br> --}}
        <img class="h-[200px] w-[282px]" src="{{ asset('storage/' . $items->product_image) }}" alt="Product" class="justify-center"> <br>

        @endforeach
    </ul>
    @endforeach
  </div>
</div>

