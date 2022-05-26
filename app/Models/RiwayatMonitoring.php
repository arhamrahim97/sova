<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMonitoring extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $table = 'riwayat_monitoring';

    public function dokumen()
    {
        return $this->hasMany(DokumenMonitoring::class, 'riwayat_monitoring_id');
    }

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'monitoring_id');
    }
}
