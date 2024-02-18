<div id="search-bar">
    <form class="d-flex" role="search">
            <input wire:model.live.debounce.500ms="search" class="form-control  me-0 px-40  rounded" type="search" placeholder="Search Products" aria-label="Search" >
    </form>
    @if(!empty($search))
    @foreach($result as $results)
{{-- <a href="product/{{$results->id}}"> --}}
    <a href="{{ route('showProduct', ['id' => $results->id]) }}" wire:navigate>
    <div class="dropdown-menu d-block py-1">
        <div class="px-2 py-1 border-bottom">
            <div class="d-flex items-center ml-3">

                <img class="h-[40px]" src="{{ asset('storage/' . $results->image) }}"> 
                <span class="ml-2"> {{$results->title}}</span>
                <small></small>
            </div>
        </div>
    </div>
    @endforeach



        @if(count($result) <= 0)
        <div class="dropdown-menu d-block py-1">
            <div class="px-3 py-2 border-bottom">
                <div class="d-flex flex-column ml-3">
                    <span>No products found!</span>
                </div>
            </div>
        </div>
        @endif

    @endif
</div>