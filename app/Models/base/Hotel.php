<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bank_id
 * @property string $name
 * @property int $category
 * @property string $address
 * @property string $telephone
 * @property string $fax
 * @property string $email
 * @property string $code
 * @property Bank $bank
 * @property Contract[] $contracts
 * @property Nomenclador[] $nomencladors
 * @property Hotelplan[] $hotelplans
 * @property Hotelroom[] $hotelrooms
 */
class Hotel extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hotel';

    /**
     * @var array
     */
    protected $fillable = ['bank_id', 'name', 'category', 'address', 'telephone', 'fax', 'email', 'code'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function nomencladors()
    {
        return $this->belongsToMany('App\Nomenclador', 'hotel_plan', null, 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelplans()
    {
        return $this->hasMany('App\Hotelplan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelrooms()
    {
        return $this->hasMany('App\Hotelroom');
    }
}
