<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenMonitoring extends Model
{
    use HasFactory;

    protected $table = 'dokumen_monitoring';
}
