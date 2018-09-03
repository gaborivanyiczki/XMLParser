<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/14/2018
 * Time: 3:52 PM
 */

namespace App\Providers\ParserModels;


class Parser
{
    public $action_ref;
    public $tag;
    public $main_tag;
    public $status;
    public $result_code;
    public $result_detail;

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