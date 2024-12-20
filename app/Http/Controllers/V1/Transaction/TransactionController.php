<?php

namespace App\Http\Controllers\V1\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, #[CurrentUser()] User $user)
    {
        /** TODO: add specific user transaction get data */
        $transactions = QueryBuilder::for(Transaction::class)
            ->where('user_id', $user->id)
            ->allowedFilters(['type', 'status'])
            ->allowedSorts(['created_at', 'amount'])
            ->simplePaginate($request->perPage());

        return TransactionResource::collection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request, #[CurrentUser()] User $user)
    {
        $transaction = Transaction::create(array_merge($request->validated(), ['user_id' => $user->id]));

        return new TransactionResource($transaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $this->authorize('view', $transaction);
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return new TransactionResource($transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);
        $transaction->delete();

        return response()->noContent();
    }
}
