<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\PenggunaFactory> */
    use HasFactory, Notifiable;

    protected $table = 'pengguna';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'nama_pengguna',
        'email',
        'kata_sandi',
        'foto',
        'nomor_induk',
        'jenis_pengguna',
        'status',
        'terakhir_masuk_pada',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'kata_sandi' => 'hashed',
            'terakhir_masuk_pada' => 'datetime',
        ];
    }

    /**
     * Overrides the method to get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
