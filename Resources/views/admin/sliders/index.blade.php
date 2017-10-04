@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('theme::sliders.title.sliders') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('theme::sliders.title.sliders') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.theme.slider.create', [$slide->id]) }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('theme::sliders.button.create slider') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ trans('theme::sliders.form.ordering') }}</th>
                            <th>{{ trans('theme::sliders.form.image') }}</th>
                            <th>{{ trans('theme::sliders.form.title') }}</th>
                            <th>{{ trans('theme::sliders.form.start_at') }}</th>
                            <th>{{ trans('theme::sliders.form.end_at') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="sortable">
                        <?php if (isset($sliders)): ?>
                        <?php foreach ($sliders as $slider): ?>
                        <tr>
                            <td>
                                {{ $slider->id }}
                            </td>
                            <td>
                                {{ $slider->ordering }}
                            </td>
                            <td>
                                @if($slider->hasImage())
                                    {{ Html::image($slider->present()->firstImage(150,50,'fit',80)) }}
                                    @else
                                    {{ trans('theme::sliders.messages.image not found') }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.theme.slider.edit', [$slider->id]) }}">
                                    {{ $slider->title }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.theme.slider.edit', [$slider->id]) }}">
                                    {{ $slider->start_at->format('d.m.Y H:i') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.theme.slider.edit', [$slider->id]) }}">
                                    {{ $slider->end_at->format('d.m.Y H:i') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.theme.slider.edit', [$slider->id]) }}">
                                    {{ $slider->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.theme.slider.edit', [$slider->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.theme.slider.destroy', [$slider->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>{{ trans('theme::sliders.form.ordering') }}</th>
                            <th>{{ trans('theme::sliders.form.image') }}</th>
                            <th>{{ trans('theme::sliders.form.title') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('theme::sliders.title.create slider') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.theme.slider.create', [$slide->id]) ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
