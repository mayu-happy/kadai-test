<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header_logo">FashionablyLate</a>
        </div>
    </header>

    <main>
        <div class="contact-form_content">
            <div class="contact-form_heading">
                <h2>Contact</h2>
            </div>
            <form method="POST" action="{{ route('contacts.confirm') }}">
                @csrf
                <div class="name-fields">
                    <div class="name-item">
                        <label for="last_name">お名前（姓）<span class="required">※</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name', $contact['last_name'] ?? '') }}" placeholder="例：山田">
                        @error('last_name')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="name-item">
                        <label for="first_name">お名前（名）<span class="required">※</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name', $contact['first_name'] ?? '')}}" placeholder="例：太郎">
                        @error('first_name')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <br>

                <label>性別<span class="required">※</span></label>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}> 男性</label>
                    <label><input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性</label>
                    <label><input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他</label>

                    @error('gender')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <br>
                <label for="email">メールアドレス<span class="required">※</span></label>
                <input type="email" name="email" value="{{ old('email', $contact['email'] ?? '') }}" placeholder="例：test@example.com">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <br>
                <label for="telnumber">電話番号<span class="required">※</span></label>
                <div class="tel-fields">
                    <input type="text" name="first_number" value="{{ old('first_number') }}" placeholder="090">
                    @error('first_number')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <input type="text" name="middle_number" value="{{ old('middle_number') }}" placeholder="1234">
                    @error('middle_number')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <input type="text" name="last_number" value="{{ old('last_number') }}" placeholder="5678">
                    @error('last_number')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <br>
                <label for="address">住所<span class="required">※</span></label>
                <input type="text" name="address" value="{{ old('address') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
                @error('address')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <br>
                <label for="building">建物名</label>
                <input type="text" name="building" value="{{ old('building') }}" placeholder="例：メゾン桜203号室">
                <br>
                <label for="category_id">お問い合わせの種類<span class="required">※</span></label>
                <select name="category_id">
                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
                    <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>商品の交換について</option>
                    <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>商品のトラブル</option>
                    <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="5" {{ old('category_id') == 5 ? 'selected' : '' }}>その他</option>
                </select>
                @error('category_id')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <br>
                <label for="detail">お問い合わせ内容<span class="required">※</span></label>
                <textarea name="detail" rows="5" cols="30">{{ old('detail') }}</textarea>
                <!-- <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" required>{{ old('detail') }}</textarea> -->
                @error('detail')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <br>
                <!-- <label for="password">パスワード<span class="required">※</span></label> -->
                <!-- <input type="password" name="password" placeholder="例：coachtech1106" required> -->
                <button type="submit">確認画面</button>
            </form>
        </div>
    </main>

</body>

</html>