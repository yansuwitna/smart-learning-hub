<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanAi extends Model {
    use HasFactory;
    protected $table = 'pesan_ai';
    protected $guarded = ['id'];
}
