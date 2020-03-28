<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
        	'title' => 'WeMarketing là gì?',
        	'description' => 'WeMarketing cung cấp giải pháp marketing trực tiếp đến hàng trăm ngàn khách hàng thông qua tin nhắn SMS, mang lại hiệu quả cao với chi phí thấp và tiết kiệm thời gian cho doanh nghiệp.',
        	'content' => 'WeMarketing cung cấp giải pháp marketing trực tiếp đến hàng trăm ngàn khách hàng thông qua tin nhắn SMS, mang lại hiệu quả cao với chi phí thấp và tiết kiệm thời gian cho doanh nghiệp.

				Chúng tôi cam kết về chất lượng dịch vụ cũng như giá cả cạnh tranh để đảm bảo đem lại cho khách hàng trải nghiệm tốt nhất về hiệu quả tiếp thị.

				WeMarketing được ra đời hướng đến các đối tượng doanh nghiệp doanh nghiệp vừa và nhỏ, các cửa hàng thực hiện các chương trình quảng cáo, tiếp thị một cách dễ dàng nhất, tiết kiệm thời gian nhất và hiệu quả nhất.'
        ]);
    }
}
