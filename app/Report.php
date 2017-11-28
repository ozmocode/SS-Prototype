<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
      'title',
      'user_id',
      'category_id',
      'document_id',
      'report_code',
      'title',
      'description',
      'solution',
      'isValidated'
    ];

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
