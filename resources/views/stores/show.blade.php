@extends('layouts.master')

@section('title')
    Show Store
@stop

@section('content')



    <?php
        $logged_in_user = \App\User::find(\Auth::id());
        $stores = $logged_in_user->stores()->orderBy('store_name','ASC')->get();
    ?>



    {{-- You can add code in blade showed in following link. Refer reply by giannia christofakis:
    http://stackoverflow.com/questions/13002626/laravels-blade-how-can-i-set-variables-in-a-template
    --}}
    <div class="container-fluid">
        <div class="row">
            @if(sizeof($stores) == 0)
                No stores in the list yet.
                <a href='/store/create-store'>Create your first store list</a>
            @else
                {{-- SIDEBAR --}}
                <div class="col-sm-3 col-md-3 sidebar">
                  <ul class="nav nav-sidebar">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Stores</h3>
                        </div>
                        <div class="panel-body">
                            <a href="/store/create-store">
                                <i class="fa fa-list"></i> Create Store List
                            </a>
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach($stores as $store)
                            <?php
                                $numberOfItems = DB::table('items')->where('store_id','=',$store->id)->count();
                            ?>
                            <div class="list-group-item padding-sm">
                                <span class="badge">{{ $numberOfItems }}</span>
                                <a href='/store/{{$store->id}}/items'>{{ $store->store_name }}</a>
                                <a href="/store/{{$store->id}}/edit" style="margin-left: 10px; margin-right:3px;" data-toggle="tooltip" data-placement="bottom" title="Edit" >
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a href='/store/{{$store->id}}/share-storelist' style="margin:3px" data-toggle="tooltip" data-placement="bottom" title="Share List">
                                    <i class="glyphicon glyphicon-share"></i>
                                </a>
                                <a href='/store/{{$store->id}}/delete-store' class="confirm" style="margin:3px" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                  </ul>
              </div>
            @endif

            @if(isset($items))
                {{-- MAIN CONTENT --}}

                <div class="col-sm-9 col-sm-offset-3 col-md-5 col-md-offset-1 main">
                    <?php
                        $store_name = \App\Store::find($store_id)->store_name;
                     ?>
                     <h2 class="page-header">{{$store_name}}</h2>

                </div>

                <div class="col-sm-9 col-sm-offset-3 col-md-1 col-md-offset-0 main">
                     <a href='/store/{{$store_id}}/create-item' >
                         <button type="button" class="btn btn-primary" style="margin-top:30px;">Add Item</button>
                     </a>
                </div>

                <div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-1 main" style="box-sizing: border-box;">

                    <div class="row placeholders">

                        <ul class="list-group">
                            @foreach ($items as $item)
                            <div class="list-group-item padding-sm">

                                @if($item->checked)
                                    <s><h4 class="list-group-item-heading"><a href='/store/item-checked/{{$item->id}}'>{{ $item->item_name }}</a></h4>
                                    <p class="list-group-item-text">Qty: {{ $item->quantity }}</p></s>
                                    <a href="/store/edit-item/{{$item->id}}" style="position: absolute;right: 45px;" data-toggle="tooltip" data-placement="bottom" title="Edit" >
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href='/store/delete-item/{{$item->id}}' style="position: absolute;right: 20px;" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                    <s><p class="list-group-item-text">Store Aisle: {{ $item->store_aisle_num }}</p></s>
                                @else
                                    <h4 class="list-group-item-heading"><a href='/store/item-checked/{{$item->id}}'>{{ $item->item_name }}</a></h4>
                                    <p class="list-group-item-text">Qty: {{ $item->quantity }}</p>
                                    <a href="/store/edit-item/{{$item->id}}" style="position: absolute;right: 45px;" data-toggle="tooltip" data-placement="bottom" title="Edit" >
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href='/store/delete-item/{{$item->id}}' style="position: absolute;right: 20px;" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                    <p class="list-group-item-text">Store Aisle: {{ $item->store_aisle_num }}</p>
                                @endif

                            </div>
                            @endforeach
                        </ul>

                        @if(sizeof($store_users)>1)
                        <h4 style="text-align: center;">Store List Shared With:</h4>

                            @foreach ($store_users as $store_user)
                                <?php
                                    $user=\App\User::find($store_user->user_id);
                                ?>
                                @if($user->id != \Auth::id())
                                    <li style="text-align: center; list-style-type:none">{{$user->email}}</li>
                                @endif
                            @endforeach
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

@section('body')

<SCRIPT LANGUAGE="JavaScript">
    $(".confirm").click(function(e){
        var r = confirm("Are you sure you want to delete the Store List? Click OK to continue or click Cancel");
        if (r == false) {
            e.preventDefault();
        }
    });
</SCRIPT>
@stop
