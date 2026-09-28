<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoinPengalaman extends Model {
    use HasFactory;
    protected $table = 'poin_pengalaman';
    protected $guarded = ['id'];
}
