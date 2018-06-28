<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_en
 * @property string $name_es
 * @property string $code
 * @property string $description
 * @property string $type
 * @property Agency[] $agencies
 * @property Discount[] $discounts
 * @property Hotel[] $hotels
 * @property Hotelplan[] $hotelplans
 * @property Hotelroom[] $hotelrooms
 * @property Mandatorysuppdiscount[] $mandatorysuppdiscounts
 * @property Mandatorysupplement[] $mandatorysupplements
 * @property Price[] $prices
 * @property Specialcondition[] $specialconditions
 * @property Supplement[] $supplements
 */
class Nomenclator extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'nomenclador';

    /**
     * @var array
     */
    protected $fillable = ['name_en', 'name_es', 'code', 'description', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agencies()
    {
        return $this->hasMany('App\Agency', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discounts()
    {
        return $this->hasMany('App\Discount', 'person_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hotels()
    {
        return $this->belongsToMany('App\Hotel', 'hotel_plan', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelplans()
    {
        return $this->hasMany('App\Hotelplan', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelrooms()
    {
        return $this->hasMany('App\Hotelroom', 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mandatorysuppdiscounts()
    {
        return $this->hasMany('App\Mandatorysuppdiscount', 'person_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mandatorysupplements()
    {
        return $this->hasMany('App\Mandatorysupplement', 'supp_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\Price', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialconditions()
    {
        return $this->hasMany('App\Specialcondition', 'condition_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplements()
    {
        return $this->hasMany('App\Supplement', 'supp_type_id');
    }
}
