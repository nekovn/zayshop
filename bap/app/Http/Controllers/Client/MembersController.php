<?php

namespace App\Http\Controllers\Client;

class MembersController
{


    public function __construct()
    {
    }

    public function info()
    {
        $fields = ['name', 'tell', 'email', 'gender', 'date_birth'];

        return view('client.member.index', [
            'contentTitle' => 'Thông tin thành viên',
            'route' => route('client.submit'),
            'fields' => $fields,
            'type' => 'form',
        ]);
    }

    public function account()
    {
        $fields = ['current_password', 'new_password'];
        return view('client.member.index', [
            'contentTitle' => 'Thay đổi mật khẩu',
            'route' => route('client.submit'),
            'fields' => $fields,
            'type' => 'form'
        ]);
    }

    public function avatar()
    {
        $fields = ['avatar', 'file'];
        return view('client.member.index', [
            'contentTitle' => 'Thay đổi hình đại diện',
            'route' => route('client.submit'),
            'fields' => $fields,
            'type' => 'form'
        ]);
    }
    public function room()
    {
        return view('client.member.index', [
            'contentTitle' => 'Thông tin phòng của tôi',
            'route' => route('client.submit'),
            'type' => 'card'
        ]);
    }

    public function pay()
    {
        return view('client.member.index', [
            'contentTitle' => 'Thanh toán tiền phòng tháng 08 - 2022',
            'route' => route('client.submit'),
            'type' => 'invoice'
        ]);
    }

    public function history()
    {
        return view('client.member.index', [
            'contentTitle' => 'Lịch sử đã thanh toán tiền phòng',
            'route' => route('client.submit'),
            'type' => 'table',
            'thead' => 'history'
        ]);
    }
    public function notify()
    {
        return view('client.member.index', [
            'contentTitle' => 'Thông báo từ quản trị viên',
            'route' => route('client.submit'),
            'type' => 'table',
            'thead' => 'notify'
        ]);
    }
    public function utility()
    {
        $fields = ['partner', 'amount', 'condition', 'agree'];
        return view('client.member.index', [
            'contentTitle' => 'Tìm bạn ở ghép',
            'route' => route('client.submit'),
            'fields' => $fields,
            'type' => 'form'
        ]);
    }
    public function policy()
    {
        return view('client.member.index', [
            'contentTitle' => 'Điều khoản và chính sách',
            'route' => route('client.submit'),
            'type' => 'text'
        ]);
    }



    public function edit()
    {
        return 'edit';
    }

    public function update()
    {
        return 'update';
    }

}
