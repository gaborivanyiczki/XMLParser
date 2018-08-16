<?php

namespace App\Http\Controllers;

use App\File;
use App\Providers\ParserHandler;
use App\Providers\ParserModels\ActivateCard;
use App\Providers\ParserModels\CardIssue;
use App\Providers\ParserModels\CardLoad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Vmorozov\FileUploads\Uploader;
use Orchestra\Parser\Xml\Facade as XMLParser;
use App\Providers\ParserModels\NewCardHolder;



class FilesController extends Controller
{

    public function index(){

        $files = File::all();

        return view('file.index', compact('files'));
    }

    public function store(Request $request){

        $fileObj = $request->file('file');

        $fileName = $fileObj->getClientOriginalName();

        $fileInDB = File::where('file_name',$fileName)->first();

        if ($fileInDB == null){
            $file = File::create([
                'file_name' => $fileName,
                'path' => 'user-uploads',
                'user_id' => Auth::user()->id
            ]);
        }else{
            return redirect()->back()->withErrors("File ".$fileName." exists in the db.");
        }

        $path = Uploader::uploadFile($fileObj, 'user-uploads');


        return redirect()->back()->with('message','File uploaded successfully.');
    }

    public function parse($id){

        $xml_string = ParserHandler::loadDocument($id);

        $modelCollection = Config::get('constants.requests');

        $path = Config::get('constants.namespace');

        $encode = ParserHandler::parseDocument($xml_string,$modelCollection,$path);

        echo "<pre>";
        var_dump($encode);
        echo "</pre>";




    }

    public function destroy($id){

        $file = File::where('id',$id)->first();

        $file_path = public_path().'/'.$file->path.'/'.$file->file_name;

        unlink($file_path);

        $file->delete();

       // Session::flash('message', 'Successfully deleted!');

        return Redirect::route('file.index');
    }

}
