@extends('layouts.master')

@section('title')
    Create List
@stop

@section('content')

    <h1>Add store to the list</h1>

    {{-- if validation fails following block will show the requirement in the page --}}
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/store/create-store'>

      <input type='hidden' value='{{ csrf_token() }}' name='_token'>

      <div class='form-group'>
          <label>Store Name:</label>
          <input
              type='text'
              id='store_name'
              name='store_name'
          >
      </div>

      <button type="submit" class="btn btn-primary">Create New List</button>
    </form>

@stop
