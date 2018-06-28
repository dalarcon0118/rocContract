<?php

namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property string $sign
 * @property string $user_name
 * @property string $serie
 * @property string $address
 * @property string $telephone
 * @property string $email
 * @property string $web
 * @property string $fax
 */
class Configuration extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'configuration';

    /**
     * @var array
     */
    protected $fillable = ['name', 'logo', 'sign', 'user_name', 'serie', 'address', 'telephone', 'email', 'web', 'fax'];

}
