<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
        <div class="header-links">
            <form method="GET" action="{{ route('login') }}">
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </header>

    </div>

    @extends('layouts.app')

    @section('content')
    <div class="register-container">
        <h2>Register</h2>

        <form method="POST" action="/register" novalidate>
            @csrf

            <div>
                <label for="name">お名前</label><br>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">メールアドレス</label><br>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">パスワード</label><br>
                <input id="password" type="password" name="password">
                @error('password')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">登録する</button>
            </div>
        </form>

</body>
@endsection

</html>