<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanAi extends Model {
    use HasFactory;
    protected $table = 'penggunaan_ai';
    protected $guarded = ['id'];
}
