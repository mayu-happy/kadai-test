<?php

return [

    'required' => ':attribute は必須項目です。',
    'email' => ':attribute は「ユーザー名@ドメイン」形式で入力してください',
    'unique' => ':attribute は既に使用されています。',
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください。',
    ],
    'max' => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],
    'custom' => [
        'name' => [
            'required' => 'お名前を入力してください',
        ],
        'email' => [
            'required' => 'メールアドレスを入力してください',
            'email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'unique' => 'このメールアドレスは既に登録されています。',
        ],
        'password' => [
            'required' => 'パスワードを入力してください',
        ],
    ],

];
