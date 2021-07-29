<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PdbtmRegion extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pdbtm_regions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'region_id',
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
