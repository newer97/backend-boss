<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault();
    }

    protected $table = 'Event';
}
