@extends('layouts.master')

@section('title')
    Edit Item
@stop

@section('content')

    <div class="container">
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            @include('errors')

            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Edit Item</div>
                </div>
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form" method='POST' action='/store/edit-item'>
                        {!! csrf_field() !!}

                        <input type='hidden' name='id' value='{{ $item->id }}'>

                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">*Item Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="item_name" name="item_name" value='{{ $item->item_name }}'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Item Quantity</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="item_qty" name="item_qty" value='{{ $item->quantity }}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Asile Number</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id='item_store_aisle' name="item_store_aisle" value='{{ $item->store_aisle_num }}'>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Update</button>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    * are required feilds
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
