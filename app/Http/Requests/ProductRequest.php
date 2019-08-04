<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '_token' => 'required',
            'name' => 'required|min:1',
            'unit_price' => 'required|integer|min:0',
            'promotion_price' => 'integer|min:0',
            'id_type' => 'required',
            'image' =>'file|image|max:1024',
            'description' => 'required',
        ];
    }

    public function messages(){
        return [
            '_token.required' => 'Nhập mã token vào cho an toàn!',
            'name.required'  =>  'Sản phẩm không có tên à?',
            'name.min'  =>  'Sản phẩm không có tên à?',
            'unit_price.required'  =>  'Sản phẩm này miễn phí à?',
            'unit_price.integer'  =>  'Giá cả là 1 con số',
            'unit_price.min'  =>  'Giá cả là không có số âm',
            'promotion_price.integer'  =>  'Giá khuyến mãi là 1 con số',
            'promotion_price.min'  =>  'Giá khuyến mãi là không được âm',
            'image.image'  =>  'Đây không phải là ảnh',
            'image.max'  =>  'Ảnh lớn quá 1Mb.',
            'description.required'  =>  'Hãy mô tả sản phẩm này đi',
            'id_type.required'  =>  'Sản phẩm thuộc loại hàng nào?',
            
        ];
    }
        // public function attributes()
    // {
    //     return [
    //         '_token'            => '_token',
    //         'name'             => trans('name'),
    //         'unit_price'             => trans('name'),
    //         'promotion_price'       => 'promotion_price',
    //         'id_type' =>'id_type',
    //         'image' =>'image',
    //         'description' => 'description',
    //     ];
    // }
}
