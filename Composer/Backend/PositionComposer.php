<?php

namespace Modules\Theme\Composer\Backend;


use Illuminate\Contracts\View\View;
use Modules\Theme\Entities\Helpers\Position;

class PositionComposer
{
    private $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    public function compose(View $view)
    {
        $listH = $this->position->listH();
        $listV = $this->position->listV();
        $view->with('positionListH', $listH);
        $view->with('positionListV', $listV);
    }
}