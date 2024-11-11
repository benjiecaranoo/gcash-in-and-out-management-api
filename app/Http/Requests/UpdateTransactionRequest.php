<?php

namespace App\Http\Requests;

use App\Enums\LoadServices;
use App\Enums\TransactionStatus;
use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Container\Attributes\RouteParameter;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Let's use dependency injection to get the authenticated user and the transaction user
     */
    public function authorize(
        #[CurrentUser] User $authenticatedUser,
        #[RouteParameter('transaction')] Transaction $transactionUser,
    ): bool
    {
        return $authenticatedUser->id === $transactionUser->user_id;
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
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:'.implode(',', TransactionStatus::getValues()),
            'reference' => 'required|string',
            'load_service' => 'required_if:type,load|in:'.implode(',', LoadServices::getValues()),
            'phone_number' => 'required|string',
        ];
    }
}
