<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $agency_id
 * @property string $name
 * @property boolean $principal
 * @property string $telephone
 * @property string $email
 * @property string $department
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $zip_code
 * @property string $fax
 * @property string $mobile
 * @property string $ref
 * @property Agency $agency
 */
class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact';

    /**
     * @var array
     */
    protected $fillable = ['agency_id', 'name', 'principal', 'telephone', 'email', 'department', 'address', 'city', 'province', 'country', 'zip_code', 'fax', 'mobile', 'ref'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo('App\Agency');
    }
}
