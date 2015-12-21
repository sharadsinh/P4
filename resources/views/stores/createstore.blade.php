@extends('layouts.master')

@section('title')
    Create List
@stop

@section('content')

    <div class="container">
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            @include('errors')

            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Add store to the list</div>
                </div>
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form" method='POST' action='/store/create-store'>
                        {!! csrf_field() !!}

                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">* Store Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id='store_name' name="store_name" placeholder="Store Name">
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Create New Store List</button>
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
