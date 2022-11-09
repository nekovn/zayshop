@php
    $helper = new \App\Helpers\Blade\Table\auth\Helper;
    $config = config("app-settings-admin.thead.$thead");
    $subText = $helper::showSubTextSearch($searchBy, $config);
    $form = Form::text('search', '', ['class' => 'form-control', 'id' => "$functionId-search", 'autocomplete' => 'off']);
@endphp
{!! $helper::showFilterForm(__('global.F.search.data'), $form, $subText, "$functionId-search") !!}
