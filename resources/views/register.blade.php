@extends('template')

@section('title', 'register')

@section('body')

    <form>
        <div class="form-group">
            <label for="InputName">Enter Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="InputUsername">Enter Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Name" name="username" value="{{ old('username') }}">
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror>
        </div>
        <div class="form-group">
            <label for="InputConfirmPassword">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password"
                name="confirm_password">
            @error('confirm_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
