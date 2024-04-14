<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roombook extends Model {
    use HasFactory;
    protected $table = 'roombook';
    protected $primaryKey = 'id';

    protected $fillable = [
     'Name',
     'Email',
     'Country',
     'Phone',
     'RoomType',
     'Meal',
     'Bed',
     'NoofRoom',
     'cin',
     'cout'
    ];
}
