<?php

namespace App\Http\Requests;

use App\Enums\EnrollmentStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnrollmentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => [
                'required',
                'integer',
                'exists:students,id',
                Rule::unique('enrollments')->where(
                    fn ($query) => $query
                        ->where('subject_id', $this->input('subject_id'))
                        ->where('school_year', $this->input('school_year'))
                        ->where('semester', $this->input('semester'))
                ),
            ],
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'school_year' => ['required', 'string', 'max:9'],
            'semester' => ['required', 'string', 'max:20'],
            'status' => ['required', Rule::enum(EnrollmentStatus::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.unique' => 'This student is already enrolled in the selected subject for that school year and semester.',
        ];
    }
}
