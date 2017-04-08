<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            array('title' => 'Review đánh giá máy nghe nhạc Shanling M1',
                'slug'        => 'review-anh-gia-may-nghe-nhac-shanling-m1',
                'content'     => 'Chiếc hộp Shanling M1 được làm bằng cacton cứng 	cáp, được bọc seal nilon Ở các bên hộp có in chữ Shanling M1 và logo em ấy, phía sau là một chút thông tin của em ấy dưới nhiều ngôn ngữ khác nhau. Cách đóng hộp giống như bọn apple, cũng một nao do phần tôn vinh em ấy khi đập hộp. Theo như trên hộp, em này có thể "nhai" được cả DSD, màn hình 2.5D không cảm ứng, thẻ nhớ hỗ trợ đến 200gb (hỗ trợ khá cao so với nhu cầu nghe nhạc hiện nay), sử dụng cổng USB-C mới nhất và cuối cùng là máy đã trang bị Bluetooth 4.0 có hỗ trợ APT-X giúp việc truyền tải âm thanh hay hơn.


							Khi mở nắp hộp ra, là một tờ giấy ghi một chút về các nút được bố trí như thế nào và một chút thông tin về em ấy. Và phía sau tờ giấy đó chính là chiếc máy Shanling M1 được nằm gọn gàng trong mảnh đệm dày được phủ nhung lên, cách đóng hộp khiến nhiều người thấy thích thú vì số tiền mình bỏ ra mua chiếc máy này được tôn vinh một cách trang trọng. Phía sau miếng đệm đó là một chiếc hộp đen nhỏ chứa cáp sạc USB-C, vài bộ dán bảo vệ hai mặt của máy, sổ HDSD, usb đọc thẻ nhớ micro-sd. Sơ qua cách đóng hộp của em này, mình thấy đâu đó có một sự đẳng cấp và chất lượng cao, sự tôn vinh chiếc máy khi mở hộp như là một lời cảm ơn chân thành từ Shanling đến người sử dụng vì đã chọn và tin tưởng sản phẩm của họ.',
                'admin_id'    => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()),
        ]);
    }
}
