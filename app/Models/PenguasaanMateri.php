<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenguasaanMateri extends Model {
    use HasFactory;
    protected $table = 'penguasaan_materi';
    protected $guarded = ['id'];
}
