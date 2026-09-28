<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercobaanKuis extends Model {
    use HasFactory;
    protected $table = 'percobaan_kuis';
    protected $guarded = ['id'];
}
