<?php

namespace App\Http\Controllers;

use App\Support\PublicLayoutDataBuilder;
use Illuminate\Contracts\View\View;

abstract class Controller
{
    protected function renderPublicPage(string $view, array $data = []): View
    {
        return view($view, [
            ...$data,
            'layoutData' => app(PublicLayoutDataBuilder::class)->build(),
        ]);
    }
}
