<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public static function generateSlug($string){

        $slug = Str::slug($string , '-');
        $original_slug = $slug;

        $exist = Project::where('slug' , $slug)->first();
        $c = 1;

        while($exist){
            $slug = $original_slug . '-' . $c;
            $exist = Project::where('slug' , $slug)->first();
            $c++;
        }
        return $slug;
    }

}
