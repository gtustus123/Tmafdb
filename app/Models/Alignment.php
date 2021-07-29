<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alignment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'alignments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'seq_1_id',
        'seq_2_id',
        'alignment',
        'identity',
        'pair',
        'gap_1',
        'gap_2',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function seq_1()
    {
        return $this->belongsTo(Sequence::class, 'seq_1_id');
    }

    public function seq_2()
    {
        return $this->belongsTo(Sequence::class, 'seq_2_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
