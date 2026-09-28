<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemajuanBelajar extends Model {
    use HasFactory;
    protected $table = 'kemajuan_belajar';
    protected $guarded = ['id'];
}
