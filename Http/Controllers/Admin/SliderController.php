<?php

namespace Modules\theme\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Media\Repositories\FileRepository;
use Modules\Page\Repositories\PageRepository;
use Modules\Theme\Entities\Helpers\Status;
use Modules\Theme\Entities\Helpers\Target;
use Modules\Theme\Entities\Slide;
use Modules\theme\Entities\Slider;
use Modules\Theme\Http\Requests\Slider\CreateSliderRequest;
use Modules\Theme\Http\Requests\Slider\UpdateSliderRequest;
use Modules\Theme\Repositories\SlideRepository;
use Modules\Theme\Repositories\SliderRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SliderController extends AdminBaseController
{
    /**
     * @var SliderRepository
     */
    private $slider;
    private $slide;
    private $file;

    public function __construct(
        SliderRepository $slider,
        SlideRepository $slide,
        PageRepository $page,
        FileRepository $file,
        Target $target,
        Status $status
    )
    {
        parent::__construct();

        $this->slider = $slider;
        $this->slide = $slide;
        $this->file = $file;

        view()->share('pages', $page->allForSelect());
        view()->share('targets', $target->lists());
        view()->share('statuses', $status->lists());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Slide $slide)
    {
        $sliders = $this->slide->find($slide->id)->sliders;
        return view('theme::admin.sliders.index', compact('sliders', 'slide'));
    }

    /**
     * @param Slide $slide
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Slide $slide)
    {
        $slides = $this->slide->slides();
        return view('theme::admin.sliders.create', compact('slides', 'slide'));
    }

    /**
     * @param CreateSliderRequest $request
     * @return mixed
     */
    public function store(CreateSliderRequest $request)
    {
        $slider = $this->slider->create($request->all());

        if($slide_id = $request->get('slide_id')) {
            $slide = $this->slide->find($slide_id);
            $slider->slide()->associate($slide);
            $slider->save();
        }

        return redirect()->route('admin.theme.slider.index', [$request['slide_id']])
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('theme::sliders.title.sliders')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slider $slider
     * @return Response
     */
    public function edit(Slider $slider)
    {
        return view('theme::admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Slider $slider
     * @param  Request $request
     * @return Response
     */
    public function update(Slider $slider, UpdateSliderRequest $request)
    {
        $this->slider->update($slider, $request->all());

        return redirect()->route('admin.theme.slider.index', [$slider->slide->id])
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('theme::sliders.title.sliders')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Slider $slider
     * @return Response
     */
    public function destroy(Slider $slider)
    {
        $this->slider->destroy($slider);

        return redirect()->route('admin.theme.slider.index',[$slider->slide->id])
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('theme::sliders.title.sliders')]));
    }
}
