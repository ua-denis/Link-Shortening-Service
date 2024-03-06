<?php

namespace App\Services;

use App\Dto\StoreLinkDto;
use App\Repositories\LinkRepository;

class LinkService
{
    public function __construct(private readonly LinkRepository $linkRepo)
    {
    }

    public function createShortLink(StoreLinkDto $dto): string
    {
        $link = $this->linkRepo->create($dto);

        return route('redirect', ['token' => $link->short_token]);
    }

    public function getRedirectUrl($token): ?string
    {
        $link = $this->linkRepo->findByToken($token);

        if ($link) {
            $link->increment('transition_count');

            return $link->original_url;
        }

        return null;
    }
}
