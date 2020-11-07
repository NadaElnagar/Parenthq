<?php

namespace Modules\CollectData\Entities;

use Illuminate\Database\Eloquent\Model;

class ProviderX extends Model
{
    protected $table ='data_provider_x';
    protected $fillable = ['parent_amount','currency','parent_email','status_code','registeration_date','parent_identification'];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusCodeAttribute($value)
    {
        switch ($value) {
            case 'authorised':
                $returend_value = 1;
                break;
            case 'decline':
                $returend_value = 2;
                break;
            case 'refunded':
                $returend_value = 3;
                break;
        }
        $this->attributes['status_code'] = ($returend_value);

    }
}
