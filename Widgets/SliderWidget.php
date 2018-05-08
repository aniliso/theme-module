<?php namespace Modules\Theme\Widgets;


use Modules\Theme\Repositories\SlideRepository;

class SliderWidget
{
    private $slide;

    public function __construct(SlideRepository $slide)
    {
        $this->slide = $slide;
    }

    public function slide($slug="anasayfa", $view='slide')
    {
        if($slide = $this->slide->findBySlug($slug))
        {
            $slides = $slide->sliders()->published()->beetweendates()->get();
            return view('theme::widgets.'.$view, compact('slides'));
        }
        return null;
    }
}