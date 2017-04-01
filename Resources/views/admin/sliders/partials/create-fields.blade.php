<div class="box-body">

    {!! Form::i18nInput("title", trans('theme::sliders.form.title'), $errors, $lang) !!}

    {!! Form::i18nInput("sub_title", trans('theme::sliders.form.sub_title'), $errors, $lang) !!}

    {!! Form::i18nTextarea("content", trans('theme::sliders.form.content'), $errors, $lang, null, ['class'=>'form-control']) !!}

    <div class="row link-type-depended link-external">
        <div class="col-md-2">
            {!! Form::i18nSelect("target", trans('theme::sliders.form.target'), $errors, $lang, $targets) !!}
        </div>
        <div class="col-md-4">
            {!! Form::i18nInput("link_title", trans('theme::sliders.form.link_title'), $errors, $lang) !!}
        </div>
        <div class="col-md-6">
            {!! Form::i18nInput("url", trans('theme::sliders.form.url'), $errors, $lang) !!}
        </div>
    </div>

    <div class="form-group link-type-depended link-internal">
        <div class="row">
            <div class="col-md-4">
                {!! Form::i18nInput("link_title", trans('theme::sliders.form.link_title'), $errors, $lang) !!}
            </div>
            <div class="col-md-8">
                {!! Form::label("{$lang}[uri]", trans('theme::sliders.form.uri')) !!}
                <div class='input-group{{ $errors->has("{$lang}[uri]") ? ' has-error' : '' }}'>
                    <span class="input-group-addon">/{{ $lang }}/</span>
                    {!! Form::text("{$lang}[uri]", old("{$lang}[uri]"), ['class' => 'form-control', 'placeholder' => trans('theme::sliders.form.uri')]) !!}
                    {!! $errors->first("{$lang}[uri]", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group link-type-depended link-page">
        <div class="row">
            <div class="col-md-4">
                {!! Form::i18nInput("link_title", trans('theme::sliders.form.link_title'), $errors, $lang) !!}
            </div>
            <div class="col-md-8">
                {!! Form::normalSelect("page_id", trans('theme::sliders.form.page'), $errors, $pages) !!}
            </div>
        </div>
    </div>
</div>
