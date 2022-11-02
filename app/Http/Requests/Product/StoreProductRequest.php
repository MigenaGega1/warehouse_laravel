<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;


class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Gate::allows('isAdmin')){
            return true;
        }}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fields.*.name' => 'required',
            'fields.*.price' => 'required',
            'fields.*.stock' => 'required',

        ];
    }
}
