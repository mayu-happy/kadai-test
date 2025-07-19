@extends('layouts.app')

@section('content')

<div class="modal-bg">
    <div class="modal-content">
        <a href="{{ route('contacts.admin') }}" class="modal-close">&times;</a>

        <h2>お問い合わせ詳細</h2>

        <p><strong>お名前：</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
        <p><strong>性別：</strong> {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</p>
        <p><strong>メールアドレス：</strong> {{ $contact->email }}</p>
        <p><strong>電話番号：</strong> {{ $contact->telnumber }}</p>
        <p><strong>住所：</strong> {{ $contact->address }}</p>
        <p><strong>建物名：</strong> {{ $contact->building }}</p>
        <p><strong>お問い合わせ種類：</strong> {{ $contact->category ? $contact->category->name : '未分類' }}</p>
        <p><strong>お問い合わせ内容：</strong><br>{{ $contact->detail }}</p>

        <!-- 削除フォーム -->
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="margin-top: 1rem;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
        </form>

    </div>
</div>

@endsection