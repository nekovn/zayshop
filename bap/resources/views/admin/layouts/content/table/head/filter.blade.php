@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
    $options = config('app-settings-admin.filterShowRow');
    $form= Form::select('per_page', $options, $per_page, ['class' => 'form-select', 'id' => "$functionId-show-row"]);
@endphp
{!! $helper::showFilterForm(__('global.F.select.show.row'), $form, '', "$functionId-show-row", 'col-4') !!}

