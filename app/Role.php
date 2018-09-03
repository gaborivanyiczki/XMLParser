<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

/**
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 */
class Role extends EntrustRole
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

}
