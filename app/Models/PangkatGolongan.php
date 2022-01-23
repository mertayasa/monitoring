<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PangkatGolongan extends Model
{
    use HasFactory;

    protected $table = 'pangkat_golongan';

    protected $fillable = [
        'nama'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_pangkat_golongan');
    }
}
