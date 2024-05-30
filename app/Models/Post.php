<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public $timestamps = false;
    protected $fillable = [
        'title', 'is_active', 'slide_url','content','tatgia','theloai','NXB','slug_truyen'
    ];
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function image(){
        return $this->hasMany(image::class);
    }
    public function chapter(){
        return $this->hasMany(Chapter::class,'truyen_id','id');
    }
}
