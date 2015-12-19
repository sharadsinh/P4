@extends('layouts.master')

@section('title')
    Show Store
@stop

@section('content')

    <h1>Stores</h1>

    <?php
        $logged_in_user = \App\User::find(\Auth::id());
        $stores = $logged_in_user->stores()->orderBy('store_name','ASC')->get();
    ?>

    <div>
        <h4>Hi {{$logged_in_user->firstname}}..</h4>
        <a href='/store/create-store'>Create Store</a>
    </div>

    {{-- You can add code in blade showed in following link. Refer reply by giannia christofakis:
    http://stackoverflow.com/questions/13002626/laravels-blade-how-can-i-set-variables-in-a-template
    --}}

    @if(sizeof($stores) == 0)
        No stores in the list yet.
        <a href='/store/create-store'>Create your first store list</a>
    @else
        <div class="list-group">
            @foreach($stores as $store)
                <?php
                    $numberOfItems = DB::table('items')->where('store_id','=',$store->id)->count();
                ?>
                <div class="list-group-item padding-sm">
                    <span class="badge">{{ $numberOfItems }}</span>
                    <a href='/store/{{$store->id}}/items'>{{ $store->store_name }}</a>
                    <a href="/store/{{$store->id}}/edit">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href='/store/{{$store->id}}/share-storelist'>
                        <i class="glyphicon glyphicon-share"></i>
                    </a>
                    <a href='/store/{{$store->id}}/delete-store'>
                        <i class="glyphicon glyphicon-minus-sign"></i>
                    </a>
                </div>
            @endforeach
        </div>

        {{--
            <div class="list-group">
                @foreach($stores as $store)
                    <a href='/store/{{$store->id}}/items' class="list-group-item active">{{ $store->store_name }}</a>
                    <a href='/store/{{$store->id}}/edit'>Edit</a>
                    <a href='/store/{{$store->id}}/delete-store'>Delete</a>
                    <a href='/store/{{$store->id}}/share-storelist'>Share</a>
                @endforeach
            </div>
        --}}
    @endif

    @if(isset($items))
        <div>
            <a href='/store/{{$store_id}}/create-item'>Add Item</a>
        </div>

        <ul class="list-group">
            @foreach ($items as $item)
            <a href='/store/item-checked/{{$item->id}}' class="list-group-item">
                <h4 class="list-group-item-heading">{{ $item->item_name }}</h4>
                <p class="list-group-item-text">Qty: {{ $item->quantity }}</p>
                <p class="list-group-item-text">Store Aisle: {{ $item->store_aisle_num }}</p>
                <a href='/store/edit-item/{{$item->id}}'>Edit</a>
                <a href='/store/delete-item/{{$item->id}}'>Delete</a>
            </a>
            @endforeach
        </ul>
    @endif

@stop
