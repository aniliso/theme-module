<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-settings">
    <i class="fa fa-cog"></i> Slayt Ayarları
</button>
<div class="modal fade" id="modal-settings">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sayfa Ayarları</h4>
            </div>
            <div class="modal-body">
                <div class="box-body section-settings">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has("settings.delay") ? ' has-error' : '' }}">
                                {!! Form::label("settings.delay", "Bekleme Süresi".':') !!}
                                {!! Form::input('text', 'settings[delay]', !isset($slider->settings->delay) ? 4000 : $slider->settings->delay, ['class'=>'form-control']) !!}
                                {!! $errors->first("settings.delay", '<span class="help-block">:message</span>') !!}
                            </div>
                            <fieldset>
                                <legend>Video Ayarları</legend>
                                <div class="row">
                                    <div class="col-md-2">
                                        {!! Form::normalSelect("settings[video_type]", "Video Tipi", $errors, ['ytid'=>'Youtube', 'vimeoid'=>'Vimeo'], isset($slider->settings->video_type) ? $slider->settings->video_type : 'youtube') !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::normalSelect("settings[video_loop]", "Video Tekrarı", $errors, ['loopandnoslidestop'=>'Oynat ve Durdur', 'loop'=>'Tekrar Et'], isset($slider->settings->video_loop) ? $slider->settings->video_loop : 'loopandnoslidestop') !!}
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has("settings.video_startat") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.video_startat", "Başlama Zamanı".':') !!}
                                            {!! Form::input('text', 'settings[video_startat]', !isset($slider->settings->video_startat) ? "00:00" : $slider->settings->video_startat, ['class'=>'form-control', 'id'=>'video_startat']) !!}
                                            {!! $errors->first("settings.video_startat", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has("settings.video_endat") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.video_endat", "Bitiş Zamanı".':') !!}
                                            {!! Form::input('text', 'settings[video_endat]', !isset($slider->settings->video_endat) ? "00:10" : $slider->settings->video_endat, ['class'=>'form-control', 'id'=>'video_endat']) !!}
                                            {!! $errors->first("settings.video_endat", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::normalSelect("settings[video_sound]", "Video Ses", $errors, ['mute'=>'Sesi Kapat', 'on'=>'Sesi Aç'], isset($slider->settings->video_sound) ? $slider->settings->video_sound : 'mute') !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::normalSelect("settings[video_firsttime]", "Bir Kez Oynat", $errors, ['false'=>'Kapalı', 'true'=>'Açık'], isset($slider->settings->video_firsttime) ? $slider->settings->video_firsttime : 'mute') !!}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Başlık Yazı Ayarları</legend>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.title_width") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.title_width", "Genişik".':') !!}
                                            {!! Form::input('text', 'settings[title_width]', !isset($slider->settings->title_width) ? 500 : $slider->settings->title_width, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.title_width", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.title_height") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.title_height", "Yükseklik".':') !!}
                                            {!! Form::input('text', 'settings[title_height]', !isset($slider->settings->title_height) ? 200 : $slider->settings->title_height, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.title_height", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_font_size]", "Font Boyutu", $errors, array_combine(range(1, 90, 1), range(1, 90, 1)), isset($slider->settings->title_font_size) ? $slider->settings->title_font_size : 50) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_font_responsive]", "Font Boyutu (Mobile)", $errors, array_combine(range(1, 90, 1), range(1, 90, 1)), isset($slider->settings->title_font_responsive) ? $slider->settings->title_font_responsive : 30) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.title_position_x") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.title_position_x", "Yatay Boşluk".':') !!}
                                            {!! Form::input('text', 'settings[title_position_x]', !isset($slider->settings->title_position_x) ? 100 : $slider->settings->title_position_x, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.title_position_x", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_position_h]", "Yatay Pozisyon", $errors, array('left'=>'Sol', 'center'=>'Orta', 'right'=>'Sağ'), isset($slider->settings->title_position_h) ? $slider->settings->title_position_h : 'left') !!}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.title_position_y") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.title_position_y", "Dikey Boşluk".':') !!}
                                            {!! Form::input('text', 'settings[title_position_y]', !isset($slider->settings->title_position_y) ? 0 : $slider->settings->title_position_y, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.title_position_y", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_position_v]", "Dikey Pozisyon", $errors, array('Top'=>'Üst', 'center'=>'Orta', 'bottom'=>'Aşağı'), isset($slider->settings->title_position_v) ? $slider->settings->title_position_v : 'center') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_whitespace]", "Boşluk", $errors, array('normal'=>'Normal', 'nowrap'=>'Kaydırma Yok', 'pre'=>'Önce', 'pre-line'=>'Önce Satır', 'pre-wrap'=>'Önce Kaydır', 'initial' => 'İlk Satır'), isset($slider->settings->title_whitespace) ? $slider->settings->title_whitespace : 'normal') !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_line_height]", "Satır Aralığı", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->title_line_height) ? $slider->settings->title_line_height : 42) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.title_color") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.title_color", "Renk".':') !!}
                                            {!! Form::input('text', 'settings[title_color]', !isset($slider->settings->title_color) ? '#cf1a1a' : $slider->settings->title_color, ['class'=>'form-control colorpicker']) !!}
                                            {!! $errors->first("settings.title_color", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[title_align]", "Metin Hizalama", $errors, array('left'=>'Sola Yasla', 'right'=>'Sağa Yasla', 'center'=>'Ortala','justify' => 'Tam Yasla'), isset($slider->settings->title_align) ? $slider->settings->title_align : 'left') !!}
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
                                            {!! Form::input('text', 'settings[content_width]', !isset($slider->settings->content_width) ? 300 : $slider->settings->content_width, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.content_width", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.content_height") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.content_height", "Yükseklik".':') !!}
                                            {!! Form::input('text', 'settings[content_height]', !isset($slider->settings->content_height) ? 200 : $slider->settings->content_height, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.content_height", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_font_size]", "Font Boyutu", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->content_font_size) ? $slider->settings->content_font_size : 30) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_font_responsive]", "Font Boyutu (Mobile)", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->content_font_responsive) ? $slider->settings->content_font_responsive : 20) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.content_position_x") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.content_position_x", "Yatay Boşluk".':') !!}
                                            {!! Form::input('text', 'settings[content_position_x]', !isset($slider->settings->content_position_x) ? 100 : $slider->settings->content_position_x, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.content_position_x", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_position_h]", "Yatay Pozisyon", $errors, array('left'=>'Sol', 'center'=>'Orta', 'right'=>'Sağ'), isset($slider->settings->content_position_h) ? $slider->settings->content_position_h : 'left') !!}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.content_position_y") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.content_position_y", "Dikey Boşluk".':') !!}
                                            {!! Form::input('text', 'settings[content_position_y]', !isset($slider->settings->content_position_y) ? 80 : $slider->settings->content_position_y, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.content_position_y", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_position_v]", "Dikey Pozisyon", $errors, array('Top'=>'Üst', 'center'=>'Orta', 'bottom'=>'Aşağı'), isset($slider->settings->content_position_v) ? $slider->settings->content_position_v : 'center') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_whitespace]", "Boşluk", $errors, array('normal'=>'Normal', 'nowrap'=>'Kaydırma Yok', 'pre'=>'Önce', 'pre-line'=>'Önce Satır', 'pre-wrap'=>'Önce Kaydır', 'initial' => 'İlk Satır'), isset($slider->settings->content_whitespace) ? $slider->settings->content_whitespace : 'normal') !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_line_height]", "Satır Aralığı", $errors, array_combine(range(2, 90, 2), range(2, 90, 2)), isset($slider->settings->content_line_height) ? $slider->settings->content_line_height : 32) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has("settings.content_color") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.content_color", "Renk".':') !!}
                                            {!! Form::input('text', 'settings[content_color]', !isset($slider->settings->content_color) ? '#4d4d4d' : $slider->settings->content_color, ['class'=>'form-control colorpicker']) !!}
                                            {!! $errors->first("settings.content_color", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::normalSelect("settings[content_align]", "Metin Hizalama", $errors, array('left'=>'Sola Yasla', 'right'=>'Sağa Yasla', 'center'=>'Ortala','justify' => 'Tam Yasla'), isset($slider->settings->content_align) ? $slider->settings->content_align : 'left') !!}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <fieldset>
                            <legend>Link Ayarları</legend>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has("settings.link_position_x") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.link_position_x", "Yatay Boşluk".':') !!}
                                            {!! Form::input('text', 'settings[link_position_x]', !isset($slider->settings->link_position_x) ?: $slider->settings->link_position_x, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.link_position_x", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::normalSelect("settings[link_position_h]", "Yatay Pozisyon", $errors, array('left'=>'Sol', 'center'=>'Orta', 'right'=>'Sağ'), isset($slider->settings->link_position_h) ? $slider->settings->link_position_h : null) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has("settings.link_position_y") ? ' has-error' : '' }}">
                                            {!! Form::label("settings.link_position_y", "Dikey Boşluk".':') !!}
                                            {!! Form::input('text', 'settings[link_position_y]', !isset($slider->settings->link_position_y) ?: $slider->settings->link_position_y, ['class'=>'form-control']) !!}
                                            {!! $errors->first("settings.link_position_y", '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::normalSelect("settings[link_position_v]", "Dikey Pozisyon", $errors, array('Top'=>'Üst', 'center'=>'Orta', 'bottom'=>'Aşağı'), isset($slider->settings->link_position_v) ? $slider->settings->link_position_v : null) !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">KAYDET VE KAPAT</button>
            </div>
        </div>
    </div>
</div>

@push('js-stack')
<script>
    jQuery(document).ready(function () {
        $('.colorpicker').colorpicker();
        $('#video_startat').datetimepicker({
            locale: '<?= App::getLocale() ?>',
            allowInputToggle: true,
            format: 'HH:mm'
        });
        $('#video_endat').datetimepicker({
            locale: '<?= App::getLocale() ?>',
            allowInputToggle: true,
            format: 'HH:mm'
        });
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

@push('css-stack')
<style>
    .modal-header {
        background: #3c8dbc;
        color: #ffffff;
    }

    .modal-footer {
        background: #ececec;
    }

    #modal-settings legend {
        padding: 5px 20px;
        background: #ebebeb;
        font-size: 14px;
        font-weight: bold;
    }
    .btn-block {
        margin-bottom: 10px;
    }
</style>
@endpush