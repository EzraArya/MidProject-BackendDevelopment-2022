<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    @if ($error = $errors->first('password'))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif
    <main>
        <div class="card">
            <div class="card-body">
                <h1 id="title">LOGIN</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="text" id="username" placeholder="Username" name="username"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Password" id="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="checkbox" name="remember" id="rememberme"><label for="rememberme"
                        id="rememberme-text">Remember me</label>
                    <button type="submit" id="login-button">LOGIN</button>
                </form>
                <hr>
                <h2>Don't Have an Account?</h2>
                <button id="register"><a href="{{ route('register-page') }}">REGISTER</a></button>
            </div>
        </div>
    </main>
</body>

</html>
