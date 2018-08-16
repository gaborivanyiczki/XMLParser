<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 12:47 PM
 */

namespace App\Providers;


use Orchestra\Parser\Xml\Facade as XMLParser;
use App\File;

class ParserHandler
{


    public static function parseDocument($xml_string,$collection, $path){


        foreach($collection as $model){
            $class = $path.$model;
            $obj = new $class();
            $props = $obj->getModelProperties();
            $new_cho_list[$obj->tag] = ["uses" => "$obj->main_tag.$obj->tag[$props]"];
        }

        $str = $xml_string->parse($new_cho_list);

        $encode = json_encode($str, JSON_PRETTY_PRINT);

        return $encode;
    }

    public static function loadDocument($id){

        $file = File::where('id',$id)->first();

        $file_path = public_path().'/'.$file->path.'/'.$file->file_name;

        $xml_string = XMLParser::load($file_path);

        return $xml_string;
    }

}