<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <main>
        <div class="card">
            <div class="card-body">
                <h1 id="title">REGISTER</h1>
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="input-name" id="name-text">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="input-username" id="username-text">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="input-password" id="password-text">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror>

                    <label for="input-confirm-password" id="confirm-password-text">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirm-password" required
                        autocomplete="current-password">
                    @error('confirm_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" id="register-button">REGISTER</button>
                </form>
                <hr>
                <h2>Already Have an Account?</h2>
                <button id="login-button"><a href="{{ route('login-page') }}">LOGIN</a></button>
            </div>
        </div>
    </main>
</body>

</html>
