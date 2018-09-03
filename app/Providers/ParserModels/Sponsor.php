<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/17/2018
 * Time: 11:05 AM
 */

namespace App\Providers\ParserModels;


class Sponsor
{
    public $main_tag;
    public $tag = "header";
    public $sponsor_code;

    public function getModelProperties(){

        $reflect = new \ReflectionClass($this);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC );

        $propName = [];
        foreach($props as $prop){
            if ($prop->getName() != "tag" and $prop->getName() != "main_tag" )
                array_push($propName, $prop->getName());
        }


        $prop_str = implode(",", $propName);

        return $prop_str;
    }

}