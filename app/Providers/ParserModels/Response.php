<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:23 AM
 */

namespace App\Providers\ParserModels;


class Response extends Parser
{
    public $status;
    public $result_code;
    public $result_detail;
}