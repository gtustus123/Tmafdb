<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'regions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'identifier_id',
        'localisation_type_id',
        'region_source_id',
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function identifier()
    {
        return $this->belongsTo(Identifier::class, 'identifier_id');
    }

    public function localisation_type()
    {
        return $this->belongsTo(LocalisationType::class, 'localisation_type_id');
    }

    public function region_source()
    {
        return $this->belongsTo(RegionSource::class, 'region_source_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
