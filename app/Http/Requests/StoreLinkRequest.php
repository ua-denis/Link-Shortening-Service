<?php

namespace App\Http\Requests;

use App\Dto\StoreLinkDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'original_url' => ['required', 'url'],
            'transition_limit' => ['required', 'integer', 'min:0'],
            'lifetime' => ['required', 'integer', 'min:1', 'max:24'],
        ];
    }

    public function getDto(): StoreLinkDto
    {
        return StoreLinkDto::from([
            'originalUrl' => $this->original_url,
            'transitionLimit' => $this->transition_limit,
            'lifetime' => $this->lifetime,
        ]);
    }
}
