<?php
$url = config('app.url');
$appName = config('app.name');
$adminAddress = config('app.admin_address');
$adminName = config('app.admin_name');
$adminTell = config('app.admin_tel');
$adminStk01 = config('app.admin_stk01');
$adminStk02 = config('app.admin_stk02');
$adminStk03 = config('app.admin_stk03');
$adminBank01 = config('app.admin_bank01');
$adminBank02 = config('app.admin_bank02');
$adminBank03 = config('app.admin_bank03');
return [
    //Html Tag
    'T.description'                     => "Bạn là sinh viên cần tìm phòng trọ, bạn là người đi làm cần tim thuê nhà nguyên căn,
    bạn đang loay hoay, tốn nhiều thời gian trong việc tìm nhà thì ${url} sẽ là nơi tư vấn, giải quyết mọi khó
    khăn của bạn phù hợp với nhu cầu cá nhân của từng người dù bạn đang sinh sông tại bất kì quận, huyện nào trên địa bàn thành phố",
    'T.keywords'                        => 'chuyên trang tìm phòng trọ hàng đầu tại Biên Hòa, Đồng Nai, cung cấp thông tin phòng trọ, nhà nguyên căn uy tín, giá cả hợp lí, sinh viên cần tìm phòng trọ',
    'T.title'                           => 'Giới thiệu - Phòng trọ Biên Hòa, Đồng Nai',
    //Footer
    'F.title.info.contact'              => 'THÔNG TIN LIÊN HỆ',
    'F.title.area'                      => 'KHU VỰC',
    'F.title.link'                      => 'LIÊN KẾT',
    //Content
    'C.interest.head.title'             => 'TÌM BẠN Ở GHÉP',
    'C.interest.head.text'              => 'Được chúng tôi sàn lọc kỹ càng nhằm đem lại một dịch vụ tiện ích, uy tín cho mọi người trong việc tìm kiếm nhà trọ.',
    'C.featured.head.title'             => 'Cho thuê phòng trọ, nhà nguyên căn',
    'C.featured.head.text'              => 'Cung cấp thông tin phòng trọ, nhà nguyên căn uy tín chất lượng tại Biên Hòa.',
    'C.news.head.title'                 => 'TIN NHANH',
    'C.news.head.text'                  => '',
    'C.contact.head.title'              => 'LIÊN HỆ',
    'C.contact.head.text'               => 'Nếu bạn có thắc mắc vấn đề gì xin vui lòng liên hệ cho chúng tôi vào form bên dưới,
                                            sau khi nhận được thông tin này chúng tôi sẽ liên hệ với các bạn trong thời gian sớm nhất.',
    //About
    'C.about.head.title'                => 'Giới thiệu',
    'C.about.service.head.title'        => 'Dịch vụ',
    'C.about.policy.head.title'         => 'Chính sách bảo mật',
    'C.about.head.text'                 => 'được xây dựng lên với mục đích giải quyết toàn bộ khó khăn của khách hàng tại Biên Hòa, Đồng Nai trong việc tìm kiếm phòng trọ,
                                            nhà nguyên căn phù hợp với nhu cầu và thu nhập của từng cá nhân.',
    'C.about.service.title'             => 'Dịch vụ của chúng tôi:',
    'C.about.service.text'              => 'luôn cố gắng đem lại một dịch vụ tiện ích, uy tín cho mọi người trong việc tìm kiếm nhà trọ, nhà nguyên căn, căn hộ, chung cư,…',
    'C.about.list.title'                => "Khi đến với <b>${appName}</b> bạn sẽ trải nghiệm:",
    'C.about.list.content01'            => 'Đăng tin cho thuê phòng trọ, nhà nguyên căn, chung cư với đầy đủ tính năng trên website.',
    'C.about.list.content02'            => 'Tìm bạn ở ghép.',
    'C.about.list.content03'            => 'Bạn có thể đọc mọi thông tin, tin tức liên quan đến nhà ở, bất động sản, phong thủy, du lịch, văn hóa,… trực tiếp trên website.',

    //About policy
    'C.about.policy.title'              => "Với những chính sách bảo mật thông tin này, sẽ giúp cho khách hàng hoàn toàn có thể yên tâm hơn khi mọi thông tin riêng tư của mình
                                            trong quá trình đăng ký thông tin chi tiết tại website <b>${url}</b> đều sẽ luôn được bảo mật một cách tuyệt đối. Qua đó
                                            khách hàng sẽ có thể đọc được những thông tin chi tiết về những chính sách bảo mật của chúng tôi cung cấp dưới đây.",
    'C.about.policy.purpose'            => "<h1>Mục đích và phạm vi thu thập thông tin</h1>",
    'C.about.policy.purpose.content01'  => "<p>Toàn bộ những thông tin mà khách hàng cung cấp thông qua website của <b>${appName}</b> cũng như thông qua những giao dịch trực tiếp sẽ giúp cho chúng tôi:</p>",
    'C.about.policy.purpose.content02'  => "<ul>
                                                <li>Có thể hỗ trợ khách hàng trong những công việc khảo sát, triển khai công việc một cách nhanh chóng và chính xác.</li>
                                                <li>Giải đáp được những thắc mắc của quý khách.</li>
                                            </ul>",
    'C.about.policy.purpose.content03'  => "<p>Một số những thông tin cá nhân chúng tôi cần thu thập từ khách hàng bao gồm:</p>",
    'C.about.policy.purpose.content04'  => "<ul>
                                                <li>Họ tên</li>
                                                <li>Email</li>
                                                <li>Số điện thoại</li>
                                                <li>Địa chỉ</li>
                                            </ul>",
    'C.about.policy.purpose.content05'  => "<p>Mọi thông tin này cần phải cung cấp chính sát nhằm đảm bảo được tính xác thực và đặc biệt là phải hợp pháp. Chúng tôi sẽ không chịu toàn bộ trách nhiệm liên quan đến pháp luật của những thông tin khai báo.</p>",
    'C.about.policy.range'              => "<h1>Phạm vi sử dụng thông tin</h1>",
    'C.about.policy.range.content01'    => "<p>Chúng tôi luôn cam kết chỉ sử dụng những thông tin của khách hàng thông qua những mục đích phù hợp và tuyệt đối sẽ không cung cấp thông tin của quý khách cho bên thứ 3 nếu như chưa có sự cho phép của quý khách.
                                                Chỉ trong một số những trường hợp cụ thể đặc biệt, bắt buộc chúng tôi phải cung cấp thông tin của bạn như:
                                            </p>",
    'C.about.policy.range.content02'    => "<ul>
                                                <li>Khi có sự yêu cầu của các cơ quan pháp luật điều tra.</li>
                                                <li>Trong trường hợp để bảo vệ quyền lợi chính đáng của Dịch Vụ Dọn Nhà 247 trước pháp luật.</li>
                                                <li>Những tình huống khẩn cấp, nhằm bảo vệ sự an toàn và quyền lợi của quý khách.</li>
                                           </ul>",
    'C.about.policy.storage'            => "<h1>Thời gian lưu trữ thông tin</h1>",
    'C.about.policy.storage.content01'  => "<p>Chúng tôi sẽ có trách nhiệm thực hiện đúng theo như những yêu cầu khi khách hàng muốn được kiểm tra, bổ sung, và điều chỉnh hoặc có thể là huỷ bỏ thông tin trên cá nhân đã thu thập trước đó.</p>",
    'C.about.policy.commit'             => "<h1>Cam kết bảo mật thông tin cá nhân khách hàng</h1>",
    'C.about.policy.commit.content01'   => "<p>Chúng tôi sẽ luôn cam kết tính tuyệt đối bảo mật thông tin của quý khách.</p>",
    'C.about.policy.commit.content02'   => "<p>Để có thể bảo tuyệt mật 100% mọi thông tin, chúng tôi mong muốn quý khách không tự ý chia sẻ thông tin của mình cho người khác biết. Ngoài ra, cũng khuyến cáo với quý khách chỉ nên sử dụng những mật khẩu có độ khó phức tạp và không nên đăng nhập tài khoản của <b>${appName}</b> tại các dịch vụ máy tính công cộng khác.</p>",
    'C.about.policy.commit.content03'   => "<p><b>Lưu ý:</b> Chính sách bảo mật thông tin này sẽ được áp dụng cho tất cả mọi khách hàng tin tưởng sử dụng dịch vụ của <b>${appName}</b> cung cấp.</p>",

    //Login
    'C.login.head.title'                => 'Đăng nhập',
    'C.login.head.text'                 => "Bạn vui lòng sử dụng tài khoản và mật khẩu được ${appName} cung cấp.",

    //Register
    'C.register.head.title'             => 'Đăng ký',
    'C.register.head.text'              => "Đăng ký tài khoản ${appName}",

    //Forgot Password
    'C.forgot.head.title'               => 'Quên mật khẩu',
    'C.forgot.head.text'                => "${appName} đã gửi mật khẩu mới vào email của bạn.",

    //Reset Password
    'C.reset.head.title'               => 'Đặt lại mật khẩu',
    'C.reset.head.text'                => "Bạn vui lòng nhập mật khẩu mới cho tài khoản của bạn.",

    //TWO認証
    'C.two.factor'                     => 'Xác minh tài khoản',
    'C.two.factor.text'                => "${appName} đã gửi cho bạn mã xác minh vào email của bạn.",
    'C.two.factor.send.again'          => 'Gửi lại mã xác minh tại đây!',
    'C.two.factor.success'             => 'Đã gửi mã xác minh vào email của bạn.',
    //Reserve
    'C.reserve.head.title'             => 'Đặt Phòng',
    'C.reserve.head.text'              => "Bạn vui lòng nhập tên và số điện thoại để ${appName} giúp bạn đặt phòng.",

    //Detail
    'C.detail.categories.title'        => 'Khu Vực',
    'C.text.price'                     => '₫ / Tháng',
    'C.button.see.new'                 => 'Xem tin',
    'C.button.see.more'                => 'xem thêm',

    //Single detail
    'C.single-detail.card.right.area'          => 'Diện tích' ,
    'C.single-detail.card.right.district'      => 'Khu vực' ,
    'C.single-detail.card.right.code'          => 'Mã tin đăng' ,
    'C.single-detail.card.right.des'           => 'Chi Tiết' ,
    'C.single-detail.card.right.address'       => 'Địa chỉ' ,
    'C.single-detail.card.right.point'         => 'Đặc điểm' ,
    'C.single-detail.card.right.space_room'    => 'Không gian phòng' ,
    'C.single-detail.card.right.space_share'   => 'Không gian chung' ,
    'C.single-detail.card.right.price_content' => 'Giá phòng' ,
    'C.single-detail.card.right.utilities'     => 'Tiện ích' ,
    'C.single-detail.card.right.contact'       => 'THÔNG TIN LIÊN HỆ' ,
    //Main Menu
    'M.menu.home'                       => 'Trang Chủ',
    'M.menu.detail'                     => 'Tìm Phòng',
    'M.menu.share-house'                => 'Tìm bạn ở ghép',
    'M.menu.contact'                    => 'Liên hệ',
    'M.menu.about'                      => 'Giới thiệu',
    //User Menu
    'U.menu.register'                   => 'Đăng ký',
    'U.menu.login'                      => 'Đăng nhập',

    //Member Menu
    'M.menu.info'                       => 'Thông tin',
    'M.menu.account'                    => 'Tài khoản',
    'M.menu.avatar'                     => 'Hình đại diện',
    'M.menu.room'                       => 'Phòng của tôi',
    'M.menu.pay'                        => 'Thanh toán',
    'M.menu.history'                    => 'Lịch sử',
    'M.menu.notify'                     => 'Thông báo',
    'M.menu.utility'                    => 'Tiện ích',
    'M.menu.policy'                     => 'Điều khoản',

    //About Service
    'A.service.home'                    => 'Cung cấp thông tin phòng trọ',
    'A.service.building'                => 'Nhà nguyên căn chất lượng',
    'A.service.dollar'                  => 'Giá cả hợp lí',
    'A.service.user'                    => 'Tìm bạn ở ghép uy tín',
    //Label Contact
    'L.contact.name'                    => 'Họ tên',
    'L.contact.tel'                     => 'Số điện thoại',
    'L.contact.mail'                    => 'Email',
    'L.contact.subject'                 => 'Tiêu đề',
    'L.contact.textarea'                => 'Lời nhắn',

    //Label Login
    'L.login.tel'                       => 'Điện Thoại',
    'L.login.password'                  => 'Mật Khẩu',
    //Placeholder Contact
    'P.contact.name'                    => 'Họ và tên',
    'P.contact.tel'                     => '(00) 0000-0000',
    'P.contact.mail'                    => 'Email',
    'P.contact.subject'                 => 'Tiêu đề',
    'P.contact.textarea'                => 'Nội dung',
    //Placeholder Login
    'P.login.tel'                       => '(00) 0000-0000',
    'P.login.email'                     => 'Nhập email của bạn',
    'P.login.password'                  => 'Nhập mật khẩu của bạn',
    'P.login.name'                      => 'Nhập họ và tên của bạn',
    //Placeholder upload file
    'P.upload.file'                     => 'Vui lòng tải tệp lên',


    //button
    'B.text.previous'                   => 'Trước',
    'B.text.next'                       => 'Sau',
    //button contact
    'B.contact.submit'                  => 'Liên hệ ngay',
    //button login
    'B.login.submit'                    => 'Đăng nhập',
    'B.login.remember'                  => 'Ghi nhớ tài khoản',
    'B.login.forgot'                    => 'Bạn không thể truy cập?',
    'B.login.login'                     => 'Bạn đã có tài khoản, đăng nhập tại đây!',
    //button send
    'B.send'                            => 'Gửi',
    //button reserve
    'B.reserve'                         => 'Đặt Phòng',
    //button print
    'B.print'                           => 'In hóa đơn',
    'B.search'                          => 'Tìm kiếm',
    'B.see'                             => 'Xem',
    'B.create'                          => 'Tạo mới',
    //Member
    'M.l.account.current.password'      => 'Mật khẩu hiện tại',
    'M.l.account.confirm.password'      => 'Xác nhận mật khẩu',
    'M.l.account.new.password'          => 'Mật khẩu mới',
    'M.l.info.gender'                   => 'Giới tính',
    'M.l.info.gender.value0'            => 'Nữ',
    'M.l.info.gender.value1'            => 'Nam',
    'M.l.info.gender.default'           => '1',
    'M.l.info.date_birth'               => 'Ngày sinh',
    'M.l.avatar.upload.file'            => 'Tải hình',

    'M.sub.l.account.new.password'      => 'Mật khẩu mới của bạn phải dài 8-20 ký tự, chứa các chữ cái và số và không được chứa dấu cách, ký tự đặc biệt hoặc biểu tượng cảm xúc.',
    'M.sub.l.account.tell'              => 'Số điện thoại này dùng để đăng nhập tài khoản của bạn.',
    'M.sub.l.account.email'             => "${appName} sẽ gửi mật khẩu mới vào email nếu bạn quên mật khẩu.",
    'M.sub.l.avatar.upload.file'        => "Hình đại diện mới của bạn phải nhỏ hơn 300KB và phải có đuôi định dạng: .jpg,.jpeg,.png",

    'M.p.account.current.password'      => 'Nhập mật khẩu hiện tại của bạn',
    'M.p.account.confirm.password'      => 'Nhập lại mật khẩu mới',
    'M.p.account.new.password'          => 'Nhập mật khẩu mới của bạn',
    'M.b.send'                          => 'Lưu lại',

    //Label utility
    'M.l.utility.partner'               => 'Đối tượng',
    'M.l.utility.amount'                => 'Số người',
    'M.l.utility.condition'             => 'Điều kiện',

    //Placeholder utility
    'M.p.utility.condition'             => '....',
    'M.p.utility.amount'                => '0',
    'M.p.utility.agree'                 => 'Đồng ý <a href="/members/policy" tabindex="-1">các điều khoản và chính sách</a>.',

    //Sub Label utility
    'M.sub.l.utility.partner'           => 'Mặc định đối tượng ở chung là nam.',
    'M.sub.l.utility.amount'            => 'Vì vấn đề an ninh nên số người ở chung không được quá 3 người.',
    'M.sub.l.utility.condition'         => 'Nhập điều kiện hoặc yêu cầu khi ở chung ở đây, nếu không có bạn có thể bỏ qua mục này.',

    //Fields thead
    'F.thead.stt'                       => 'STT',
    'F.thead.service'                   => 'Dịch vụ',
    'F.thead.unit.price'                => 'Đơn giá',
    'F.thead.amount'                    => 'Số lượng',
    'F.thead.into.money'                => 'Thành tiền',
    'F.thead.receipt'                   => 'Hóa đơn',
    'F.thead.room.number'               => 'Số phòng',
    'F.thead.room.code'                 => 'Mã số',
    'F.thead.date.payment'              => 'Ngày thanh toán',
    'F.thead.status'                    => 'Tình trạng',
    'F.thead.amount.money'              => 'Số tiền',
    'F.thead.content'                   => 'Nội dung',
    'F.thead.date.created'              => 'Ngày tạo',

    //Footer text
    'F.text.invoice'                    => 'Nội dung chuyển khoản: Nộp tiền + Mã số (Ví dụ: Nộp tiền SM501 )',

    //Info manger
    'I.manger.address'                  => $adminAddress,
    'I.manger.name'                     => "Quản lý : $adminName",
    'I.manger.sdt'                      => "SĐT : $adminTell",
    'I.manger.stk01'                    => $adminStk01 ? "STK 01 : $adminStk01" : '',
    'I.manger.bank01'                   => $adminBank01 ?? '',
    'I.manger.stk02'                    => $adminStk02 ? "STK 02 : $adminStk02" : '',
    'I.manger.bank02'                   => $adminBank02 ?? '',
    'I.manger.stk03'                    => $adminStk03 ? "STK 03 : $adminStk03" : '',
    'I.manger.bank03'                   => $adminBank03 ?? '',

    //Info client
    'I.client.room.number'              => 'Phòng : :number',
    'I.client.room.code'                => 'Mã số : :code',

    //Title Invoice
    'T.invoice'                         => 'Thông báo nộp tiền',
    'T.invoice.manger'                  => 'Bên Quản lý',
    'T.invoice.client'                  => 'Bên thuê phòng',
    'T.invoice.total'                   => 'Tổng',

    //status
    'S.success'                         => 'Đã thanh toán',
    'S.warning'                         => 'Chưa thanh toán',

    //empty data
    'E.data'                            => 'Hiện tại không có dữ liệu',
    //throw
    'T.exception.not.method.tbody'      => 'Method tbody không tồn tại',
    'T.exception.not.method.icon'       => 'Method icon không tồn tại',
    //Alert
    'A.success.sendmail'                => 'Cảm ơn bạn đã gửi thông tin liên hệ. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất.',
    'A.error.sendmail'                  => "Gửi email thất bại vui lòng liên hệ quản trị viên $appName",
    'A.success.admin.sendmail'           => 'Gửi mail thành công',
    'A.success.edit'                    => 'Chỉnh sửa dữ liệu thành công',
    'A.error.edit'                      => 'Chỉnh sửa dữ liệu thất bại',
    'A.success.create'                  => 'Tạo mới dữ liệu thành công',
    'A.error.create'                    => 'Tạo mới dữ liệu thất bại',


    //Contact subject
    'C.subject.text'                    => "$appName - Phản hồi thông tin tại mã hỗ trợ #:code",

    //table
    'T.contact.code'                    => 'Mã hỗ trợ',
    'T.contact.client'                  => 'Khách hàng',
    'T.email'                           => 'Email',
    'T.phone'                           => 'SDT',
    'T.contact.subject'                 => 'Tiêu đề',
    'T.contact.textarea'                => 'Lời nhắn',
    'T.contact.date_contact'            => 'Ngày liên hệ',
    'T.contact.date_replied'            => 'Ngày trả lời',
    'T.contact.replied_by'              => 'Trả lời bởi',
    'T.contact.replied_content'         => 'Nội dung trả lời',
    'T.status'                          => 'Trạng thái',
    'T.hot'                             => 'Nỗi bật',
    'T.title.name'                      => 'Tiêu đề',
    'T.log.message_code'                => 'Lỗi và mã',
    'T.log.file_line'                   => 'File và dòng',
    'T.log.screen'                      => 'Nơi xảy ra',
    'T.log.created_at'                  => 'Ngày xảy ra',
    'T.log.updated_at'                  => 'Ngày chỉnh sửa',
    'T.image'                           => 'Hình ảnh',
    'T.old.image'                       => 'Hình ảnh cũ',
    'T.created_at'                      => 'Ngày tạo',
    'T.updated_at'                      => 'Ngày chỉnh sửa',
    'T.updated_by'                      => 'Chỉnh sửa bởi',
    'T.created_by'                      => 'Tạo bởi',
    'T.description.name'                => 'Mô tả',
    'T.address'                         => 'Địa chỉ',
    'T.district'                        => 'Khu vực',
    'T.price'                           => 'Giá phòng',
    'T.acreage'                         => 'Diện tích',
    'T.utilities'                       => 'Tiện ích',
    'T.contact'                         => 'Liên hệ',
    'T.point'                           => 'Đặc điểm',
    'T.space_room'                      => 'Không gian phòng̣',
    'T.space_share'                     => 'Không gian chung',
    'T.price_content'                   => 'Chi tiết giá phòng',
    'T.start'                           => 'Đánh giá',
    'T.exist'                           => 'Tình trạng phòng',
    'T.deleted'                         => 'Tình trạng',
    'T.room.code'                       => 'Số phòng',
    'T.client.type'                   => 'Phân loại',
    'T.full.name'                       => 'Họ Tên',
    'T.gender'                          => 'Giới tính',
    'T.birthday'                        => 'Ngày sinh',
    'T.addr'                            => 'Địa chỉ',
    'T.corporate.name'                  => 'Tên phân loại',
    'T.remark'                          => 'Ghi chú',
    'T.user.name'                       => 'Tên tài khoản',



    //status
    'S.replied.text'                    => 'Đã trả lời',
    'S.not.replied.text'                => 'Chưa trả lời',
    'S.not.replied.by'                  => 'Chưa có',
    'S.not.show'                        => 'Không hiển thị',
    'S.show'                            => 'Hiển thị',
    'S.yes'                             => 'Có',
    'S.not'                             => 'Không',

    //exist
    'S.exist.rom'                       => 'đang ở',
    'S.not.exist.rom'                   => 'đang trống',
    //delete
    'S.deleted'                         => 'đã xóa',
    'S.not.deleted'                     => 'chưa xóa',


    //Pagination
    'P.show.page'                       => 'Trang xem <span>:currentPage</span> đến <span>:lastPage</span> trong tổng số <span>:totalPage</span> mục',
    //Tbody
    'T.body.btn.see.lang'               => 'Xem chi tiết',
    'T.body.btn.send_mail.lang'         => 'Gửi mail',
    'T.body.btn.edit.lang'              => 'Chỉnh sửa',
    'T.body.not.content'                => 'Hiện tại không có dữ liệu.',
    //Filter
    'F.select.show.row'                 => 'Hiển thị',
    'F.search.data'                     => 'Tìm kiếm',
    'F.reload.data'                     => 'Tải lại',
    'F.change.status'                   => 'Trạng Thái',
    'F.delete.data'                     => 'Xóa',
    //Modal
    'M.close.btn'                       => 'Đóng',
    //Sort
    'S.data.default'                    => 'Sắp xếp',
    'S.data.asc'                        => 'Tăng dần',
    'S.data.desc'                       => 'Giảm dần',

];
