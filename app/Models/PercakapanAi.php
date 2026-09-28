<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercakapanAi extends Model {
    use HasFactory;
    protected $table = 'percakapan_ai';
    protected $guarded = ['id'];
}
