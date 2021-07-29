<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Species extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'species';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'kingdom',
        'taxon',
        'common_name',
        'official_name',
        'flag',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sequences()
    {
        return $this->belongsToMany(Sequence::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
