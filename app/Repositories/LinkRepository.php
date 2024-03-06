<?php

namespace App\Repositories;

use App\Dto\StoreLinkDto;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Support\Str;

class LinkRepository
{
    public function create(StoreLinkDto $dto): Link
    {
        do {
            $token = Str::random(8);
        } while (Link::query()->where('short_token', $token)->exists());

        return Link::query()->create([
            'original_url' => $dto->originalUrl,
            'short_token' => $token,
            'transition_limit' => $dto->transitionLimit,
            'expires_at' => Carbon::now()->addHours($dto->lifetime),
        ]);
    }

    public function findByToken(string $token): ?Link
    {
        return Link::query()->where('short_token', $token)
            ->where('expires_at', '>', now())
            ->where(function ($query) {
                $query->where('transition_limit', '=', 0)
                    ->orWhereRaw('transition_count < transition_limit');
            })
            ->first();
    }
}
