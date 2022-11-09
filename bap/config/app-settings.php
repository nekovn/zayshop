<?php
$lang = require(resource_path('lang/vi/global.php'));
$labelName = $lang['L.contact.name'];
$labelTel = $lang['L.contact.tel'];
$labelMail = $lang['L.contact.mail'];
$labelGender = $lang['M.l.info.gender'];
$labelDateBirth = $lang['M.l.info.date_birth'];
$labelSubject = $lang['L.contact.subject'];
$labelTitle = $lang['T.title.name'];
$labelDes = $lang['T.description.name'];
$labelAddress = $lang['T.address'];
$labelDistrict = $lang['T.district'];
$labelPrice = $lang['T.price'];
$labelAcreage = $lang['T.acreage'];
$labelUtilities = $lang['T.utilities'];
$labelContact = $lang['T.contact'];
$labelPoint = $lang['T.point'];
$labelSpaceRoom = $lang['T.space_room'];
$labelSpaceShare = $lang['T.space_share'];
$labelPriceContent = $lang['T.price_content'];
$labelStart = $lang['T.start'];
$labelExist = $lang['T.exist'];
$labelDeleted = $lang['T.deleted'];
$labelRoomCode = $lang['T.room.code'];
$labelCustomerType = $lang['T.client.type'];
$labelFullName = $lang['T.full.name'];
$labelGender = $lang['T.gender'];
$labelBirthday = $lang['T.birthday'];
$labelAddr = $lang['T.addr'];
$labelCorName = $lang['T.corporate.name'];
$labelRemark = $lang['T.remark'];
$labelUserName = $lang['T.user.name'];


$labelTextarea = $lang['L.contact.textarea'];
$labelCurrentPassword = $lang['M.l.account.current.password'];
$labelConfirmPassword = $lang['M.l.account.confirm.password'];
$labelNewPassword = $lang['M.l.account.new.password'];
$labelUploadFile = $lang['M.l.avatar.upload.file'];
$labelImage = $lang['T.image'];
$labelStatus = $lang['T.status'];
$labelHot = $lang['T.hot'];
$labelCreatedAt = $lang['T.created_at'];
$labelUpdatedAt = $lang['T.updated_at'];
$labelCreatedBy = $lang['T.created_by'];
$labelUpdatedBy = $lang['T.updated_by'];
$labelEmail = $lang['T.email'];
$labelPhone = $lang['T.phone'];

$placeName = $lang['P.contact.name'];
$placeTel = $lang['P.contact.tel'];
$placeMail = $lang['P.contact.mail'];
$placeSubject = $lang['P.contact.subject'];
$placeTextarea = $lang['P.contact.textarea'];
$placeUploadFile = $lang['P.upload.file'];


$placeCurrentPassword = $lang['M.p.account.current.password'];
$placeConfirmPassword = $lang['M.p.account.confirm.password'];
$placeNewPassword = $lang['M.p.account.new.password'];

$subLabelNewPassword = $lang['M.sub.l.account.new.password'];
$subLabelTell = $lang['M.sub.l.account.tell'];
$subLabelEmail = $lang['M.sub.l.account.email'];
$subLabelUploadFile = $lang['M.sub.l.avatar.upload.file'];

$genderValue0 = $lang['M.l.info.gender.value0'];
$genderValue1 = $lang['M.l.info.gender.value1'];


$labelPartner = $lang['M.l.utility.partner'];
$labelAmount = $lang['M.l.utility.amount'];
$labelCondition = $lang['M.l.utility.condition'];

$subLabelPartner = $lang['M.sub.l.utility.partner'];
$subLabelAmount = $lang['M.sub.l.utility.amount'];
$subLabelCondition = $lang['M.sub.l.utility.condition'];

$placeCondition = $lang['M.p.utility.condition'];
$placeAmount = $lang['M.p.utility.amount'];
/*
|--------------------------------------------------------------------------
| アプリケーションの設定
|--------------------------------------------------------------------------
*/
return [
    //Featuredカード画像を設定
    'image-card-width-featured' => '285',
    'image-card-height-featured' => '189',
    //スライダー画像を設定
    'image-slider-width' => '399',
    'image-slider-height' => '349',
    //single single-detail スライダー画像を設定
    'single-single-detail-image-slider-width' => '130',
    'single-single-detail-image-slider-height' => '90',
    // 認証関連
    'admin' => [
        /*
        |--------------------------------------------------------------------------
        | パスワードポリシー
        |--------------------------------------------------------------------------
        | false             : 未使用
        | minlength         : 最小桁数
        | include-numeric   : 数値を含むこと
        | include-alphabet  : 英字を含むこと
        | include-symbol    : 記号を含むこと
        | frequently-phrases: よく使われるフレーズ、falseの場合、未使用
        |                     http://www.whatsmypass.com/the-top-500-worst-passwords-of-all-time
        |                     https://www.gizmodo.jp/2019/12/worst-passwords-2019.html
        */
        'password-policy' => [
            'minlength' => 6,
            'include-numeric' => false,
            'include-alphabet' => false,
            'include-symbol' => false,
            'frequently-phrases' => [
                4 => [
                    '1234', 'cool', '1313', 'star', 'golf', 'bear', 'dave', 'pass', 'aaaa', '6969',
                    'jake', 'matt', '1212', 'fish', 'fuck', 'porn', '4321', '2000', '4128', 'test',
                    'shit', 'love', 'baby', 'cunt', 'mark', '3333', 'john', 'sexy', '5150', '4444',
                    '2112', 'fred', 'mike', '1111', 'tits', 'paul', 'mine', 'king', 'fire', '5555',
                    'slut', 'girl', '2222', 'asdf', 'time', '7777', 'rock', 'xxxx', 'ford', 'dick',
                    'bill', 'wolf', 'blue', 'alex', 'cock', 'beer', 'eric', '6666', 'jack',
                ],
                5 => [
                    'beach', 'great', 'black', 'pussy', '12345', 'frank', 'tiger', 'japan', 'money', 'naked',
                    '11111', 'angel', 'stars', 'apple', 'porno', 'steve', 'viper', 'horny', 'ou812', 'kevin',
                    'buddy', 'teens', 'young', 'jason', 'lucky', 'girls', 'lover', 'brian', 'kitty', 'bubba',
                    'happy', 'cream', 'james', 'xxxxx', 'booty', 'kelly', 'boobs', 'penis', 'eagle', 'white',
                    'enter', 'chevy', 'smith', 'chris', 'green', 'sammy', 'super', 'magic', 'power', 'enjoy',
                    'scott', 'david', 'video', 'qwert', 'paris', 'women', 'juice', 'dirty', 'music', 'peter',
                    'bitch', 'house', 'hello', 'billy', 'movie', '12345', 'admin'
                ],
                6 => [
                    '123456', 'prince', 'guitar', 'butter', 'jaguar', 'united', 'turtle', 'muffin', 'cooper', 'nascar',
                    'redsox', 'dragon', 'zxcvbn', 'qwerty', 'tomcat', '696969', '654321', 'murphy', '987654', 'amanda',
                    'brazil', 'wizard', 'hannah', 'lauren', 'master', 'doctor', 'eagle1', 'gators', 'squirt', 'shadow',
                    'mickey', 'mother', 'monkey', 'bailey', 'junior', 'nathan', 'abc123', 'knight', 'alexis', 'iceman',
                    'fuckme', 'tigers', 'badboy', 'bonnie', 'purple', 'debbie', 'angela', 'jordan', 'andrea', 'spider',
                    'harley', 'ranger', 'dakota', 'booger', 'iwantu', 'aaaaaa', 'lovers', 'player', 'flyers', 'suckit',
                    'hunter', 'beaver', 'morgan', 'matrix', 'boomer', 'runner', 'batman', 'scooby', 'edward', 'thomas',
                    'walter', 'helpme', 'gordon', 'tigger', 'jackie', 'casper', 'robert', 'booboo', 'boston', 'monica',
                    'stupid', 'access', 'coffee', 'braves', 'xxxxxx', 'yankee', 'saturn', 'buster', 'gemini', 'barney',
                    'apples', 'soccer', 'rabbit', 'victor', 'august', 'hockey', 'peanut', 'tucker', 'killer', 'canada',
                    'george', 'johnny', 'sierra', 'blazer', 'andrew', 'spanky', 'doggie', '232323', 'winter', 'zzzzzz',
                    'brandy', 'gunner', 'beavis', 'compaq', 'horney', '112233', 'carlos', 'arthur', 'dallas', 'tennis',
                    'sophie', 'ladies', 'calvin', 'shaved', 'pepper', 'giants', 'surfer', 'fender', 'samson', 'austin',
                    'member', 'blonde', 'blowme', 'fucked', 'daniel', 'donald', 'golden', 'golfer', 'cookie', 'summer',
                    'bronco', 'racing', 'sandra', 'hammer', 'pookie', 'joseph', 'hentai', 'joshua', 'diablo', 'birdie',
                    'maggie', 'sexsex', 'little', 'biteme', '666666', 'topgun', 'ashley', 'willie', 'sticky', 'cowboy',
                    'animal', 'silver', 'yamaha', 'qazwsx', 'fucker', 'justin', 'skippy', 'orange', 'banana', 'lakers',
                    'marvin', 'merlin', 'driver', 'rachel', 'marine', 'slayer', 'angels', 'asdfgh', 'bigdog', 'vagina',
                    'apollo', 'cheese', 'toyota', 'parker', 'maddog', 'travis', '121212', 'london', 'hotdog', 'wilson',
                    'sydney', 'martin', 'dennis', 'voodoo', 'ginger', 'magnum', 'action', 'nicole', 'carter', 'erotic',
                    'sparky', 'jasper', '777777', 'yellow', 'smokey', 'dreams', 'camaro', 'xavier', 'teresa', 'freddy',
                    'secret', 'steven', 'jeremy', 'viking', 'falcon', 'snoopy', 'russia', 'taylor', 'nipple', '111111',
                    'eagles', '131313', 'winner', 'tester', '123123', 'miller', 'rocket', 'legend', 'flower', 'theman',
                    '123456', '111111', '123123', 'abc123', '654321', '555555', 'lovely', '888888', 'dragon', '123qwe',
                    '666666', '333333', '777777', 'donald', 'secret', 'bailey', 'shadow', '121212', 'biteme', 'ginger',
                    'please', 'oliver', 'albert'
                ],
                7 => [
                    'porsche', 'rosebud', 'chelsea', 'amateur', '7777777', 'diamond', 'tiffany', 'jackson', 'scorpio', 'cameron',
                    'testing', 'shannon', 'madison', 'mustang', 'bond007', 'letmein', 'michael', 'gateway', 'phoenix', 'thx1138',
                    'raiders', 'forever', 'peaches', 'jasmine', 'melissa', 'gregory', 'cowboys', 'dolphin', 'charles', 'cumshot',
                    'college', 'bulldog', '1234567', 'ncc1701', 'gandalf', 'leather', 'cumming', 'hunting', 'charlie', 'rainbow',
                    'asshole', 'bigcock', 'fuckyou', 'jessica', 'panties', 'johnson', 'naughty', 'brandon', 'anthony', 'william',
                    'ferrari', 'chicken', 'heather', 'chicago', 'voyager', 'yankees', 'rangers', 'packers', 'newyork', 'trouble',
                    'bigtits', 'winston', 'thunder', 'welcome', 'bitches', 'warrior', 'panther', 'broncos', 'richard', '8675309',
                    'private', 'zxcvbnm', 'nipples', 'blondes', 'fishing', 'matthew', 'hooters', 'patrick', 'freedom', 'fucking',
                    'extreme', 'blowjob', 'captain', 'bigdick', 'abgrtyu', 'chester', 'monster', 'maxwell', 'arsenal', 'crystal',
                    'rebecca', 'pussies', 'florida', 'phantom', 'scooter', 'success', '7777777', 'welcome', 'michael', 'freedom',
                    'charlie', 'letmein', 'zxcvbnm', 'nothing'
                ],
                8 => [
                    'firebird', 'password', '12345678', 'steelers', 'mountain', 'computer', 'baseball', 'xxxxxxxx', 'football', 'qwertyui',
                    'jennifer', 'danielle', 'sunshine', 'starwars', 'whatever', 'nicholas', 'swimming', 'trustno1', 'midnight', 'princess',
                    'startrek', 'mercedes', 'superman', 'bigdaddy', 'maverick', 'einstein', 'dolphins', 'hardcore', 'redwings', 'cocacola',
                    'michelle', 'victoria', 'corvette', 'butthead', 'marlboro', 'srinivas', 'internet', 'redskins', '11111111', 'access14',
                    'iloveyou', '1q2w3e4r', 'princess', '1qaz2wsx', 'sunshine', 'football', '!@#$%^&*', 'aa123456', 'passw0rd', 'mistress',
                    'rush2112', 'scorpion', 'iloveyou', 'samantha', 'anhyeuem'
                ],
                9 => [
                    '123456789', 'qwerty123', 'password1', 'liverpool', '987654321'
                ],
                10 => [
                    'qwertyuiop', '1q2w3e4r5t'
                ]
            ],
        ],
        /*
        |--------------------------------------------------------------------------
        | メール認証トークン有効期限（分）
        |--------------------------------------------------------------------------
        */
        'limit' => 60
    ],
    //gender default setting value
    'select-gender-default' => '1',
    'thead' => [
        'contact' => [
            'id' => '',
            'client' => $lang['T.contact.client'],
            'email' => $labelMail,
            'tell' => $labelTel,
            'subject' => $lang['T.contact.subject'],
            'textarea' => $lang['T.contact.textarea'],
            'status_name' => $labelStatus,
            'code' => $lang['T.contact.code'],
            'contacted_at' => $lang['T.contact.date_contact'],
            'replied_at' => $lang['T.contact.date_replied'],
            'replied_content' => $lang['T.contact.replied_content'],
            'replied_by' => $lang['T.contact.replied_by'],
            'button' => ''
        ],
        'log' => [
            'id' => '',
            'file_line' => $lang['T.log.file_line'],
            'message_code' => $lang['T.log.message_code'],
            'screen' => $lang['T.log.screen'],
            'created_at' => $lang['T.log.created_at'],
            'updated_at' => $lang['T.log.updated_at'],
            'button' => ''
        ],
        'banner' => [
            'id' => '',
            'title' => $labelTitle,
            'image' => $labelImage,
            'status_name' => $labelStatus,
            'created_at' => $labelCreatedAt,
            'updated_at' => $labelUpdatedAt,
            'created_by' => $labelCreatedBy,
            'updated_by' => $labelUpdatedBy,
            'button' => ''
        ],
        'room' => [
            'id' => '',
            'room_name' => $labelRoomCode,
            'title' => $labelTitle,
            'description' => $labelDes,
            'address' => $labelAddress,
            'district_name' => $labelDistrict,
            'price' => $labelPrice,
            'acreage' => $labelAcreage,
            'utility_room_name' => $labelUtilities,
            'point' => $labelPoint,
            'image_name' => $labelImage,
            'space_room_name' => $labelSpaceRoom,
            'space_share_name' => $labelSpaceShare,
            'star_name' => $labelStart,
            'exists_name' => $labelExist,
            'status_name' => $labelStatus,
            'hot_name' => $labelHot,
            'created_at' => $labelCreatedAt,
            'updated_at' => $labelUpdatedAt,
            'created_by' => $labelCreatedBy,
            'updated_by' => $labelUpdatedBy,
            'button' => ''
        ],
        'client' => [
            'id' => '',
            'customer_type_name' => $labelCustomerType,
            'full_name' => $labelFullName,
            'gender_name' => $labelGender,
            'birthday_year' => $labelBirthday,
            'address' => $labelAddr,
            'phone' => $labelPhone,
            'email' => $labelEmail,
            'user_name' => $labelUserName,
            'password' => $labelCurrentPassword,
            'status_name' => $labelStatus,
            'remark_name' => $labelRemark,
            'room_name' => $labelRoomCode,
            'image_name' => $labelImage,
            'created_at' => $labelCreatedAt,
            'updated_at' => $labelUpdatedAt,
            'created_by' => $labelCreatedBy,
            'updated_by' => $labelUpdatedBy,
            'delete_name' => $labelDeleted,
            'button' => ''
        ],
    ],
    'form' => [
        'client' => [
            'label' => $labelName,
            'sub_label' => '',
            'placeholder' => $placeName,
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'div_class' => 'form-control',
            'isShow' => true,
        ],
        'phone' => [
            'label' => $labelTel,
            'sub_label' => $subLabelTell,
            'placeholder' => $placeTel,
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'subject' => [
            'label' => $labelSubject,
            'sub_label' => '',
            'placeholder' => $labelSubject,
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'title' => [
            'label' => $labelTitle,
            'sub_label' => '',
            'placeholder' => $labelTitle,
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control mt-1',
            'isShow' => true,
        ],
        'image' => [
            'label' => $labelImage,
            'sub_label' => '',
            'placeholder' => $placeUploadFile,
            'input' => 'file',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control mt-1',
            'isShow' => true,
        ],
        'textarea' => [
            'label' => $labelTextarea,
            'sub_label' => $subLabelTell,
            'placeholder' => $placeTextarea,
            'input' => 'textarea',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'email' => [
            'label' => $labelMail,
            'sub_label' => $subLabelEmail,
            'placeholder' => $placeMail,
            'input' => 'email',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'gender' => [
            'label' => $labelGender,
            'sub_label' => '',
            'placeholder' => '',
            'input' => 'select',
            'value' => ['0' => $genderValue0, '1' => $genderValue1],
            'label_class' => 'form-label',
            'input_class' => 'form-select',
            'isShow' => true
        ],
        'date_birth' => [
            'label' => $labelDateBirth,
            'sub_label' => '',
            'placeholder' => '',
            'input' => 'date',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true
        ],
        'current_password' => [
            'label' => $labelCurrentPassword,
            'sub_label' => '',
            'placeholder' => $placeCurrentPassword,
            'input' => 'passwordEye',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'password_confirmation' => [
            'label' => $labelConfirmPassword,
            'sub_label' => '',
            'placeholder' => $placeConfirmPassword,
            'input' => 'password',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'new_password' => [
            'label' => $labelNewPassword,
            'sub_label' => $subLabelNewPassword,
            'placeholder' => $placeNewPassword,
            'input' => 'passwordEye',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'avatar' => [
            'label' => ' ',
            'sub_label' => '',
            'placeholder' => '',
            'input' => '',
            'value' => '/assets/static/avatars/user.png',
            'label_class' => 'form-label',
            'input_class' => 'avatar avatar-2xl',
            'isShow' => true,
        ],
        'file' => [
            'label' => $labelUploadFile,
            'sub_label' => $subLabelUploadFile,
            'placeholder' => '',
            'input' => 'file',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'isShow' => true,
        ],
        'remember' => [
            'label' => ' ',
            'sub_label' => '',
            'placeholder' => '',
            'input' => 'checkboxRemember',
            'value' => '1',
            'label_class' => 'form-label',
            'input_class' => 'form-check-input',
            'isShow' => true,
        ],
        'partner' => [
            'label' => $labelPartner,
            'sub_label' => $subLabelPartner,
            'placeholder' => '',
            'input' => 'select',
            'value' => ['0' => $genderValue0, '1' => $genderValue1],
            'label_class' => 'form-label',
            'input_class' => 'form-select',
            'isShow' => true
        ],
        'amount' => [
            'label' => $labelAmount,
            'sub_label' => $subLabelAmount,
            'placeholder' => $placeAmount,
            'input' => 'number',
            'value' => '0',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'div_class' => 'form-control',
            'isShow' => true,
        ],
        'condition' => [
            'label' => $labelCondition,
            'sub_label' => $subLabelCondition,
            'placeholder' => $placeCondition,
            'input' => 'textarea',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control mt-1',
            'isShow' => true,
        ],
        'agree' => [
            'label' => ' ',
            'sub_label' => '',
            'placeholder' => '',
            'input' => 'checkboxAgree',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-check-input',
            'isShow' => true,
        ],
        'room' => [
            'label' => 'Số phòng',
            'sub_label' => '',
            'placeholder' => 'Nhập số phòng của bạn',
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'div_class' => 'form-control',
            'isShow' => true,
        ],

        'user_name' => [
            'label' => 'Tên đăng nhập',
            'sub_label' => '',
            'placeholder' => 'Nhập tên đăng nhập của bạn',
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'div_class' => 'form-control',
            'isShow' => true,
        ],

        'code' => [
            'label' => 'Mã số',
            'sub_label' => '',
            'placeholder' => 'Nhập mã nhân viên của bạn',
            'input' => 'text',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'div_class' => 'form-control',
            'isShow' => true,
        ],
        'two_factor_code' => [
            'label' => 'Mã xác minh',
            'sub_label' => '',
            'placeholder' => 'Nhập mã xác minh',
            'input' => 'number',
            'value' => '',
            'label_class' => 'form-label',
            'input_class' => 'form-control',
            'div_class' => 'form-control',
            'isShow' => true,
        ],
    ],

];
