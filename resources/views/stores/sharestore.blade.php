@extends('layouts.master')

@section('content')
    <h1>Share Store List</h1>

    @include('errors')

    <form method='POST' action='/store/share-storelist'>
        {!! csrf_field() !!}
        <input type='hidden' name='store_id' value='{{ $store->id }}'>

        <div class='form-group'>
            <label for='name'>User's Email: </label>
            <input type='text' name='email' id='email' value='{{ old('email') }}'>
        </div>

        <button type='submit' class='btn btn-primary'>Share List</button>
    </form>

@stop
