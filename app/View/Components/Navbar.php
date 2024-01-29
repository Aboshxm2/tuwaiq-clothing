<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Category;
use App\Models\Group;
use Illuminate\View\Component;
use Illuminate\View\View;

class Navbar extends Component
{

    /**
     * @inheritDoc
     */
    public function render(): View
    {
        return view('layouts.navigation', ["groups" => Group::all(), "categories" => Category::all()]);
    }
}
