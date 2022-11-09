<?php

namespace App\Helpers;

use App\Exceptions\ApplicationException;
use Illuminate\Support\Facades\Lang;

trait RenderIconSvg
{

    /**
     * @param $iconName
     * @return string
     */
    public static function renderElementIcon($iconName): string
    {
        $tagSvg = '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">';
        $path = "<path stroke='none' d='M0 0h24v24H0z' fill='none'></path>";
        $fileName = "renderIcon$iconName";
        if (method_exists(self::class,$fileName)) {
            $icon = self::$fileName();
            return "$tagSvg$path$icon</svg>";
        } else {
            throw new ApplicationException(Lang::get('global.T.exception.not.method.icon'));
        }
    }

    /**
     * Facebook Icon
     * @return string
     */
    public static function renderIconFacebook(): string
    {
        return '<path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>';
    }

    /**
     * Instagram Icon
     * @return string
     */
    public static function renderIconInstagram(): string
    {
        return '<rect x="4" y="4" width="16" height="16" rx="4"></rect>
                <circle cx="12" cy="12" r="3"></circle>
                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>';
    }

    /**
     * Twitter Icon
     * @return string
     */
    public static function renderIconTwitter(): string
    {
        return '<path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62
                3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803
                6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249
                1.51 -2.772 1.818 -4.013z"></path>';
    }

    /**
     * Home Icon
     * @return string
     */
    public static function renderIconHome(): string
    {
        return '<polyline points="5 12 3 12 12 3 21 12 19 12" />
				<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
				<path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />';
    }

    /**
     * Detail Icon
     * @return string
     */
    public static function renderIconDetail(): string
    {
        return '<path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                <path d="M18 12v-5a2 2 0 0 0 -2 -2h-2"></path>
                <rect x="8" y="3" width="6" height="4" rx="2"></rect>
                <path d="M8 11h4"></path>
                <path d="M8 15h3"></path>
                <circle cx="16.5" cy="17.5" r="2.5"></circle>
                <path d="M18.5 19.5l2.5 2.5"></path>';
    }

    /**
     * Login Icon
     * @return string
     */
    public static function renderIconLogin(): string
    {
        return '<path d="M20 12v-6a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2v8"></path>
                <path d="M4 18h17"></path>
                <path d="M18 15l3 3l-3 3"></path>';
    }

    /**
     * Nextボタン Icon
     * @return string
     */
    public static function renderIconPaginationPrev(): string
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="15 6 9 12 15 18"></polyline>
                </svg>';
    }

    /**
     * Prevボタン Icon
     * @return string
     */
    public static function renderIconPaginationNext(): string
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="9 6 15 12 9 18"></polyline>
                </svg>';
    }

    /**
     * Tell Icon
     * @return string
     */
    public static function renderIconTell(): string
    {
        return '<path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                <path d="M15 7a2 2 0 0 1 2 2"></path>
                <path d="M15 3a6 6 0 0 1 6 6"></path>';
    }

    /**
     * Address Icon
     * @return string
     */
    public static function renderIconAddress(): string
    {
        return '<circle cx="12" cy="11" r="3"></circle>
                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>';
    }

    /**
     * Mail Icon
     * @return string
     */
    public static function renderIconMail(): string
    {
        return '<path d="M12 18h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5"></path>
                <path d="M3 6l9 6l9 -6"></path>
                <path d="M15 18h6"></path>
                <path d="M18 15l3 3l-3 3"></path>';
    }

    /**
     * Contact Icon
     * @return string
     */
    public static function renderIconContact(): string
    {
        return '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="9 11 12 14 20 6"></polyline>
                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>';
    }

    /**
     * Twitter Icon
     * @return string
     */
    public static function renderIconAbout(): string
    {
        return '<circle cx="12" cy="12" r="4" />
				<circle cx="12" cy="12" r="9" />
				<line x1="15" y1="15" x2="18.35" y2="18.35" />
				<line x1="9" y1="15" x2="5.65" y2="18.35" />
				<line x1="5.65" y1="5.65" x2="9" y2="9" />
				<line x1="18.35" y1="5.65" x2="15" y2="9" />';
    }

    /**
     * ShareHouse Icon
     * @return string
     */
    public static function renderIconShareHouse(): string
    {
        return '<circle cx="12" cy="7" r="4"></circle>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h1"></path>
                <circle cx="16.5" cy="17.5" r="2.5"></circle>
                <path d="M18.5 19.5l2.5 2.5"></path>';
    }

    /**
     * Eye Password
     * @return string
     */
    public static function renderIconEyePassword(): string
    {
        return '<circle cx="12" cy="12" r="2"></circle>
                <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>';
    }

    /**
     * Eye Password
     * @return string
     */
    public static function renderIconEyeOffPassword(): string
    {
        return '<line x1="3" y1="3" x2="21" y2="21"></line>
                <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14
                 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>';
    }

    /**
     * About: Cung cấp thông tin phòng trọ
     * @return string
     */
    public static function renderIconHomeInfo(): string
    {
        return '<circle cx="12" cy="9" r="6"></circle>
                <polyline points="9 14.2 9 21 12 19 15 21 15 14.2" transform="rotate(-30 12 9)"></polyline>
                <polyline points="9 14.2 9 21 12 19 15 21 15 14.2" transform="rotate(30 12 9)"></polyline>';
    }

    /**
     * About: Nhà nguyên căn chất lượng
     * @return string
     */
    public static function renderIconHomeBuilding(): string
    {
        return '<path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                <line x1="13" y1="7" x2="13" y2="7.01"></line>
                <line x1="17" y1="7" x2="17" y2="7.01"></line>
                <line x1="17" y1="11" x2="17" y2="11.01"></line>
                <line x1="17" y1="15" x2="17" y2="15.01"></line>';
    }

    /*
     * About: Giá cả hợp lí
     *
     */
    public static function renderIconHomeDola(): string
    {
        return '<circle cx="12" cy="12" r="9"></circle>
                <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1"></path>
                <path d="M12 6v2m0 8v2"></path>';
    }

    /*
     * About: Tìm bạn ở ghép uy tín
     *
     */
    public static function renderIconHomeUser(): string
    {
        return '<circle cx="7" cy="5" r="2"></circle>
                <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path>
                <circle cx="17" cy="5" r="2"></circle>
                <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path>';
    }

    /*
     * Print: In hóa đơn
     *
     */
    public static function renderIconPrint(): string
    {
        return '<path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                <rect x="7" y="13" width="10" height="8" rx="2"></rect>';
    }

    /*
     * Dashboard: admin/dashboard Bảng điều khiển
     *
     */
    public static function renderIconDashboard(): string
    {
        return '<rect x="4" y="4" width="6" height="6" rx="1"></rect>
               <rect x="4" y="14" width="6" height="6" rx="1"></rect>
               <rect x="14" y="14" width="6" height="6" rx="1"></rect>
               <line x1="14" y1="7" x2="20" y2="7"></line>
               <line x1="17" y1="4" x2="17" y2="10"></line>';
    }

    /*
     * Client: admin/client Khách hàng
     *
     */
    public static function renderIconClient(): string
    {
        return '<circle cx="12" cy="7" r="4"></circle>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>';
    }

    /*
     * Admin: admin/admin Quản lý
     *
     */
    public static function renderIconAdmin(): string
    {
        return '<circle cx="12" cy="12" r="9"></circle>
                <circle cx="12" cy="10" r="3"></circle>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>';
    }

    /*
     * Room: admin/room Phòng trọ
     *
     */
    public static function renderIconRoom(): string
    {
        return '<path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                <line x1="13" y1="7" x2="13" y2="7.01"></line>
                <line x1="17" y1="7" x2="17" y2="7.01"></line>
                <line x1="17" y1="11" x2="17" y2="11.01"></line>
                <line x1="17" y1="15" x2="17" y2="15.01"></line>';
    }

    /*
     * Invoices: admin/invoices đã thanh toán tiền phòng
     *
     */
    public static function renderIconInvoices(): string
    {
        return '<circle cx="12" cy="9" r="6"></circle>
                <polyline points="9 14.2 9 21 12 19 15 21 15 14.2" transform="rotate(-30 12 9)"></polyline>
                <polyline points="9 14.2 9 21 12 19 15 21 15 14.2" transform="rotate(30 12 9)"></polyline>';
    }

    /*
     * Waiting: admin/waiting Đang chờ duyệt
     *
     */
    public static function renderIconWaiting(): string
    {
        return '<path d="M11.414 10l-7.383 7.418a2.091 2.091 0 0 0 0 2.967a2.11 2.11 0 0 0 2.976 0l7.407 -7.385"></path>
                <path d="M18.121 15.293l2.586 -2.586a1 1 0 0 0 0 -1.414l-7.586 -7.586a1 1 0 0 0 -1.414 0l-2.586 2.586a1 1 0 0 0 0 1.414l7.586 7.586a1 1 0 0 0 1.414 0z"></path>';
    }

    /*
     * Logout
     *
     */
    public static function renderIconLogout(): string
    {
        return '<path d="M4 12v-6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8"></path>
                <path d="M20 18h-17"></path>
                <path d="M6 15l-3 3l3 3"></path>';
    }

    /*
     * Notification : admin/notification
     *
     */
    public static function renderIconNotification(): string
    {
        return '<path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>';
    }

    /*
     * Book room : admin/book-room
     *
     */
    public static function renderIconBookRoom(): string
    {
        return '<path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                <path d="M9 14h.01"></path>
                <path d="M9 17h.01"></path>
                <path d="M12 16l1 1l3 -3"></path>';
    }

    /*
     * Banner : admin/banner
     *
     */
    public static function renderIconBanner(): string
    {
        return '<rect x="4" y="4" width="16" height="16" rx="2"></rect>
                <line x1="4" y1="16" x2="20" y2="16"></line>
                <path d="M4 12l3 -3c.928 -.893 2.072 -.893 3 0l4 4"></path>
                <path d="M13 12l2 -2c.928 -.893 2.072 -.893 3 0l2 2"></path>
                <line x1="14" y1="7" x2="14.01" y2="7"></line>';
    }

    /*
     * Banner : admin/banner
     *
     */
    public static function renderIconNews(): string
    {
        return '<path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path>
                <line x1="8" y1="8" x2="12" y2="8"></line>
                <line x1="8" y1="12" x2="12" y2="12"></line>
                <line x1="8" y1="16" x2="12" y2="16"></line>';
    }

    /*
     * Exchange : admin/exchange
     *
     */
    public static function renderIconExchange(): string
    {
        return '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                <path d="M12 3v3m0 12v3"></path>';
    }

    /*
     * Gold : admin/gold
     *
     */
    public static function renderIconGold(): string
    {
        return '<line x1="7" y1="20" x2="17" y2="20"></line>
                <path d="M6 6l6 -1l6 1"></path>
                <line x1="12" y1="3" x2="12" y2="20"></line>
                <path d="M9 12l-3 -6l-3 6a3 3 0 0 0 6 0"></path>
                <path d="M21 12l-3 -6l-3 6a3 3 0 0 0 6 0"></path>';
    }

    /**
     * Icon Log
     * @return string
     */
    public static function renderIconLog(): string
    {
        return '<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                <line x1="12" y1="11" x2="12" y2="14"></line>';
    }

    /**
     * Icon Create
     * @return string
     */
    public static function renderIconCreate():string
    {
        return '<line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>';
    }

}
