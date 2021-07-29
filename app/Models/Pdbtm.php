<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pdbtm extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TRANSMEMBRANE_SELECT = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public const TMTYPE_SELECT = [
        'Ca_Globular' => 'Ca_Globular',
        'Ca_Tm'       => 'Ca_Tm',
        'No_Protein'  => 'No_Protein',
        'Nucleotide'  => 'Nucleotide',
        'Pilus'       => 'Pilus',
        'Soluble'     => 'Soluble',
        'Tm_Alpha'    => 'Tm_Alpha',
        'Tm_Beta'     => 'Tm_Beta',
        'Tm_Coil'     => 'Tm_Coil',
        'Tm_Part'     => 'Tm_Part',
        'Virus'       => 'Virus',
    ];

    public $table = 'pdbtms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'matrix',
        'transmembrane',
        'qvalue',
        'tmtype',
        'x',
        'y',
        'z',
        'xx',
        'xy',
        'xz',
        'xt',
        'yx',
        'yy',
        'yz',
        'yt',
        'zx',
        'zy',
        'zz',
        'zt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
