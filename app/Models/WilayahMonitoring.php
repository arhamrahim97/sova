<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahMonitoring extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $table = 'wilayah_monitoring';

    public function desaKelurahan()
    {
        return $this->belongsTo(DesaKelurahan::class, 'desa_kelurahan_id');
    }
}
