<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    // protected $guarded = [];

    protected $fillable = ['caption', 'image', 'user_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($album) {
            $album->user_id = auth()->id(); // Mendapatkan user_id secara otomatis saat menyimpan data baru
        });
    }


    public function komentar()
    {
        return $this->hasMany(Komentar::class,'foto_id');
    }


}
