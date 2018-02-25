<?php namespace Modules\Theme\Widgets;


use Modules\Theme\Repositories\SlideRepository;

class SliderWidget
{
    private $slide;

    public function __construct(SlideRepository $slide)
    {
        $this->slide = $slide;
    }

    public function slide($slug="anasayfa")
    {
        if($slide = $this->slide->findBySlug($slug))
        {
            $slides = $slide->sliders()->published()->beetweendates()->get();
            return view('theme::widgets.slide', compact('slides'));
        }
        return null;
    }
}