<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $payment_method_id
 * @property string $code
 * @property string $name
 * @property string $address
 * @property string $zip_code
 * @property string $city
 * @property string $province
 * @property string $telephone
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property string $web
 * @property string $country
 * @property string $locale
 * @property string $currency
 * @property Nomenclador $nomenclador
 * @property Contact[] $contacts
 * @property Contract[] $contracts
 */
class Agency extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'agency';

    /**
     * @var array
     */
    protected $fillable = ['payment_method_id', 'code', 'name', 'address', 'zip_code', 'city', 'province', 'telephone', 'mobile', 'fax', 'email', 'web', 'country', 'locale', 'currency'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public $timestamps = false;
    public function nomenclador()
    {
        return $this->belongsTo('App\Nomenclador', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }
}
