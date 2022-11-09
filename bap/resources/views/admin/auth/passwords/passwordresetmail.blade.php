@component('mail::message')
@if (!empty($user->full_name))
Chào {{ $user->full_name }},
@endif

<span style="font-weight: bold;">Mật khẩu của bạn đã được thay đổi.Bạn vui lòng ấn vào nút này để thực hiện thay đổi giúp {{ config('app.name') }} nhé</span>

@component('mail::button', ['url' => $url])
Đặt lại mật khẩu
@endcomponent
<br>
@if (!empty($url))
※ Nếu bạn không thể nhấp vào nút "Đặt lại mật khẩu", hãy sao chép URL bên dưới và dán vào trình duyệt web của bạn.
<br>
➡ {{ $url }}
@endif
<br>
-----------------
<br>
<b>TRUNG TÂM HỖ TRỢ</b>
<ul>
<li>Số điện thoại：{{ config('app.admin_tel') }}</li>
<li>E-mail: {{ config('app.admin_mail') }}</li>
</ul>

@endcomponent
