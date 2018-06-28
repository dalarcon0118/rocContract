<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $iban_nr
 * @property string $code
 * @property string $swift
 * @property string $beneficiary
 * @property string $reference
 * @property Hotel[] $hotels
 */
class Bank extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank';

    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'iban_nr', 'code', 'swift', 'beneficiary', 'reference'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }
}
