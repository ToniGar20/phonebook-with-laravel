<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $timestamp = false;
    protected $visible = ['id','first_name', 'last_name', 'phone', 'phone_type', 'created_at'. 'updated_at'];

    protected $fillable = ['first_name', 'last_name', 'phone', 'phone_type'];


}
