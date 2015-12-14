@extends('layouts.master')

@section('title')
    Edit Item
@stop
    <h1>Edit Item</h1>

@section('content')
    {{-- if validation fails following block will show the requirement in the page --}}
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/store/edit-item'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>
      <input type='hidden' name='id' value='{{ $item->id }}'>

      <div class='form-group'>
          <label>Item Name:</label>
          <input
              type='text'
              id='item_name'
              name='item_name'
              value='{{ $item->item_name }}'
          >
      </div>

      <div class='form-group'>
          <label>Quantity:</label>
          <input
              type='text'
              id='item_qty'
              name='item_qty'
              value='{{ $item->quantity }}'
          >
      </div>

      <div class='form-group'>
          <label>Store Aisle:</label>
          <input
              type='text'
              id='item_store_aisle'
              name='item_store_aisle'
              value='{{ $item->store_aisle_num }}'
          >
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>

@stop
