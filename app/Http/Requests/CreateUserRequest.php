<?php

declare(strict_types=1);

namespace App\Http\Requests;

final class CreateUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
