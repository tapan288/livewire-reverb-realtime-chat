<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function createdAtHuman(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getCreatedAtHumanDate(),
        );
    }

    protected function getCreatedAtHumanDate(): string
    {
        $day = match (true) {
            $this->created_at->isToday() => 'Today',
            $this->created_at->isYesterday() => 'Yesterday',
            default => $this->created_at->toDateString()
        };

        return $day . ' at ' . $this->created_at->format('H:i a');
    }
}
