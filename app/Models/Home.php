<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'name','title','bg_img','resume','tw_link','fb_link','insta_link','skype_link','linkdin_link'
    ];
}
