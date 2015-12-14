@extends('layouts.master')

@section('title')
    Show Store
@stop

@section('content')

    <h1>Stores</h1>

    <div>
        <a href='/store/create-store'>Create Store</a>
    </div>

    <?php $stores = \App\Store::orderBy('id','DESC')->get(); ?>

    {{-- You can add code in blade showed in following link. Refer reply by giannia christofakis:
    http://stackoverflow.com/questions/13002626/laravels-blade-how-can-i-set-variables-in-a-template
    --}}

    @if(sizeof($stores) == 0)
        No stores in the list yet.
        <a href='/store/create-store'>Create your first store list</a>
    @else
        <div class="list-group">
            @foreach($stores as $store)
                <a href='/store/{{$store->id}}/items' class="list-group-item active">{{ $store->store_name }}</a>
                <a href='/store/{{$store->id}}/edit'>Edit</a>
                <a href="#">Delete</a>
            @endforeach
        </div>

    @endif

    @if(isset($items))


        <div>
            <a href='/store/{{$store_id}}/create-item'>Add Item</a>
        </div>

        
        <ul class="list-group">
            @foreach ($items as $item)
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">{{ $item->item_name }}</h4>
                <p class="list-group-item-text">Qty: {{ $item->quantity }}</p>
                <p class="list-group-item-text">Store Aisle: {{ $item->store_aisle_num }}</p>
                <a href='/store/edit-item/{{$item->id}}'>Edit</a>
                <a href="#">Delete</a>
            </a>
            @endforeach
        </ul>
    @endif
@stop
