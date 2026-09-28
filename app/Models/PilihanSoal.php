<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanSoal extends Model {
    use HasFactory;
    protected $table = 'pilihan_soal';
    protected $guarded = ['id'];
}
