<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Pembayaran extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_PEMBAYARAN_SELECT = [
        'Belum Dibayar'       => 'Belum Dibayar',
        'Belum Terverifikasi' => 'Belum Terverifikasi',
        'Terverifikasi'       => 'Terverifikasi',
    ];

    public $table = 'pembayarans';

    protected $appends = [
        'bukti_pembayaran',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ketua_id',
        'competition_id',
        'status_pembayaran',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    public function getBuktiPembayaranAttribute()
    {
        $file = $this->getMedia('bukti_pembayaran')->last();
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
