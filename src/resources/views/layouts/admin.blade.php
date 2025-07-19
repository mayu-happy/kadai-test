<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">logout</button>
    </form>
    <header>
        <h1>FashionablyLate</h1>
        <div class="header-right">
            <span>Admin</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">logout</button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>