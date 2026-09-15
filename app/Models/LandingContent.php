<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingContent extends Model
{
    use HasFactory;
    protected $fillable = ['section','title','subtitle','category','content','link_text','link_url','date_label','is_active','sort_order'];
    protected $casts = ['is_active'=>'boolean'];
}
