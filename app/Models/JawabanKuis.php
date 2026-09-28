<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanKuis extends Model {
    use HasFactory;
    protected $table = 'jawaban_kuis';
    protected $guarded = ['id'];
}
