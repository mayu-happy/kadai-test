<!-- resources/views/contacts/list.blade.php -->

@extends('layouts.admin')

@section('content')
<h1>お問い合わせ一覧</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メール</th>
            <th>電話番号</th>
            <th>作成日</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->telnumber }}</td>
            <td>{{ $contact->created_at->format('Y-m-d') }}</td>
            <td><a href="{{ route('contacts.show', $contact->id) }}">詳細</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align:center;">該当するお問い合わせは見つかりませんでした。</td>
        </tr>
        @endforelse
    </tbody>
    </tbody>
</table>
{{ $contacts->links() }}
@endsection