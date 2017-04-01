<div class="box-header with-border">
    <h3 class="box-title">{{ trans('theme::slides.title.create slide') }}</h3>
</div>
<div class="box-body">

    {!! Form::normalInput('name', trans('theme::slides.form.name'), $errors, null, ['data-slug'=>'source']) !!}

    {!! Form::normalInput('slug', trans('theme::slides.form.slug'), $errors, null, ['data-slug'=>'target']) !!}

    <div class="form-group">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', 1, old('status'), ['class'=>'flat-blue']) !!}
        {!! Form::label('status', trans('theme::slides.form.status')) !!}
    </div>
</div>
