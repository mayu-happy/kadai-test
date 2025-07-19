<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // 名前検索（姓・名・フルネーム）
        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'like', "%{$request->name}%")
                    ->orWhere('last_name', 'like', '%' . $request->name . '%')
                    ->orWhere('first_name', 'like', '%' . $request->name . '%');
            });
        }

        // メールアドレス検索
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // 性別検索
        if ($request->gender !== '全て' && $request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // お問い合わせ種類検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 日付検索
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // ページネーション
        $contacts = $query->paginate(7);
        $categories = Category::all();

        return view('contacts.index', [
            'contact' => $request->all() // 例：セッションやリクエストから渡す
        ]);
    }

    public function confirm(ContactRequest $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('contacts.index');
        }
        $validated = $request->validated();

        $tel = $validated['first_number'] . '-' . $validated['middle_number'] . '-' . $validated['last_number'];

        $category = Category::find($validated['category_id']);
        $categoryLabel = $category ? $category->name : '未分類';

        $contact = [
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'name' => $validated['last_name'] . '　' . $validated['first_name'],
            'gender_label' => $this->convertGender($validated['gender']), // 性別も変換関数にするとキレイ✨
            'email' => $validated['email'],
            'telnumber' => $tel,
            'address' => $validated['address'],
            'building' => $validated['building'],
            'category_label' => $categoryLabel,
            'detail' => $validated['detail'],
            'first_number' => $validated['first_number'],
            'middle_number' => $validated['middle_number'],
            'last_number' => $validated['last_number'],
            'category_id' => $validated['category_id'],
            'gender' => $validated['gender'],

        ];

        Session::put('contact_data', $contact);

        return view('contacts.confirm', [
            'contact' => Session::get('contact_data')
        ]);
    }


    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        $tel = $validated['first_number'] . '-' . $validated['middle_number'] . '-' . $validated['last_number'];
        $contact = Contact::create([
            'last_name'     => $validated['last_name'],
            'first_name'    => $validated['first_name'],
            // 'name'          => $validated['last_name'] . '　' . $validated['first_name'], // ← 合成版も欲しければ一緒に！
            'gender'        => (int)$validated['gender'],
            'email'         => $validated['email'],
            'address'       => $validated['address'],
            'building'      => $validated['building'],
            'category_id'   => (int)$validated['category_id'],
            'detail'        => $validated['detail'],
            'telnumber'     => $validated['first_number'] . '-' . $validated['middle_number'] . '-' . $validated['last_number'],
        ]);

        // カテゴリー名を取得（必要なら）
        $category = Category::find($contact->category_id);
        $categoryLabel = $category ? $category->name : '未分類';

        // セッションに保存（完了画面で表示する場合）
        session([
            'contact' => $contact,
            'categoryLabel' => $categoryLabel,
        ]);

        return redirect()->route('contacts.thanks', ['id' => $contact->id]);
    }


    public function list()
    {
        $contacts = Contact::paginate(10);
        return view('contacts.list', compact('contacts'));
    }
    // 詳細表示
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function admin(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'like', "%{$request->name}%")
                    ->orWhere('last_name', 'like', '%' . $request->name . '%')
                    ->orWhere('first_name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        if ($request->filled('gender') && $request->gender !== '') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $contacts = $query->paginate(10)->appends($request->query());

        $categories = Category::all();

        return view('contacts.admin', compact('contacts', 'categories'));
    }


    private function convertGender($value)
    {
        $labels = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        return $labels[$value] ?? '未設定';
    }

    public function thanks($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            abort(404);
        }


        return view('contacts.thanks', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('contacts.admin')->with('success', '削除しました！');
    }

    public function edit()
    {
        $contact = Session::get('contact_data');

        if (!$contact) {
            return redirect()->route('contacts.index');
        }

        return view('contacts.index', compact('contact'));
    }

    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 35; $i++) {
            Contact::create([
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'email' => $faker->safeEmail,
                'first_number' => '090',
                'middle_number' => $faker->numerify('####'),
                'last_number' => $faker->numerify('####'),
                'category_id' => $faker->numberBetween(1, 5),
                'detail' => $faker->realText(80),
            ]);
        }
    }
}
