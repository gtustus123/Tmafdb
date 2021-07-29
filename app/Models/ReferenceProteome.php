<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferenceProteome extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'reference_proteomes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'species_id',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id');
    }

    public function sequences()
    {
        return $this->belongsToMany(Sequence::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
