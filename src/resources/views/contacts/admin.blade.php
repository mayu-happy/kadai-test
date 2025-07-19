@extends('layouts.admin')

@section('content')

<h1>お問い合わせ管理</h1>

<!-- 検索フォーム -->
<form class="search-form" action="{{ route('contacts.admin') }}" method="GET">
    <input type="text" name="name" placeholder="名前を入力">
    <input type="text" name="email" placeholder="メールアドレスを入力">

    <select name="gender">
        <option value="">全て</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
    </select>

    <select name="category">
        <option value="">全て</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <input type="date" name="created_at">

    <button type="submit">検索</button>
    <a href="{{ route('contacts.admin') }}">リセット</a>
</form>

<!-- 一覧テーブル -->
<table>
    <thead>
        <tr>
            <th>名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせ種類</th>
            <th>お問い合わせ内容</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>
                @if ($contact->gender == 1)
                男性
                @elseif ($contact->gender == 2)
                女性
                @else
                その他
                @endif
            </td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category ? $contact->category->name : '未分類' }}</td>
            <td>{{ Str::limit($contact->detail, 20) }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="details-link">詳細</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- ページネーション -->
{{ $contacts->links() }}

@endsection