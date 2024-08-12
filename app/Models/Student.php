<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //nome da tabela método protegido//
    protected $table='students';

    //Adicionar o campos da tabela
    protected $fillable = ['nome', 'curso'];

    use HasFactory; 
}
