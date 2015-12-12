@extends('layouts.master')

@section('title')
    Add Item to the list
@stop

@section('content')

    <h1>Add item to the store list</h1>

    {{-- if validation fails following block will show the requirement in the page --}}
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/store/create-item'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>
      <input type='hidden' name='id' value='{{ $store->id }}'>

      <div class='form-group'>
          <label>* Item Name:</label>
          <input
              type='text'
              id='item_name'
              name='item_name'
          >
      </div>

      <div class='form-group'>
          <label>Item Quantity:</label>
          <input
              type='text'
              id='item_qty'
              name='item_qty'
          >
      </div>

      <div class='form-group'>
          <label>Asile Number in Store:</label>
          <input
              type='text'
              id='item_store_aisle'
              name='item_store_aisle'
          >
      </div>

      <button type="submit" class="btn btn-primary">Add Item</button>
    </form>

@stop
