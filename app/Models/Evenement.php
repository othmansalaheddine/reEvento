<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory , SoftDeletes;
   

protected $fillable = [
    'titre', 
    'description',
     'lieu', 
     'date',
     'image',
      'places_number', 
      'category_id',
      'id_organisateur',
       'validation',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function organisateur()
    {
        return $this->belongsTo(User::class, 'id_organisateur');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_event');
    }
}
