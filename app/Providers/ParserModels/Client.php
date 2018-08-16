<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:44 AM
 */

namespace App\Providers\ParserModels;


class Client extends Parser
{
    public $tag = "new_client";
    public $main_tag = "client";
    public $client_code;
    public $client_name;
}