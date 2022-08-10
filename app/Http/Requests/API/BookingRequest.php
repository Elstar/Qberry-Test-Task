<?php

namespace App\Http\Requests\API;

use App\Rules\RangeDate;
use App\Traits\APIResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Str;

class BookingRequest extends FormRequest
{
    use APIResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        try {
            $date_from = Carbon::createFromFormat('m/d/Y', $this->post('date_from'));
        } catch (Exception $exception) {
            throw new HttpResponseException(
                $this->sendError('Validation error', 422, ['data' => ['errors' => ['date_from' => 'Invalid format']]])
            );
        }
        try {
            $date_to = Carbon::createFromFormat('m/d/Y', $this->post('date_to'));
        } catch (Exception $exception) {
            throw new HttpResponseException(
                $this->sendError('Validation error', 422, ['data' => ['errors' => ['date_to' => 'Invalid format']]])
            );
        }
        return [
            'location' => 'required|int|exists:locations,id',
            'volume' => 'required|numeric|gt:0',
            'temperature' => 'required|numeric|lt:0',
            'date_from' => [
                'required',
                'date_format:m/d/Y',
                'after:now'
            ],
            'date_to' => [
                'required',
                'date_format:m/d/Y',
                'after:now',
                'after_or_equal:date_from',
                new RangeDate(
                    $date_from,
                    $date_to
                )
            ]
        ];
    }

    public function prepareForValidation()
    {
        if (empty($this->post())) {
            throw new HttpResponseException(
                $this->sendError('Not valid JSON', 422)
            );
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->sendError('Validation error', 422, ['errors' => $validator->errors()])
        );
    }
}
