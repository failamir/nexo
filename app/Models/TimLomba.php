<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TimLomba extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'tim_lombas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'foto_anggota_1',
        'e_ktm_anggota_1',
        'bukti_anggota_1',
        'foto_anggota_2',
        'e_ktm_anggota_2',
        'bukti_anggota_2',
        'foto_anggota_3',
        'e_ktm_anggota_3',
        'bukti_anggota_3',
        'foto_anggota_4',
        'e_ktm_anggota_4',
        'bukti_anggota_4',
        'bukti_pembayaran',
    ];

    protected $fillable = [
        'ketua_id',
        'nama_tim',
        'institusi',
        'nomor_kontak_1',
        'nomor_kontak_2',
        'nama_anggota_1',
        'email_anggota_1',
        'nama_anggota_2',
        'email_anggota_2',
        'nama_anggota_3',
        'email_anggota_3',
        'nama_anggota_4',
        'email_anggota_4',
        'simpan_permanen',
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

    public function getFotoAnggota1Attribute()
    {
        $file = $this->getMedia('foto_anggota_1')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEKtmAnggota1Attribute()
    {
        $file = $this->getMedia('e_ktm_anggota_1')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBuktiAnggota1Attribute()
    {
        $file = $this->getMedia('bukti_anggota_1')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getFotoAnggota2Attribute()
    {
        $file = $this->getMedia('foto_anggota_2')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEKtmAnggota2Attribute()
    {
        $file = $this->getMedia('e_ktm_anggota_2')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBuktiAnggota2Attribute()
    {
        $file = $this->getMedia('bukti_anggota_2')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getFotoAnggota3Attribute()
    {
        $file = $this->getMedia('foto_anggota_3')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEKtmAnggota3Attribute()
    {
        $file = $this->getMedia('e_ktm_anggota_3')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBuktiAnggota3Attribute()
    {
        $file = $this->getMedia('bukti_anggota_3')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getFotoAnggota4Attribute()
    {
        $file = $this->getMedia('foto_anggota_4')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEKtmAnggota4Attribute()
    {
        $file = $this->getMedia('e_ktm_anggota_4')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBuktiAnggota4Attribute()
    {
        $file = $this->getMedia('bukti_anggota_4')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
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
