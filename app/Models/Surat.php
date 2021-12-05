<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penerimas()
    {
        return $this->belongsToMany(User::class, 'surats_users');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pemohon_id', 'id');
    }

    public function sign()
    {
        return $this->belongsTo(Sign::class);
    }
}
