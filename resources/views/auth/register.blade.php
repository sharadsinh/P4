@extends('layouts.master')

@section('content')

    <p>Already have an account? <a href='/login'>Login here...</a></p>

    <h1>Signup</h1>

    @include('errors')

    <form method='POST' action='/register'>
        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='name'>First Name</label>
            <input type='text' name='firstname' id='firstname' value='{{ old('firstname') }}'>
        </div>

        <div class='form-group'>
            <label for='name'>Last Name</label>
            <input type='text' name='lastname' id='lastname' value='{{ old('lastname') }}'>
        </div>

        <div class='form-group'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password'>
        </div>

        <div class='form-group'>
            <label for='password_confirmation'>Confirm Password</label>
            <input type='password' name='password_confirmation' id='password_confirmation'>
        </div>

        <button type='submit' class='btn btn-primary'>Register</button>

    </form>

@stop
