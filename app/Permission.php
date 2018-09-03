<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

/**
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Role[] $roles
 */
class Permission extends EntrustPermission
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
}
