<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

class tweet extends Model
{
    use HasFactory;
    use Likble;
    protected $guarded=[];
    public function user()
    {
     return $this->belongsTo(User::class);
    }
}
