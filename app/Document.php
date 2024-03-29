<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable =['user_id','report_id','category_id','filename','mime','original_filename'];

    public function report()
    {
        return $this->belongsTo(Report::class);
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
