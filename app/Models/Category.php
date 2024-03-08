<?php

namespace App\Models;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    public function evenements()
    {
        return $this->hasMany(Evenement::class, 'category_id');
    }
}
