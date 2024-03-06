<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Services\LinkService;
use Illuminate\Support\Facades\View;

class LinkController extends Controller
{
    public function __construct(private readonly LinkService $linkService)
    {
    }

    public function createForm()
    {
        return view('createLink');
    }

    public function store(StoreLinkRequest $request)
    {
        $shortLink = $this->linkService->createShortLink($request->getDto());

        return View::make('linkShortened')->with('shortLink', $shortLink);
    }

    public function redirect(string $token)
    {
        $redirectUrl = $this->linkService->getRedirectUrl($token);

        if (!$redirectUrl) {
            return redirect('/404');
        }

        return redirect($redirectUrl);
    }
}
