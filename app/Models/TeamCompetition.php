<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamCompetition extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'team_competitions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tims()
    {
        return $this->belongsToMany(TimLomba::class);
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
