<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'landlord_id' => 'required|exists:landlords,id',
            'name' => 'required|min:3|max:40',
            'type' => 'required|in:Appartement,Maison,Villa,Room',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'location' => 'required',
            'city' => 'required',
            'country' => 'required',
            'persons' => 'required|integer|min:1|max:10',
            'rooms' => 'required|integer|min:1|max:10',
            'equipments' => 'required',
            'images' => 'max:10240',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
        ];
    }
    public function messages()
    {
        return [
            'landlord_id.required' => 'The landlord ID is required.',
            'landlord_id.exists' => 'The selected landlord does not exist.',
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 3 characters.',
            'name.max' => 'The name may not be greater than 40 characters.',
            'type.required' => 'The type field is required.',
            'type.in' => 'The selected type is invalid.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'description.required' => 'The description field is required.',
            'location.required' => 'The location field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.',
            'persons.required' => 'The persons field is required.',
            'persons.integer' => 'The persons must be an integer.',
            'persons.min' => 'The persons must be at least 1.',
            'persons.max' => 'The persons may not be greater than 10.',
            'rooms.required' => 'The rooms field is required.',
            'rooms.integer' => 'The rooms must be an integer.',
            'rooms.min' => 'The rooms must be at least 1.',
            'rooms.max' => 'The rooms may not be greater than 10.',
            'equipments.required' => 'The equipments field is required.',
            'images.required' => 'The images field is required.',
            'images.image' => 'The file must be an image.',
            'images.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'images.max' => 'The image may not be greater than 10MB.',
            'startdate.required' => 'The start date field is required.',
            'startdate.date' => 'The start date must be a valid date.',
            'enddate.required' => 'The end date field is required.',
            'enddate.date' => 'The end date must be a valid date.',
            'enddate.after_or_equal' => 'The end date must be after or equal to the start date.',
        ];
    }
}
