<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    //
    public static function photo($request,$filename,$user,$default = null)
    {
    	$name = "";
    	$photo = $request->$filename;

    	if($request->hasFile($filename))
        {
            $ext = $photo->getClientOriginalExtension();
            $name = rand(11111,99999)."_".date('Y-m-d')."_".time().".".$ext;

            if($user=='agent')
            {
                $photo->storeAs('public/agents',$name);
            }
            elseif($user=='student')
            {
                $photo->storeAs('public/students',$name);
            }
            elseif($user=='user')
            {
                $photo->storeAs('public/users',$name);
            }
        }
        else 
        {
            $name = $default;
        }
        return $name;
    }
}
