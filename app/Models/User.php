<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    static $admin = 'admin';
    static $penilai = 'penilai';
    static $kontrak = 'kontrak';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'no_tlp',
        'jenis_kelamin',
        'level',
        'status',
        'email',
        'password',
        'foto',
        'id_unit_kerja',
        'id_jabatan',
        'id_pangkat_golongan',
        'tgl_mulai_kontrak',
        'tgl_selesai_kontrak',
        'no_kontrak',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = [
        'jabatan',
        'unitKerja',
        'pangkatGolongan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePenilai($query)
    {
        return $query->where('level', self::$penilai);
    }

    public function scopeAdmin($query)
    {
        return $query->where('level', self::$admin);
    }

    public function scopeKontrak($query)
    {
        return $query->where('level', self::$kontrak);
    }

    public function siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'id_user');
    }

    public function isAdmin()
    {
        return $this->attributes['level'] == self::$admin ? true : false;    
    }

    public function isPenilai()
    {
        return $this->attributes['level'] == self::$penilai ? true : false;    
    }

    public function isKontrak()
    {
        return $this->attributes['level'] == self::$kontrak ? true : false;    
    }

    public function getFoto()
    {
        $image_path = 'images/'.$this->attributes['foto'];
        $isExists = File::exists(public_path($image_path));
        if ($isExists and $this->attributes['foto'] != '') {
            return asset($image_path);
        } else {
            return asset('images/default/default_profil.png');
        }
    }

    public function getStatus()
    {
        return $this->attributes['status'] == 'nonaktif' ? 'Non Aktif' : 'Aktif';
    }

    public function getTglMulaiKontrak()
    {
        return !isNull($this->attributes['tgl_mulai_kontrak']) ? indonesianDate($this->attributes['tgl_mulai_kontrak']) : '-';
    }

    public function getTglLahir()
    {
        return !isNull($this->attributes['tgl_lahir']) ? indonesianDate($this->attributes['tgl_lahir']) : '-';
    }

    public function getTglSelesaiKontrak()
    {
        return !isNull($this->attributes['tgl_selesai_kontrak']) ? indonesianDate($this->attributes['tgl_selesai_kontrak']) : '-';
    }




    public function penilaiSkp()
    {
        return $this->hasMany(NilaiSkp::class, 'id_penilai');
    }

    public function kontrakSkp()
    {
        return $this->hasMany(NilaiSkp::class, 'id_pgw_kontrak');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja');
    }

    public function pangkatGolongan()
    {
        return $this->belongsTo(PangkatGolongan::class, 'id_pangkat_golongan');
    }
}
