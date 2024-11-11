<?php

namespace App\Http\Requests;

use App\Enums\LoadServices;
use App\Enums\TransactionStatus;
use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(
        User $authenticatedUser,
        User $user,
    ): bool
    {
        return $authenticatedUser->id === $user->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:'.implode(',', TransactionType::getValues()),
            'description' => 'string',
            'amount' => 'required|numeric',
            'status' => 'required|in:'.implode(',', TransactionStatus::getValues()),
            'reference' => 'string',
            'load_service' => 'required_if:type,load|nullable|in:'.implode(',', LoadServices::getValues()),
            'phone_number' => 'required|string',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Transaction type is required.',
            'type.in' => 'Transaction type is invalid.',
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a string.',
            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a number.',
            'status.required' => 'Status is required.',
            'status.in' => 'Status is invalid. Must be one of: '.implode(', ', TransactionStatus::getValues()),
            'reference.required' => 'Reference is required.',
            'reference.string' => 'Reference must be a string.',
            'load_service.required_if' => 'Load service is required.',
            'load_service.in' => 'Load service is invalid. Must be one of: '.implode(', ', LoadServices::getValues()),
            'phone_number.required' => 'Phone number is required.',
            'phone_number.string' => 'Phone number must be a string.',
        ];
    }
}
