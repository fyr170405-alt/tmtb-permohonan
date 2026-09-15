<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['step','label','field_name','field_type','options','placeholder','is_required','is_active','sort_order'];
    protected $casts = ['is_required'=>'boolean','is_active'=>'boolean','step'=>'integer'];
}
