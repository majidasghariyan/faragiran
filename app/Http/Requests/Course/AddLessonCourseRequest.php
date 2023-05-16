<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class AddLessonCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5',
            'price' => 'required|numeric',
        ];
    }
}
