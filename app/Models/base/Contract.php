<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $currency_id
 * @property int $hotel_id
 * @property int $agency_id
 * @property int $market_id
 * @property int $sign_id
 * @property int $general_condition_id
 * @property int $number
 * @property string $ref_number
 * @property string $sign_date
 * @property string $status
 * @property string $dias_pago
 * @property Hotel $hotel
 * @property Generalcondition $generalcondition
 * @property Currency $currency
 * @property Market $market
 * @property Sign $sign
 * @property Agency $agency
 * @property Anexo[] $anexos
 * @property Specialcondition[] $specialconditions
 * @property Mandatorysupplement[] $mandatorysupplements
 * @property Price[] $prices
 */
class Contract extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contract';

    /**
     * @var array
     */
    protected $fillable = ['currency_id', 'hotel_id', 'agency_id', 'market_id', 'sign_id', 'general_condition_id', 'number', 'ref_number', 'sign_date', 'status', 'dias_pago'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo('App\Models\Base\Hotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function generalcondition()
    {
        return $this->belongsTo('App\Models\Base\Generalcondition', 'general_condition_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo('App\Models\Base\Currency');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function market()
    {
        return $this->belongsTo('App\Models\Base\Market');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sign()
    {
        return $this->belongsTo('App\Models\Base\Sign');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo('App\Models\Base\Agency');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anexos()
    {
        return $this->hasMany('App\Models\Base\Anexo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function specialconditions()
    {
        return $this->belongsToMany('App\Models\Base\Specialcondition');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mandatorysupplements()
    {
        return $this->hasMany('App\Models\Base\Mandatorysupplement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\Models\Base\Models\Base\Price');
    }
}
