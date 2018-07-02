<?php

namespace App\Models\base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_agencia
 * @property string $name
 * @property string $content_es
 * @property string $content_en
 * @property Agency $agency
 * @property Contract[] $contracts
 * @property ContractBygeneralCondition[] $contractBygeneralConditions
 */
class GeneralConditions extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'generalcondition';

    /**
     * @var array
     */
    protected $fillable = ['id_agencia', 'name', 'content_es', 'content_en'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo('App\Models\base\Agency', 'id_agencia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany('App\Contract', 'general_condition_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public $timestamps = false;
    public function contractBygeneralConditions()
    {
        return $this->hasMany('App\ContractBygeneralCondition', 'general_conditions_id');
    }
}
