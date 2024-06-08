<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';
    protected $guarded = false;

    const STATUS_UNPUBLISHED = 0;
    const STATUS_PUBLISHED = 1;

    public static function getStatuses(): array
    {
        return [
            self::STATUS_UNPUBLISHED => 'Unpublished',
            self::STATUS_PUBLISHED => 'Published',
        ];
    }

    public function getStatus(): string
    {
        $roles = self::getStatuses();
        return $roles[$this->status] ?? 'Unknown';
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres');
    }


}
