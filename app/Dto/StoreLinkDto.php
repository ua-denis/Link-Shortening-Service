<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class StoreLinkDto extends Data
{
    public function __construct(
        public string $originalUrl,
        public int $transitionLimit,
        public int $lifetime,
    ) {
    }
}
