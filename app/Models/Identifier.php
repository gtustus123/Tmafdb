<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Identifier extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'identifiers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'database_id',
        'sequence_id',
        'code',
        'flag',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function database()
    {
        return $this->belongsTo(Database::class, 'database_id');
    }

    public function sequence()
    {
        return $this->belongsTo(Sequence::class, 'sequence_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
