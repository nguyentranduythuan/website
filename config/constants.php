<?php
return [

    'LINK_IMAGE'   		 =>      '/uploads/images/',
    'DIR_IMAGE'    		 =>      'uploads/images/',

    'LINK_AVATAR'   	 =>      '/uploads/avatar/',
    'DIR_AVATAR'    	 =>      'uploads/avatar/',

    'LINK_FILE_EXPORT'   =>      '/uploads/file_export/',
    'DIR_FILE_EXPORT'    =>      'uploads/file_export/',

    'MESSAGE_RESPONSE_SMS' => [
    							'0'	=>'Gửi thành công',
								'1' => 'Thông tin cung cấp không chính xác',
								'2' => 'Lỗi hệ thống',
								'3' => 'Sai user hoặc mật khẩu',
								'4' => 'Lặp nội dung',
								'5' => 'Thuê bao từ chối nhận tin',
								'6' => 'Không được phép gửi tin',
								'7' => 'Định dạng thuê bao không đúng',
								'8' => 'API tạm khoá',
								'9' => 'Tài khoản không đủ',
								'10' => 'Chiến dịch tạm khoá',
								'11' => 'Chiến dịch hết thời gian chạy',
								],

	'LINK_SERVER_GSM_SMS_API'    		=>      'http://115.73.210.38:8000/api/client/send-sms-with-api',
	'LINK_SERVER_GSM_SMS'    			=>      'http://115.73.210.38:8000/api/client/input-data-sms',
	'LINK_SERVER_GSM_CHECK_PHONE'    	=>      'http://115.73.210.38:8000/api/client/input-data-check-phone',
	'LINK_SERVER_GSM_CHECK_PHONE_API'   =>      'http://115.73.210.38:8000/api/client/check-phone-number',

	'USERNAME_GSM'						=> 'wemarketing',
	'KEY_GSM'							=> 'wemarketing'
];