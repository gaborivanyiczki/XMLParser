<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sponsor_code
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Request[] $requests
 */
class Country extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sponsor_code', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany('App\Request', 'sponsor_id');
    }

    public static function getName($sponsor){

        $sponsor = self::where('sponsor_code',$sponsor)->first();
        echo '<pre>';
        var_dump($sponsor);
        return $sponsor->name;
    }
}
