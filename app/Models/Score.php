<?php

// Initialize the needed method to query in database table scores

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gameVersion()
    {
        return $this->belongsTo(GameVersion::class)->withTrashed();
    }
}
