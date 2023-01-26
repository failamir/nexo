<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Competition extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const CATEGORY_SELECT = [
        'Lomba Paper'       => 'Lomba Paper',
        'Lomba Poster'      => 'Lomba Poster',
        'Lomba Electricity' => 'Lomba Electricity',
    ];

    public $table = 'competitions';

    protected $appends = [
        'icon',
    ];

    protected $dates = [
        'tanggal_mulai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_lomba',
        'category',
        'jumlah_submission',
        'biaya',
        'tanggal_mulai',
        'tanggal_selesai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getTanggalMulaiAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTanggalMulaiAttribute($value)
    {
        $this->attributes['tanggal_mulai'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getIconAttribute()
    {
        $file = $this->getMedia('icon')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
