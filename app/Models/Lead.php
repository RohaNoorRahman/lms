<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class Lead extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'phone',
    ];

    public function notes(){
        return $this->belongsToMany(Note::class,'lead_note');
    }
}
