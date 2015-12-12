@extends('layouts.master')

@section('title')
    Edit store detail
@stop
    <h1>Edit store detail</h1>

@section('content')
    <form method='POST' action='/store/edit'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>
      <input type='hidden' name='id' value='{{ $store->id }}'>

      <div class='form-group'>
          <label>Store Name:</label>
          <input
              type='text'
              id='store_name'
              name='store_name'
              value='{{ $store->store_name }}'
          >
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>


@stop
