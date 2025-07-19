<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="{{ route('register') }}">Register</a>
    </header>

    <main>
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label>メールアドレス</label>
                <!-- ここを type="text" に変更 -->
                <input name="email" type="text" value="{{ old('email') }}" placeholder="例：test@example.com">
                @error('email')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>パスワード</label>
                <input name="password" type="password" placeholder="例：coachtech1106">
                @error('password')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">ログイン</button>
        </form>
    </main>
</body>

</html>