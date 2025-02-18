<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table = 'image';
    public $timestamps = false;
    protected $fillable = [
        'image','description'
    ];
    public function Post(){
        return $this->belongsTo(Post::class);
    }
}
