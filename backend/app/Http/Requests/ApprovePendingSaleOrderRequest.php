<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ApprovePendingSaleOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only Admin that has permission to approve the pending sale order
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->role === User::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [];
    }
}
