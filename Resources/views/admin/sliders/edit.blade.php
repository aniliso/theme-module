@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('theme::sliders.title.edit slider') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.theme.slider.index', [$slider->slide->id]) }}">{{ trans('theme::sliders.title.sliders') }}</a></li>
        <li class="active">{{ trans('theme::sliders.title.edit slider') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.theme.slider.update', $slider->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('theme::admin.sliders.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        {!! Form::normalInput("video", trans('theme::sliders.form.video'), $errors, $slider) !!}
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat" name="button" value="index" >
                            <i class="fa fa-angle-left"></i>
                            {{ trans('core::core.button.update and back') }}
                        </button>
                        <button type="submit" class="btn btn-primary btn-flat">
                            {{ trans('core::core.button.update') }}
                        </button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.theme.slider.index', [$slider->slide->id])}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
        <div class="col-md-3">

            @include('theme::admin.sliders.partials.settings-fields')

            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group{{ $errors->has("start_at") ? ' has-error' : '' }}">
                        {!! Form::label("start_at", trans('theme::sliders.form.start_at').':') !!}
                        <div class='input-group date' id='start_at'>
                            <input type="text" class="form-control" name="start_at" value="{{ old('start_at', $slider->start_at->format('d.m.Y H:i')) }}"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        {!! $errors->first("start_at", '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group{{ $errors->has("end_at") ? ' has-error' : '' }}">
                        {!! Form::label("end_at", trans('theme::sliders.form.end_at').':') !!}
                        <div class='input-group date' id='end_at'>
                            <input type="text" class="form-control" name="end_at" value="{{ old('end_at', $slider->end_at->format('d.m.Y H:i')) }}"/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        {!! $errors->first("end_at", '<span class="help-block">:message</span>') !!}
                    </div>

                    {!! Form::hidden('slide_id', $slider->slide->id) !!}
                    {!! Form::normalInput("ordering", trans('theme::sliders.form.ordering'), $errors, $slider) !!}
                    <div class="form-group">
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::checkbox('status', 1, old('status', $slider->status), ['class'=>'flat-blue']) !!}
                        {!! Form::label('status', trans('theme::sliders.form.status')) !!}
                    </div>
                    <hr/>
                    @mediaSingle('sliderImage', $slider, null, trans('theme::sliders.form.image'))
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('menu::menu-items.link-type.link type') }}</h3>
                </div>
                <div class="box-body">
                    <div class="form-group link-type-depended link-page">
                        {!! Form::normalSelect("page_id", trans('theme::sliders.form.page'), $errors, $pages, $slider) !!}
                    </div>
                    <div class="form-group link-type-depended link-external">
                        {!! Form::normalInput("url", trans('theme::sliders.form.url'), $errors, $slider) !!}

                        {!! Form::normalSelect("target", trans('theme::sliders.form.target'), $errors, $targets) !!}
                    </div>
                    <div class="radio">
                        <input type="radio" id="link-page" name="link_type" value="page" {{ $slider->link_type === 'page' ? ' checked' : '' }}><label for="link-page">{{ trans('theme::sliders.form.link-type.page') }}</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="link-internal" name="link_type" value="internal" {{ $slider->link_type === 'internal' ? ' checked' : '' }}><label for="link-internal">{{ trans('theme::sliders.form.link-type.internal') }}</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="link-external" name="link_type" value="external" {{ $slider->link_type === 'external' ? ' checked' : '' }}><label for="link-external">{{ trans('theme::sliders.form.link-type.external') }}</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="link-none" name="link_type" value="none" {{ $slider->link_type === 'none' ? ' checked' : '' }}><label for="link-none">{{ trans('theme::sliders.form.link-type.none') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.theme.slider.index', [$slider->slide->id]) ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
            $('input[type="checkbox"]').on('ifChecked', function () {
                $(this).parent().find('input[type=hidden]').remove();
            });

            $('input[type="checkbox"]').on('ifUnchecked', function () {
                var name = $(this).attr('name'),
                        input = '<input type="hidden" name="' + name + '" value="0" />';
                $(this).parent().append(input);
            });

            $('.link-type-depended').hide();
            $('.link-{{ $slider->link_type }}').fadeIn();
            $('[name="link_type"]').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_flat-blue'
            }).on('ifChecked', function () {
                $('.link-type-depended').hide();
                $('.link-' + $(this).val()).fadeIn();
            });
            $('#start_at').datetimepicker({
                locale: '<?= App::getLocale() ?>',
                allowInputToggle: true,
                format: 'DD.MM.YYYY HH:mm'
            });
            $('#end_at').datetimepicker({
                locale: '<?= App::getLocale() ?>',
                allowInputToggle: true,
                format: 'DD.MM.YYYY HH:mm'
            });
        });
    </script>
@stop
