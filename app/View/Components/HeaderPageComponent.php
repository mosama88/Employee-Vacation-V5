<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderPageComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $modalName,
        public string $url,
        public string $routeName,
        public string $modalIcon,
        public string $modalTitle,
        public string $previousPage,
        public string $currentPage
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-page-component');
    }
}
