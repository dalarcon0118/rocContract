<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $contract_id
 * @property string $name_es
 * @property string $content_es
 * @property Contract $contract
 */
class Anexo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'anexo';

    /**
     * @var array
     */
    protected $fillable = ['contract_id', 'name_es', 'content_es'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo('App\Contract');
    }
}
