<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LencanaPengguna extends Model {
    use HasFactory;
    protected $table = 'lencana_pengguna';
    protected $guarded = ['id'];
}
