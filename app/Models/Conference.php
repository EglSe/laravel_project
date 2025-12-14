<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;


class Conference extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'lecturer',
        'address',
        'date_time',
        'is_active',

    ];


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }


    // conference protection
    protected $casts = [
        'date_time' => 'datetime',
    ];

    protected function isPast(): Attribute
    {
        return Attribute::make(

            get: fn() => $this->date_time && $this->date_time->isPast(),
        );
    }

}

