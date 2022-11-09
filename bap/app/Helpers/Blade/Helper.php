<?php

namespace App\Helpers\Blade;

use App\Helpers\RenderIconSvg;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;

class Helper
{

    static $configClient;
    use RenderIconSvg;

    public function __construct()
    {
        self::$configClient = config('app-settings-client');
    }

    /**
     * 連絡先：電話番号,メールアドレス
     * @param array $contacts ContactDefine
     * @param string $tagStart <tag>
     * @param string $tagEnd </tag>
     * @return string
     */
    public static function showContact($contacts): string
    {
        $xhtml = "";
        foreach ($contacts as $key => $concat) {
            $tagSvg = "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-brand-facebook ${concat['class']}' width='24' height='24'
                              viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>";
            $path = "<path stroke='none' d='M0 0h24v24H0z' fill='none'></path>";
            $title = ucfirst($key);
            $fileName = "renderIcon$title";
            $icon = self::$fileName();
            $xhtml .= "<li class='list-inline-item'>$tagSvg $path $icon</svg> ${concat['content']}</li>";
        }

        return $xhtml;
    }

    /**
     * ソーシャル: Facebook,Instagram,Twitter
     * @param array $socials ContactDefine
     * @param string $tagStart <tag>
     * @param string $tagEnd </tag>
     * @return string
     */
    public static function showSocial($socials): string
    {
        $xhtml = "";
        foreach ($socials as $key => $social) {
            $href = $social['href'];
            $tagSvg = "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-brand-facebook ${social['class']}' width='24' height='24'
                              viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>";
            $path = "<path stroke='none' d='M0 0h24v24H0z' fill='none'></path>";
            $title = ucfirst($key);
            $fileName = "renderIcon$title";
            $icon = self::$fileName();
            if (!empty($href)) {
                $xhtml .= "<a href='$href' class='btn' target='_blank' rel='noreferrer'>$tagSvg $path $icon</svg>$title</a>";
            }
        }
        return $xhtml;
    }

    /**
     * 評価：🌟🌟🌟🌟🌟を取得する
     * @param $checked
     * @return string
     */
    public static function getStar($checked): string
    {
        $xhtml = str_repeat("<i class='text-warning fa fa-star'></i>", $checked);
        $xhtml .= str_repeat("<i class='text-muted fa fa-star'></i>", bcsub(5, $checked, 1));
        return $xhtml;
    }

    /**
     * カテゴリーを表示する
     * @param $lists
     * @return string
     */
    public static function showCategories($lists): string
    {
        $xhtml = '';
        foreach ($lists as $list) {
            $city = $list['name'];
            $cityLink = $list['link'];
            $districts = $list['districts'];
            $districtsList = self::showElementList($districts);
            $xhtml .= "<li class='pb-3'>
                            <a class='collapsed d-flex justify-content-between h3 text-decoration-none' href='$cityLink'>
                                $city
                            <i class='fa fa-fw fa-chevron-circle-down mt-1'></i>
                            </a>
                            <ul class='collapse show list-unstyled pl-3 h5'>
                                $districtsList
                            </ul>
                       </li>";
        }
        return $xhtml;
    }

    /**
     * ページネーションを表示する
     * @param $pagination
     * @return string
     */
    public static function showElementPagination($pagination): string
    {
        $xhtml = '';
//        $iconPrev = 'self::renderBtnPaginationPrev()';
        $iconPrev = '';
//        $iconNext = self::renderBtnPaginationNext();
        $iconNext = '';
        $linkBtnPrev = "<li class='page-item disabled'><a class='page-link' href='#' tabindex='-1' aria-disabled='true'>$iconPrev</a></li>";
        $linkBtnNext = "<li class='page-item'><a class='page-link' href='#'>$iconNext</a></li>";
        foreach ($pagination as $page) {
            $active = $page['active'] ? 'disabled' : '';
            $activeClass = $page['active'] ? 'active' : '';
            $xhtml .= "<li class='page-item $activeClass'><a class='page-link $active' href='${page['link']}'>${page['page']}</a></li>";
        }
        return $linkBtnPrev . $xhtml . $linkBtnNext;
    }

    /**
     * Districtsリストを表示する
     * @param $lists
     * @return string
     */
    public static function showElementList($lists, $liClass = '', $aClass = 'text-decoration-none'): string
    {
        $xhtml = '';
        $liClass = $liClass ? "class='$liClass'" : '';
        $aClass = $aClass ? "class='$aClass'" : '';
        foreach ($lists as $list) {
            $xhtml .= "<li $liClass><a $aClass href='${list["link"]}'>${list["name"]}</a></li>";
        }
        return $xhtml;
    }

    /**
     * Userメニューを表示する
     * @param $menuUser
     * @return string
     */
    public static function showMenuUser($menuUser): string
    {
        $xhtml = '';
        foreach ($menuUser as $menu) {
            $icon = self::renderElementIcon($menu['icon']);
            $xhtml .= "<a href='${menu['link']}' class='nav-link px-0' rel='noreferrer' title='${menu['text']}'>$icon ${menu['text']}</a>";
        }
        return $xhtml;
    }

    /**
     * Interestカードを表示する
     * @param $cards
     * @return string
     */
    public static function showCardInterest($cards): string
    {
        $xhtml = '';
        foreach ($cards as $key => $card) {
            $btnSlider = self::showBtnSliderImage($card['image'], $key, 'Interest');
            $image = self::showImagerInnerCard($card['image'], $card['title']);
            $contentImg = self::showContentImageCard('carousel-indicators-thumb', $key, $btnSlider, $image, '');
            $content = self::showContentCard($card['title'], $card['link'], $card['price'], $card['area'], $card['district'], '');
            $xhtml .= "<div class='col-md-6'><div class='card'><div class='card-body row row-cards'>$contentImg $content</div></div></div>";
        }

        return $xhtml;
    }

    /**
     * Newsカードを表示する
     * @param $cards
     * @return string
     */
    public static function showCardNews($cards): string
    {
        $btnSeeNew = Arr::get(self::$configClient, 'btn-see-new');
        $width = Arr::get(self::$configClient, 'image-card-width');
        $height = Arr::get(self::$configClient, 'image-card-height');

        $xhtml = '';
        foreach ($cards as $card) {
            $xhtml .= "<div class='col-12 col-md-4 mb-4'>
                        <div class='card h-100'>
                            <a href='${card['link']}' title='${card['title']}'>
                                <img src='${card['image']}' class='card-img-top' alt='${card['title']}' width='$width' height='$height'>
                            </a>
                            <div class='card-body'>
                                <a title='${card['title']}' href='${card['link']}' class='h2 text-decoration-none text-dark limit-text'>${card['title']}</a>
                                <p class='text-dark'> ${card['address']}</p>
                            </div>
                            <p class='text-center'><a class='btn btn-primary' href='${card['link']}' title='$btnSeeNew'>$btnSeeNew</a></p>
                        </div>
                    </div>";
        }
        return $xhtml;
    }

    /**
     * Featuredカードを表示する
     * @param $cards
     * @return string
     */
    public static function showCardFeatured($cards): string
    {
        $xhtml = '';
        foreach ($cards as $key => $card) {
            $btnSlider = self::showBtnSliderImage($card['image'], $key, 'featured');
            $image = self::showImagerInnerCard($card['image'], $card['title']);
            $contentImg = self::showContentImageCard('carousel-indicators-thumb-vertical', $key, $btnSlider, $image, 'carousel-indicators-vertical');
            $content = self::showContentCard($card['title'], $card['link'], $card['price'], $card['area'], $card['district'], 'Hot');
            $xhtml .= "<div class='col-md-6'><div class='card'><div class='card-body row row-cards'>$contentImg $content</div></div></div>";
        }

        return $xhtml;
    }

    /**
     * @param $key
     * @param $btnSlider
     * @param $image
     * @return string
     */
    public static function showContentImageCard($id, $key, $btnSlider, $image, $class): string
    {

        return "<div id='$id$key' class='carousel slide carousel-fade col-md-6' data-bs-ride='carousel'>
                   <div class='carousel-indicators carousel-indicators-thumb $class'>$btnSlider</div>
                   <div class='carousel-inner'>$image</div>
                </div>";
    }

    /**
     * Relatedカードを表示する
     * @param $cards
     * @return string
     */
    public static function showCardRelated($cards): string
    {
        $textPrice = Arr::get(self::$configClient, 'text-price');
        $width = Arr::get(self::$configClient, 'image-card-width');
        $height = Arr::get(self::$configClient, 'image-card-height');

        $xhtml = '';
        foreach ($cards as $card) {
            $start = self::getStar($card['start']);
            $xhtml .= "<div class='p-2 pb-3'>
                            <div class='product-wap card rounded-0'>
                                <div class='card rounded-0'>
                                <img class='card-img rounded-0 img-fluid' src='${card['image']}' alt='${card['title']}' width='$width' height='$height'>
                                <div class='card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center'>
                                    <ul class='list-unstyled'>
                                        <li><a class='btn btn-success text-white mt-2' href='${card['link']}' title='${card['title']}'><i class='far fa-eye'></i></a></li>
                                    </ul>
                                </div>
                                </div>
                                <div class='card-body'>
                                    <a href='${card['link']}' class='h3 text-decoration-none limit-text-2' title='${card['title']}'>${card['title']}</a>
                                    <ul class='w-100 list-unstyled d-flex justify-content-between mb-0'><li class='limit-text-4'>${card['content']}</li></ul>
                                    <p class='list-unstyled d-flex justify-content-center mb-1'>$start</p>
                                    <p class='text-center mb-0'>${card['price']} $textPrice</p>
                                </div>
                            </div>
                        </div>";
        }

        return $xhtml;
    }

    /**
     * Sliderを表示する
     * @param $sliders
     * @return string
     */
    public static function showSliderInner($sliders): string
    {
        $width = Arr::get(self::$configClient, 'image-slider-width');
        $height = Arr::get(self::$configClient, 'image-slider-height');
        $classDiv = 'carousel-item';
        $classImg = 'd-block w-100';
        $xhtml = '';
        foreach ($sliders as $stt => $slider) {
            $classActive = $stt === 0 ? 'active' : '';
            $xhtml .= "<div class='$classDiv $classActive'>
                            <img class='$classImg' alt='${slider['title']}' src='${slider['image']}' width='$width' height='$height'>
                        </div>";
        }
        return $xhtml;
    }

    /**
     * Detailでカード右を表示する
     * @param $contents
     * @return string
     */
    public static function getDetailCardRightContent($contents): string
    {
        $xhtml = '';
        foreach ($contents as $content) {
            $xhtml .= self::getDetailCardRightContentHead($content);
            $xhtml .= "<div class='row'>";
            $xhtml .= self::getDetailCardRightContentArea($content);
            $xhtml .= self::getDetailCardRightContentDetail($content);
            $xhtml .= self::getDetailCardRightContentList($content);
            $xhtml .= self::getDetailCardRightContentContact($content);
            $xhtml .= "</div>";
        }
        return $xhtml;
    }

    /**
     * members/roomでカード右を表示する
     * @param $contents
     * @return string
     */
    public static function getDetailMyRoomContent($contents): string
    {
        $xhtml = '';
        $filterDetail = ['description', 'point'];
        $filterList = ['space_room', 'space_share'];
        foreach ($contents as $content) {
            $xhtml .= "<div class='row'>";
            $xhtml .= self::getDetailCardRightContentArea($content);
            $xhtml .= self::getDetailCardRightContentDetail($content, $filterDetail);
            $xhtml .= self::getDetailCardRightContentList($content, $filterList);
            $xhtml .= "</div>";
        }
        return $xhtml;
    }


    /**
     * カード右でheadを表示する
     * @param $content
     * @return string
     */
    public static function getDetailCardRightContentHead($content): string
    {
        $textPrice = Arr::get(self::$configClient, 'text-price');
        $start = self::getStar($content['start']);
        $xhtml = "<h1 class='h2'>${content['title']}</h1>";
        $xhtml .= "<p class='h3 py-2'>${content['price']} $textPrice</p>";
        $xhtml .= "<p class='py-2'>$start</p>";
        return $xhtml;
    }

    /**
     * カード右でareaを表示する
     * @param $content
     * @return string
     */
    public static function getDetailCardRightContentArea($content): string
    {
        $xhtml = "";
        $lists = Arr::get(self::$configClient, 'single-detail-card-right-area');
        foreach ($lists as $key => $value) {
            $xhtml .= self::getElementContentCard('col-sm-4', $value, $content[$key]);
        }
        return $xhtml;
    }

    /**
     * カード右でdetailを表示する
     * @param $content
     * @return string
     */
    public static function getDetailCardRightContentDetail($content, $filter=[]): string
    {
        $xhtml = "";
        $lists = Arr::get(self::$configClient, 'single-detail-card-right-single-detail');
        $filtered = Arr::except($lists, $filter);
        foreach ($filtered as $key => $value) {
            $xhtml .= self::getElementContentCard('col-sm-12', $value, $content[$key]);
        }
        return $xhtml;
    }

    /**
     * カード右でlistを表示する
     * @param $content
     * @return string
     */
    public static function getDetailCardRightContentList($content, $filter=[]): string
    {
        $xhtml = "";
        $lists = Arr::get(self::$configClient, 'single-detail-card-right-list');
        $filtered = Arr::except($lists, $filter);
        foreach ($filtered as $key => $value) {
            $contentList = "";
            foreach ($content[$key] as $list) {
                $contentList .= "<ul><li>$list</li></ul>";
            }
            $xhtml .= self::getElementContentCard('col-sm-12', $value, $contentList);
        }
        return $xhtml;
    }

    /**
     * カード右でContactを表示する
     * @param $content
     * @return string
     */
    public static function getDetailCardRightContentContact($content): string
    {
        $xhtml = "";
        $lists = Arr::get(self::$configClient, 'single-detail-card-right-contact');
        foreach ($lists as $key => $value) {
            $contentList = "";
            foreach ($content[$key] as $icon => $info) {
                $contentList .= "<div class='col-sm-6'><i class='fas $icon'></i><span class='card-text'>$info</span></div>";
            }
            $xhtml .= self::getElementContentCard('col-sm-12', $value, $contentList);
        }
        return $xhtml;
    }

    /**
     *  Single Detail カード左でsliderを表示する
     * @param $lists
     * @return string
     */
    public static function getSingleDetailCardLeftSlider($lists): string
    {
        $width = Arr::get(self::$configClient, 'single-single-detail-image-slider-width');
        $height = Arr::get(self::$configClient, 'single-single-detail-image-slider-height');
        $xhtml = "";
        foreach ($lists as $key => $list) {
            foreach ($list as $item) {
                $image = $item['image'];
                $title = $item['title'];
                $elmImg = self::setElementImage($image, $title, 'col', 'rounded', $width, $height);
                $xhtml .= $elmImg;
            }
        }
        return $xhtml;
    }

    /**
     * @param $src
     * @param $title
     * @param $classDiv
     * @param $classImg
     * @param $width
     * @param $height
     * @return string
     */
    public static function setElementImage($src, $title, $classDiv, $classImg, $width, $height): string
    {
        return "<div class='$classDiv'>
                   <a data-fslightbox='gallery' href='$src'>
                    <img class='$classImg' src='$src' alt='$title' title='$title' width='$width' height='$height'>
                   </a>
                </div>";
    }

    /**
     * @param $class
     * @param $value
     * @param $content
     * @return string
     *
     */
    public static function getElementContentCard($class, $value, $content): string
    {
        return "<div class='$class'>
                    <div class='card'>
                        <div class='card-body'>
                            <h2 class='h5 card-title'>$value</h5>
                            <p class='card-text'>$content</p>
                        </div>
                    </div>
                 </div>";
    }

    /**
     * About Service
     * @param $lists
     * @return string
     */
    public static function getElementAboutService($lists): string
    {
        $xhtml = '';
        foreach ($lists as $list) {
            $icon = self::renderElementIcon($list['icon']);
            $xhtml .= "<div class='col-md-6 col-lg-3 pb-5'>
                        <div class='h-100 py-5 services-icon-wap shadow'>
                            <div class='h1 text-image-hero text-center'>$icon</div>
                            <h2 class='h5 mt-4 text-center'>${list['title']}</h2>
                        </div>
                    </div>";
        }
        return $xhtml;
    }

    /**
     * 画像にスライドボタンを表示する
     * @param $images
     * @param string $type featured || related
     * @return string
     */
    public static function showBtnSliderImage($images, $key, $type): string
    {
        $xhtml = '';
        $src = config('app.url');
        $target = $type === "featured" ? "carousel-indicators-thumb-vertical$key" : "carousel-indicators-thumb$key";
        foreach ($images as $key => $image) {
            $classActive = $key === 0 ? 'active' : '';
            $xhtml .= "<button aria-label='$target' type='button' data-bs-target='#$target' data-bs-slide-to='$key'
            class='ratio ratio-4x3 $classActive' style='background-image: url($src/$image)'></button>";
        }
        return $xhtml;
    }

    /**
     * @param $images
     * @param $title
     * @return string
     */
    public static function showImagerInnerCard($images, $title): string
    {
        $width = Arr::get(self::$configClient, 'image-card-width-featured');
        $height = Arr::get(self::$configClient, 'image-card-height-featured');
        $xhtml = '';
        foreach ($images as $key => $image) {
            $classActive = $key === 0 ? 'active' : '';
            $xhtml .= "<div class='carousel-item $classActive'>
                        <img class='d-block w-100' alt='$title' src='$image' width='$width' height='$height'>
                      </div>";
        }
        return $xhtml;
    }

    /**
     * カード内容を表示する
     * @param $title
     * @param $price
     * @param $area
     * @param $district
     * @param $brand
     * @return string
     */
    public static function showContentCard($title, $link, $price, $area, $district, $brand): string
    {
        $brand = $brand ? self::showContentBrandCard($brand) : '';
        $title = self::showContentTitleCard($title, $link);
        $list = self::showContentListCard($price, $area, $district);
        return "<div class='col-md-6'>$brand $title $list</div>";
    }

    /**
     * Brandを表示する(New|Hot)
     * @param $brand
     * @return string
     */
    public static function showContentBrandCard($brand): string
    {
        $class = $brand === 'Hot' ? 'bg-red' : 'ribbon-top bg-red';
        return "<div class='ribbon $class'>$brand</div>";
    }

    /**
     * タイトルを表示する
     * @param $title
     * @param $link
     * @return string
     */
    public static function showContentTitleCard($title, $link): string
    {
        return "<div class='card-header'>
                    <a class='nav-link' href='$link'>
                        <h3 class='card-title'>$title</h3>
                    </a>
                </div>";
    }

    /**
     * コンテンツリストを表示する
     * @param $price
     * @param $area
     * @param $district
     * @return string
     */
    public static function showContentListCard($price, $area, $district): string
    {
        $textPrice = Arr::get(self::$configClient, 'text-price');
        $lists = [
            ['label' => Lang::get('global.C.single-detail.card.right.price_content'), 'content' => "$price $textPrice", 'class' => 'bg-red'],
            ['label' => Lang::get('global.C.single-detail.card.right.area'), 'content' => $area, 'class' => ''],
            ['label' => Lang::get('global.C.single-detail.card.right.district'), 'content' => $district, 'class' => 'bg-green'],
        ];
        $element = '';
        foreach ($lists as $list) {
            $element .= "<div class='col-auto'>
                            <span class='badge ${list["class"]}'></span>
                            <span class='pl-3'> ${list["label"]}: ${list["content"]}</span>
                        </div>";
        }

        $xhtml = "<div class='list-group-item'><div class='row align-items-center'>";
        $xhtml .= $element;
        $xhtml .= "</div></div>";


        return $xhtml;
    }

}
