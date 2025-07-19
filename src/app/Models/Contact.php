<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'first_number',
        'middle_number',
        'last_number',
        'telnumber',
        'address',
        'building',
        'category_id',
        'detail',
    ];

    // ✅ カテゴリーリレーション追加
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }
}
