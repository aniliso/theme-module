<?php namespace Modules\Theme\Widgets;


use Modules\Theme\Repositories\SlideRepository;

class SliderWidget
{
    private $slide;

    public function __construct(SlideRepository $slide)
    {
        $this->slide = $slide;
    }

    public function slide($slug)
    {
        if($slide = $this->slide->findBySlug($slug))
        {
            return view('widgets.slider.slide', compact('slide'));
        }
        return null;
    }
}