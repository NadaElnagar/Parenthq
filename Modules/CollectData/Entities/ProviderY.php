<?php

namespace Modules\CollectData\Entities;

use Illuminate\Database\Eloquent\Model;

class ProviderY extends Model
{
    protected $table = 'data_provider_y';
    protected $fillable = ['balance','currency','email','status','y_id','y_created_at'];}
