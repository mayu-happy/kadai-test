<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>送信完了 | FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo">FashionablyLate</a>
        </div>
    </header>

    <main>
        <div class="thanks__content">
            <h2>お問い合わせありがとうございます</h2>
            <p>送信が完了しました。</p>
            <div class="thanks__button">
                <a href="{{ route('contacts.index') }}">トップへ戻る</a>
            </div>
        </div>
    </main>
</body>

</html>