@extends('layouts.master')

@section('title')
    Welcome
@stop

@section('head')

@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Grocery List App</h1>
                <p class="lead">A Solution to maintain and share grocery list</p>
                <ul class="list-unstyled">
                    <li><img src="/img/image1.jpg" /></li>


                </ul>
                <h3 style="padding-top:20px">Available Features</h3>
                <div class="col-lg-offset-2 col-lg-4 text-left" style="margin-top:10px">
                    <ul class="fa-ul">
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Register New User</h4></li>
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Login Existing User</h4></li>
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Create New Store List</h4></li>
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Edit Store Details</h4></li>
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Add New Item to Store List</h4></li>
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Add Quantity to the Item</h4></li>
                      <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Add Store Aisle Number for the Item</h4></li>
                    </ul>
                </div>
                <div class="col-lg-offset-1 col-lg-4 text-left" style="margin-top:10px">
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Mark Complete the Item</h4></li>
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Edit Item</h4></li>
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Delete Item</h4></li>
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>See Number of Items in Store List</h4></li>
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Share Store List With Users</h4></li>
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>See Shared List Users</h4></li>
                        <li><i class="fa-li fa fa-check fa-2x" style="color:green; "></i><h4>Delete Store List</h4></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
@stop
