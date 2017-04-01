<?php namespace Modules\Theme\Entities\Helpers;


class Target
{
    const _BLANK = '_blank';
    const _SELF  = '_self';
    const _PARENT = '_parent';
    const _TOP = '_top';

    private $targets = [];

    public function __construct()
    {
        $this->targets = [
          self::_BLANK => trans('theme::themes.form.targets.blank'),
          self::_PARENT => trans('theme::themes.form.targets.parent'),
          self::_SELF => trans('theme::themes.form.targets.self'),
          self::_TOP => trans('theme::themes.form.targets.top')
        ];
    }

    public function lists()
    {
        return $this->targets;
    }

    public function get($target)
    {
        if (isset($this->targets[$target])) {
            return $this->targets[$target];
        }

        return $this->targets[self::_SELF];
    }
}