<?php

namespace Modules\Theme\Entities\Helpers;


class Position
{
    const LEFT = 'left';
    const CENTER = 'center';
    const RIGHT = 'right';
    const TOP = 'top';
    const BOTTOM = 'bottom';

    private $position_v = [];
    private $position_h = [];

    public function __construct()
    {
        $this->position_h = [
          self::LEFT => trans('theme::sliders.form.position.left'),
          self::CENTER => trans('theme::sliders.form.position.center'),
          self::RIGHT => trans('theme::sliders.form.position.right')
        ];

        $this->position_v = [
            self::TOP => trans('theme::sliders.form.position.top'),
            self::CENTER => trans('theme::sliders.form.position.center'),
            self::BOTTOM => trans('theme::sliders.form.position.bottom')
        ];
    }

    public function listH()
    {
        return $this->position_h;
    }

    public function listV()
    {
        return $this->position_v;
    }

    public function getPositionH($position)
    {
        if (isset($this->position_h[$position])) {
            return $this->position_h[$position];
        }

        return $this->position_h[self::LEFT];
    }

    public function getPositionV($position)
    {
        if (isset($this->position_v[$position])) {
            return $this->position_v[$position];
        }

        return $this->position_v[self::CENTER];
    }
}