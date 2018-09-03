<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 12:47 PM
 */

namespace App\Providers;


use App\Country;
use App\NewCardHolder;
use App\Request;
use App\Response;
use App\Status;
use Illuminate\Support\Facades\Auth;
use Orchestra\Parser\Xml\Facade as XMLParser;
use App\File;

class ParserHandler
{


    public static function parseDocument($xml_string,$collection, $path){


        foreach($collection as $model){
            $class = $path.$model;
            $obj = new $class();
            $props = $obj->getModelProperties();
            if ($obj->main_tag)
                $new_cho_list[$obj->tag] = ["uses" => "$obj->main_tag.$obj->tag[$props]"];
            else
                $new_cho_list[$obj->tag] = ["uses" => "$obj->tag[$props]"];
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

    public static function storeContent($id,$xml_string,$collection,$path){

        $file = File::where('id',$id)->first();

        $fileType = self::getFileType($id);

        if ($fileType == 'request'){

            $requestInDB = Request::where('name',$file->file_name)->first();

            if ($requestInDB != null) {
                return redirect()->back()->withErrors("Request exists");
            }else {

                $parsed = self::parseDocument($xml_string,$collection,$path);

                $json = json_decode($parsed);

                self::storeRequest($json, $file);

                self::storeModels($file,$json);
            }

        }else{
            $responseInDB = Response::where('name',$file->file_name)->first();

            if ($responseInDB != null) {
                return redirect()->back()->withErrors("Response exists");
            }else {

                $parsed = self::parseDocument($xml_string,$collection,$path);

                $json = json_decode($parsed);

                self::storeResponse($file);

                self::storeStatus($file,$json);

            }
        }

    }


    public static function storeResponse($file){

        $filename = $file->file_name;
        $user_id = Auth::user()->id;

        $response = Response::create([
            'name' => $filename,
            'user_id' => $user_id
        ]);

        return response()->json([
            'response' => $response,
            'message' => 'Success'
        ], 200);

    }


    public static function storeRequest($json,$file){

        $filename = $file->file_name;
        $user_id = Auth::user()->id;

        foreach ($json->header as $item){
            if($item->sponsor_code)
            {
                $sponsor_code = $item->sponsor_code;
            }
        }

        $sponsor = Country::where('sponsor_code',$sponsor_code)->first();

        $request = Request::create([
                'name' => $filename,
                'sponsor_id' => $sponsor->id,
                'user_id' => $user_id
            ]);

        return response()->json([
                'request' => $request,
                'message' => 'Success'
            ], 200);

    }

    public static function storeModels($file, $json){

            $requestInDB = Request::where('name',$file->file_name)->first();

            $arr = get_object_vars($json);

            $allPropertiesAsArray = array_keys($arr);

            foreach ($allPropertiesAsArray as $property){

                if($property!="header"){
                    if($json->$property!=null){
                        foreach ($json->$property as $item) {
                            $objAsArray = get_object_vars($item);
                            $objAsArray['request_id'] = $requestInDB->id;
                            $objAsArray['sponsor_code'] = $requestInDB->country->sponsor_code;
                            $request = ModelFactory::create($property, $objAsArray);
                        }
                    }

                }
            }

            return response()->json([
                'request' => $request,
                'message' => 'Success'
            ], 200);
    }

    public static function storeStatus($file, $json){

        $responseInDB = Response::where('name',$file->file_name)->first();

        $arr = get_object_vars($json);

        $allPropertiesAsArray = array_keys($arr);

        foreach ($allPropertiesAsArray as $property){
            if($json->$property!=null){
                foreach ($json->$property as $item) {
                    $objAsArray = get_object_vars($item);
                    $objAsArray['response_id'] = $responseInDB->id;
                    $request = Status::create($objAsArray);
                }
            }

        }


    }


    public static function getFileType($id){

            $fileDB = File::where('id', $id)->first();

            $fileName = $fileDB->file_name;

            $findstr = 'request';

            $pos = strpos($fileName,$findstr);

            if ($pos === false)
               return 'response';

            return 'request';
    }

}