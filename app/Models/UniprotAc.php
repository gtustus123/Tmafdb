<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniprotAc extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'uniprot_acs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'identifier_id',
        'code',
        'flag',
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
