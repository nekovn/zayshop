@php
    $items = [
        'history' => [
            'HÓA ĐƠN',
            'Số Phòng',
            'Mã số',
            'Ngày thanh toán',
            'Tình trạng',
            'Số tiền',
        ],
        'notify' => [
            'Nội dung',
            'Ngày tạo',
        ],

    ];
    $xhtml = '';
    if(array_key_exists($thead, $items)) {
        foreach ($items[$thead] as $item) {
            $xhtml.= "<th>$item</th>";
        }
    }

@endphp
<thead>
<tr>
    <th class="w-1">STT</th>
    {!! $xhtml !!}
    <th></th>
</tr>
</thead>
