<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    use TraitUuid;

    protected $table = 'monitoring';

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function riwayatMonitoring()
    {
        return $this->hasMany(RiwayatMonitoring::class);
    }
}
