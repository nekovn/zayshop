@component('mail::message')

@if (!empty($user))
Chào {{ $user }},
@endif

<span style="font-weight: bold;">Mã xác minh của bạn là {{ $code }}</span>
<p>Sẽ hết hạn sau {{ $expire }} phút</p>
@component('mail::button', ['url' => $url])
Xác minh tại đây
@endcomponent

<br>
@if (!empty($url))
※ Nếu bạn không thể nhấp vào nút "Xác minh tại đây", hãy sao chép URL bên dưới và dán vào trình duyệt web của bạn.
<br>
➡ {{ $url }}
@endif
<br>
---------------------------
<br>
<b>TRUNG TÂM HỖ TRỢ</b>
<ul>
<li>Số điện thoại：{{ config('app.admin_tel') }}</li>
<li>E-mail: {{ config('app.admin_mail') }}</li>
</ul>
@endcomponent
