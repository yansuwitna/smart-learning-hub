<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiPelajaran extends Model {
    use HasFactory;
    protected $table = 'isi_pelajaran';
    protected $guarded = ['id'];
}
