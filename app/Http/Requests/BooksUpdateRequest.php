<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'books_name'         => 'required',
            'category_id'   => 'required',
            'publisher_id'   => 'required',
            'books_description' => 'required',
            'books_author'   => 'required',
            'books_quantity'      => 'required|numeric',
            'books_image'      => 'required',
            'books_price'    => 'required|numeric',
            'books_ISBN' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'books_name.required'    => 'Name field required',
            'category_id.required'  => 'Category field required',
            'publisher_id.required'  => 'Publisher field required',
            'books_author.required'    => 'Author field required'

        ];
    }
}
