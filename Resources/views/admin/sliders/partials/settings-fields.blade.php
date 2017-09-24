<div class="box-body section-settings">
    <div class="row">
        <div class="col-md-6">
            <fieldset>
                <legend>Başlık Yazı Ayarları</legend>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.title_width") ? ' has-error' : '' }}">
                            {!! Form::label("settings.title_width", "Genişik".':') !!}
                            {!! Form::input('text', 'settings[title_width]', !isset($slider->settings->title_width) ?: $slider->settings->title_width, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.title_width", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.title_height") ? ' has-error' : '' }}">
                            {!! Form::label("settings.title_height", "Yükseklik".':') !!}
                            {!! Form::input('text', 'settings[title_height]', !isset($slider->settings->title_height) ?: $slider->settings->title_height, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.title_height", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_font_size]", "Font Boyutu", $errors, array_combine(range(1, 90, 1), range(1, 90, 1)), isset($slider->settings->title_font_size) ? $slider->settings->title_font_size : null) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_font_responsive]", "Font Boyutu (Mobile)", $errors, array_combine(range(1, 90, 1), range(1, 90, 1)), isset($slider->settings->title_font_responsive) ? $slider->settings->title_font_responsive : null) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.title_position_x") ? ' has-error' : '' }}">
                            {!! Form::label("settings.title_position_x", "Yatay Boşluk".':') !!}
                            {!! Form::input('text', 'settings[title_position_x]', !isset($slider->settings->title_position_x) ?: $slider->settings->title_position_x, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.title_position_x", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_position_h]", "Yatay Pozisyon", $errors, array('left'=>'Sol', 'center'=>'Orta', 'right'=>'Sağ'), isset($slider->settings->title_position_h) ? $slider->settings->title_position_h : null) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.title_position_y") ? ' has-error' : '' }}">
                            {!! Form::label("settings.title_position_y", "Dikey Boşluk".':') !!}
                            {!! Form::input('text', 'settings[title_position_y]', !isset($slider->settings->title_position_y) ?: $slider->settings->title_position_y, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.title_position_y", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_position_v]", "Dikey Pozisyon", $errors, array('Top'=>'Üst', 'center'=>'Orta', 'bottom'=>'Aşağı'), isset($slider->settings->title_position_v) ? $slider->settings->title_position_v : null) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_whitespace]", "Boşluk", $errors, array('normal'=>'Normal', 'nowrap'=>'Kaydırma Yok', 'pre'=>'Önce', 'pre-line'=>'Önce Satır', 'pre-wrap'=>'Önce Kaydır', 'initial' => 'İlk Satır'), isset($slider->settings->title_whitespace) ? $slider->settings->title_whitespace : null) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_line_height]", "Satır Aralığı", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->title_line_height) ? $slider->settings->title_line_height : null) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.title_color") ? ' has-error' : '' }}">
                            {!! Form::label("settings.title_color", "Renk".':') !!}
                            {!! Form::input('text', 'settings[title_color]', !isset($slider->settings->title_color) ?: $slider->settings->title_color, ['class'=>'form-control colorpicker']) !!}
                            {!! $errors->first("settings.title_color", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[title_align]", "Metin Hizalama", $errors, array('left'=>'Sola Yasla', 'right'=>'Sağa Yasla', 'center'=>'Ortala','justify' => 'Tam Yasla'), isset($slider->settings->title_align) ? $slider->settings->title_align : null) !!}
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset>
                <legend>İçerik Yazı Ayarları</legend>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.content_width") ? ' has-error' : '' }}">
                            {!! Form::label("settings.content_width", "Genişik".':') !!}
                            {!! Form::input('text', 'settings[content_width]', !isset($slider->settings->content_width) ?: $slider->settings->content_width, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.content_width", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.content_height") ? ' has-error' : '' }}">
                            {!! Form::label("settings.content_height", "Yükseklik".':') !!}
                            {!! Form::input('text', 'settings[content_height]', !isset($slider->settings->content_height) ?: $slider->settings->content_height, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.content_height", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_font_size]", "Font Boyutu", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->content_font_size) ? $slider->settings->content_font_size : null) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_font_responsive]", "Font Boyutu (Mobile)", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->content_font_responsive) ? $slider->settings->content_font_responsive : null) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.content_position_x") ? ' has-error' : '' }}">
                            {!! Form::label("settings.content_position_x", "Yatay Boşluk".':') !!}
                            {!! Form::input('text', 'settings[content_position_x]', !isset($slider->settings->content_position_x) ?: $slider->settings->content_position_x, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.content_position_x", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_position_h]", "Yatay Pozisyon", $errors, array('left'=>'Sol', 'center'=>'Orta', 'right'=>'Sağ'), isset($slider->settings->content_position_h) ? $slider->settings->content_position_h : null) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.content_position_y") ? ' has-error' : '' }}">
                            {!! Form::label("settings.content_position_y", "Dikey Boşluk".':') !!}
                            {!! Form::input('text', 'settings[content_position_y]', !isset($slider->settings->content_position_y) ?: $slider->settings->content_position_y, ['class'=>'form-control']) !!}
                            {!! $errors->first("settings.content_position_y", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_position_v]", "Dikey Pozisyon", $errors, array('Top'=>'Üst', 'center'=>'Orta', 'bottom'=>'Aşağı'), isset($slider->settings->content_position_v) ? $slider->settings->content_position_v : null) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_whitespace]", "Boşluk", $errors, array('normal'=>'Normal', 'nowrap'=>'Kaydırma Yok', 'pre'=>'Önce', 'pre-line'=>'Önce Satır', 'pre-wrap'=>'Önce Kaydır', 'initial' => 'İlk Satır'), isset($slider->settings->content_whitespace) ? $slider->settings->content_whitespace : null) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_line_height]", "Satır Aralığı", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->content_line_height) ? $slider->settings->content_line_height : null) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has("settings.content_color") ? ' has-error' : '' }}">
                            {!! Form::label("settings.content_color", "Renk".':') !!}
                            {!! Form::input('text', 'settings[content_color]', !isset($slider->settings->content_color) ?: $slider->settings->content_color, ['class'=>'form-control colorpicker']) !!}
                            {!! $errors->first("settings.content_color", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::normalSelect("settings[content_align]", "Metin Hizalama", $errors, array('left'=>'Sola Yasla', 'right'=>'Sağa Yasla', 'center'=>'Ortala','justify' => 'Tam Yasla'), isset($slider->settings->content_align) ? $slider->settings->content_align : null) !!}
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

@push('js-stack')
<script>
    jQuery(document).ready(function () {
        $('.colorpicker').colorpicker();
    });
</script>
@endpush

@push('css-stack')
<style>
.section-settings label {
    font-size: 12px;
}
</style>
@endpush