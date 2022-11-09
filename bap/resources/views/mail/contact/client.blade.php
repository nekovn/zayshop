Thân chào quý khách "{!! nl2br(e($name)) !!}",

{{ config('app.name') }} đã nhận được email từ quý khách với tiêu đề "{!! nl2br(e($title)) !!}" tại mã hỗ trợ #{!! nl2br(e($code)) !!}.
{!! nl2br(e($content)) !!}

{{ config('app.name') }} luôn sẵn sàng phục vụ quý khách từ 8h-21h mỗi ngày (bao gồm thứ 7, CN và ngày Lễ/Tết).
{{ config('app.name') }} xin chân thành cảm ơn,

----------------------------------------------
TRUNG TÂM HỖ TRỢ
Số điện thoại：{{ config('app.admin_tel') }}
E-mail: {{ config('app.admin_mail') }}
