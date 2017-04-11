<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    public function scopeActive($query)
    {
        $currentTime = Carbon::now()->toDateString();
        return $query->where('began_at', '<', $currentTime)->where('ended_at', '>', $currentTime);
    }

    public function product()
    {
    	return $this->belongsTo(Event::class);
    }
}
