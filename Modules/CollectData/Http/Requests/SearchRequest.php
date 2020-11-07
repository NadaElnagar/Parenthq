<?php

namespace Modules\CollectData\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class searchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provider' => 'in:DataProviderX,DataProviderY',
            'balanceMin' => 'in:DataProviderX,DataProviderY',
            'balanceMax' => 'in:DataProviderX,DataProviderY',
            'currency' => 'in:DataProviderX,DataProviderY',
            'statusCode' => 'in:DataProviderX,DataProviderY',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
