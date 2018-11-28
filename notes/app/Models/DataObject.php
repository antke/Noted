<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class DataObject extends Model
{
  protected $table = 'notes';
  protected $primaryKey = 'id';

  protected $dateFormat = "Y-m-d";
  protected $fillable = ['title', 'content'];
}
