<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'note',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
