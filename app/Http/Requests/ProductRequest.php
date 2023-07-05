<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'information' => ['required', 'string','max:1000'],
            'price' => ['required', 'integer'],
            'sort_order' => ['nullable', 'integer'],
            'quantity' => ['required', 'integer','between:0,99'],
            'shop_id' => ['required', 'exists:shops,id'],
            'category' => ['required', 'exists:secondary_categories,id'],
            'image1' => ['nullable'],
            'image2' => ['nullable'],
            'image3' => ['nullable'],
            // 'image'=>'image|mimes:jpg,jpeg,png|max:2048',
            // 'files.*.image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'is_selling' => ['required','boolean'],
        ];
    }

    public function messages()
    {
        return [
            'image' => '指定されたファイルが画像ではありません。',
            'mines' => '指定された拡張子（jpg/jpeg/png）ではありません。',
            'image.max' => 'ファイルサイズが大きいです。',
        ];
    }
}
