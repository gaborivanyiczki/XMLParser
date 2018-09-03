<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/17/2018
 * Time: 4:57 PM
 */

namespace App\Providers;

use App\ActivateCard;
use App\AdditionalCard;
use App\CardIssue;
use App\CardLoad;
use App\CardReissue;
use App\Client;
use App\NewCardHolder;
use App\UpdateCardHolder;

class ModelFactory
{
    public static function create($modelType, $object){
        switch ($modelType){
            case "new_cho":
                return NewCardHolder::create($object);
                break;
            case "card_issue":
                return CardIssue::create($object);
                break;
            case "card_load":
                return CardLoad::create($object);
                break;
            case "activate_card":
                return ActivateCard::create($object);
                break;
            case "card_reissue":
                return CardReissue::create($object);
                break;
            case "add_card_issue":
                return AdditionalCard::create($object);
                break;
            case "upd_cho":
                return UpdateCardHolder::create($object);
                break;
            case "new_client":
                return Client::create($object);
                break;
            default:
                throw new \Exception("unknown model type");
        }
    }

}