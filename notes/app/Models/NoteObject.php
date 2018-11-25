<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteObject extends DataObject
{
  protected $fillable = ['title', 'content'];
}
