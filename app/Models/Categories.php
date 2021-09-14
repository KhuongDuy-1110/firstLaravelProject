<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    // dinh nghia table se lay du lieu
    protected $filetable = "categories";
    //neu trong table khong co 2 cot la create_at, update_at thi phai disable no di
    public $timestamps = false;
}
