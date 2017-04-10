<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            array('name'   => 'Sennheiser CX271',
                'slug'         => 'sennheiser-cx271',
                'price'        => 800000,
                'description'  => 'Sennheiser CX 271 Hàng chính hãng của Sennheiser Việt Nam. Bảo hành 24 tháng tại nhà phân phối.

									Mô tả:
									Enhance your look with these charming CX 271 ear canal phones. They offer an excellent passive attenuation of ambient noise as well as provide an immersive bass-driven stereo experience. Also, the symmetrical cable design ensures a tangle-free experience, especially when you are listening while on-the-move.

									Tính năng:
									Ergonomic ear canal phones with excellent bass for listeners with smaller ears
									Silicon ear adaptors for a personalised comfort fit
									Unique red and gold graphics on earphones - no two designs are the same!
									Hassle-free cable slider
									Symmetrical braided-design cable for a tangle-free listening experience
									Optimised for MP3, iPod, iPhone (iPod and iPhone are trademarks of Apple Inc. registered in the U.S. and other countries) and portable media players
									2 year warranty
									Đóng gói:
									CX 271 ear-canal phones
									Ear adapter set (S/M/L)',
                'image'        => '{"main":"In Ear/250_678_tai_nghe_sennheiser_cx271_chinh_hang.gif"}',
                'is_hot'       => 1,
                'is_new'       => 0,
                'is_available' => 1,
                'guarantee_duration' => 12,
                'category_id'  => 1,
                'brand_id'     => 11,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ),
            array('name'   => 'Sennheiser CX281',
                'slug'         => 'sennheiser-cx281',
                'price'        => 800000,
                'description'  => 'Sennheiser CX 281 Hàng chính hãng của Sennheiser Việt Nam. Bảo hành 24 tháng tại nhà phân phối.

									Mô tả:

									Edgy, fashionable and sexy. Shimmy on over to the sassy style of these sleek CX 281 ear canal phones. You will enjoy clear and detailed sound, thanks to their high performance dynamic speaker systems. The wide array of ear adapters (S/M/L sizes) allows for a personalised fit as well as excellent passive attenuation of ambient noise. And like the MX 581, the CX 281 come with a share adaptor - allowing you to share your listening experience with a friend (who will need another pair of headphones).

									Tính năng:
									Ergonomic ear canal phones with high performance dynamic speaker systems for listeners with smaller ears
									Silicon ear adaptors for a personalised comfort fit
									Integrated volume control
									Unique red and gold graphics on earphones - no two designs are the same!
									Hassle-free cable slider
									Symmetrical braided-design cable for a tangle-free listening experience
									Share adaptor - Share your audio with a friend!
									Storage pouch fits your earphones and iPod Nano (4th Gen) perfectly!
									Optimised for MP3, iPod, iPhone (iPod and iPhone are trademarks of Apple Inc. registered in the U.S. and other countries) and portable media players
									2 year warranty
									Đóng gói:
									CX 281 ear-canal phones
									Ear adapter set (S/M/L)
									Share adaptor
									Storage pouch',
                'image'        => '{"main":"In Ear/677_tai_nghe_sennheiser_cx281_chinh_hang.gif"}',
                'is_hot'       => 0,
                'is_new'       => 1,
                'is_available' => 1,
                'guarantee_duration' => 12,
                'category_id'  => 1,
                'brand_id'     => 11,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ),
        ]);
    }
}
