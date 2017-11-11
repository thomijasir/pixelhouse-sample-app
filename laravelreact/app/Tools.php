<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomi
 * Date: 11/7/2017
 * Time: 8:35 PM
 */

namespace App;


use Illuminate\Support\Facades\URL;

class Tools
{
    public function __construct()
    {
    }

    public static function getDisplay($id){
        $getFilename = $id.".jpg";
        $getPath = base_path() . '/public/images';
        if(file_exists($getPath.'/'.$getFilename)){
            $getFullPath = URL::to('/').'/images/'.$getFilename;
        }else{
            $getFullPath = URL::to('/').'/images/defaults.png';
        }
        return $getFullPath;
    }

}