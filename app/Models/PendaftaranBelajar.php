<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranBelajar extends Model {
    use HasFactory;
    protected $table = 'pendaftaran_belajar';
    protected $guarded = ['id'];
}
