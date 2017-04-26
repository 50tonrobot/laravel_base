<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Movie extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user_id', function (Builder $builder) {
            $builder->where('user_id', '=', Auth::id());
        });
    }

    public function lengthToString()
    {
        $zero = new \DateTime('2000-01-01');
        $zeroPlusLength = new \DateTime('2000-01-01');
        $zeroPlusLength->add(new \DateInterval('PT'.$this->Length.'M'));
        $interval = $zero->diff($zeroPlusLength);
        return $interval->format('%h hr %I m');
    }
}
