<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapter';
    public $timestamps = false;
    protected $fillable = [
        'tieude','tomtat','is_active','slug_chapter','noidung'
        
    ];
    public function Post(){
        return $this->belongsTo(Post::class, 'truyen_id');
    }
}
