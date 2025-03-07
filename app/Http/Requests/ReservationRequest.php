<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(Session::get('reservation_data'));
        $dates = \explode(' - ',$this->get("datefilter"));
        $startdate = Carbon::parse($dates[0])->format("Y-m-d");
        $enddate = Carbon::parse($dates[1])->format("Y-m-d");
        $this->merge([
            "startdate" => $startdate,
            "enddate" => $enddate,
        ]);
       
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'listing_id' => 'required|exists:listings,id',
            'tourist_id' => 'required|exists:tourists,id',
            'startdate' => 'required|date',
            'enddate' => 'required|after_or_equal:startdate',
            'guests' => 'required|numeric|min:1',
            'price' => 'required|decimal:2',
            'payment_method' => 'required|in:paypal,stripe',
        ];
    }
}
