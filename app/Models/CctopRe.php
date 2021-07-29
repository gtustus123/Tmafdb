<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CctopRe extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'cctop_res';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'identifier_id',
        'reliability',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function identifier()
    {
        return $this->belongsTo(Identifier::class, 'identifier_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
