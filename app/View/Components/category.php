<?php

namespace App\View\Components;

use App\Models\Category as ModelsCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\AssignOp\Mod;

class category extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.category',[
            'categories' => ModelsCategory::all(),
            'currentCategory' => ModelsCategory::whereSlug(request('category'))->first()
        ]);
    }
}
