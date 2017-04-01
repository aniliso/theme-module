<?php

namespace Modules\Theme\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Theme\Entities\Slide;
use Modules\Theme\Http\Requests\Slider\CreateSlideRequest;
use Modules\Theme\Http\Requests\Slider\UpdateSlideRequest;
use Modules\Theme\Repositories\SlideRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SlideController extends AdminBaseController
{
    /**
     * @var SlideRepository
     */
    private $slide;

    public function __construct(SlideRepository $slide)
    {
        parent::__construct();

        $this->slide = $slide;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $slides = $this->slide->all();

        return view('theme::admin.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('theme::admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CreateSlideRequest $request)
    {
        $this->slide->create($request->all());

        return redirect()->route('admin.theme.slide.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('theme::slides.title.slides')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slide $slide
     * @return Response
     */
    public function edit(Slide $slide)
    {
        return view('theme::admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Slide $slide
     * @param  Request $request
     * @return Response
     */
    public function update(Slide $slide, UpdateSlideRequest $request)
    {
        $this->slide->update($slide, $request->all());

        return redirect()->route('admin.theme.slide.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('theme::slides.title.slides')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Slide $slide
     * @return Response
     */
    public function destroy(Slide $slide)
    {
        $this->slide->destroy($slide);

        return redirect()->route('admin.theme.slide.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('theme::slides.title.slides')]));
    }
}
