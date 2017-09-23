<div class="box-body">
    {!! Form::i18nInput("title", trans('theme::sliders.form.title'), $errors, $lang, $slider) !!}

    {!! Form::i18nInput("sub_title", trans('theme::sliders.form.sub_title'), $errors, $lang, $slider) !!}

    {!! Form::i18nTextarea("content", trans('theme::sliders.form.content'), $errors, $lang, $slider, ['class'=>'form-control']) !!}

    <div class="form-group">
        <div class="row">
            <div class="col-md-4  link-type-depended link-internal link-external link-page">
                {!! Form::i18nInput("link_title", trans('theme::sliders.form.link_title'), $errors, $lang, $slider) !!}
            </div>
            <div class="col-md-8 link-type-depended link-internal">
                {!! Form::label("{$lang}[uri]", trans('theme::sliders.form.uri')) !!}
                <div class='input-group{{ $errors->has("{$lang}[uri]") ? ' has-error' : '' }}'>
                    <span class="input-group-addon">/{{ $lang }}/</span>
                    <?php $old = $slider->hasTranslation($lang) ? $slider->translate($lang)->uri : '' ?>
                    {!! Form::text("{$lang}[uri]", old("{$lang}[uri]", $old), ['class' => 'form-control', 'placeholder' => trans('theme::sliders.form.uri')]) !!}
                    {!! $errors->first("{$lang}[uri]", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-8 link-type-depended link-external">
                {!! Form::i18nSelect("target", trans('theme::sliders.form.target'), $errors, $lang, $targets, $slider) !!}
            </div>
        </div>
    </div>
</div>
