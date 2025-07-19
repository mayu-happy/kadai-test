<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <div class="contact__content">
            <div class="contact__heading">
                <h2>Confirm</h2>

                <form method="POST" action="{{ route('contacts.store') }}">
                    @csrf

                    <div class="contact-table">

                        <table class="contact-table__inner">

                            <tr>
                                <th>お名前</th>
                                <td>{{ $contact['name'] }}</td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td>{{ $contact['gender_label'] }}</td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td>{{ $contact['telnumber'] }}</td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td>{{ $contact['address'] }}</td>
                            </tr>
                            <tr>
                                <th>建物名・部屋番号</th>
                                <td>{{ $contact['building'] }}</td>
                            </tr>
                            <tr>
                                <th>お問い合わせ種別</th>
                                <td>{{ $contact['category_label'] }}</td>
                            </tr>

                            <tr>
                                <th>お問い合わせ内容</th>
                                <td>{{ $contact['detail'] }}</td>
                            </tr>
                        </table>

                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        <input type="hidden" name="first_number" value="{{ $contact['first_number'] }}">
                        <input type="hidden" name="middle_number" value="{{ $contact['middle_number'] }}">
                        <input type="hidden" name="last_number" value="{{ $contact['last_number'] }}">
                        <input type="hidden" name="telnumber" value="{{ $contact['telnumber'] }}">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        <input type="hidden" name="building" value="{{ $contact['building'] }}">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

                    </div>

                    <button type="submit">送信する</button>
                </form>


                <form method="GET" action="{{ route('contacts.index') }}">
                    <button type="submit">修正する</button>
                </form>

            </div>
    </main>
</body>

</html>