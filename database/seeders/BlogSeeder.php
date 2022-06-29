<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogDetailCategory;
use App\Models\BlogImage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::truncate();
        $blogCategory = [
            ['name' => 'world', 'is_have_detail' => TRUE, 'created_at' => Carbon::now()],
            ['name' => 'covid-19 pandemic', 'is_have_detail' => FALSE, 'created_at' => Carbon::now()],
            ['name' => 'china', 'is_have_detail' => FALSE, 'created_at' => Carbon::now()],
        ];
        BlogCategory::insert($blogCategory);

        BlogDetailCategory::truncate();
        $detailCategory = [
            ['name' => 'africa', 'blog_category_id' => 1, 'created_at' => Carbon::now()],
            ['name' => 'the americas', 'blog_category_id' => 1, 'created_at' => Carbon::now()],
            ['name' => 'east asia', 'blog_category_id' => 1, 'created_at' => Carbon::now()],
            ['name' => 'europe', 'blog_category_id' => 1, 'created_at' => Carbon::now()],
        ];
        BlogDetailCategory::insert($detailCategory);
        BlogDetailCategory::insert($detailCategory);

        Blog::truncate();
        $blog = [
            [
                'title' => 'Japan, South Korea Leaders Meet on Sidelines of NATO Summit',
                'content' => "SEOUL — 
                The top leaders of South Korea and Japan expressed hopes for improved bilateral relations during a brief meeting Tuesday on the sidelines of a NATO summit in Madrid, Spain.
                South Korean President Yoon Suk Yeol and Japanese Prime Minister Fumio Kishida met for about three to four minutes during a dinner hosted by Spain's King Felipe VI, according to the South Korean presidential office.
                Yoon told Kishida he plans to “resolve pending issues between Korea and Japan as soon as possible” so that the two countries can “move forward in a future-oriented manner,” Seoul officials said.
                Kishida said he hoped the South Korean president would restore “extremely severe relations” to a “healthy state,” according to Japan’s Kyodo news agency.
                It was the first face-to-face meeting between the top leaders of South Korea and Japan since December 2019. Since then, ties have plummeted due to lingering disputes related to Japan’s brutal 1910-1945 occupation of Korea.<br>
                Yoon, who took office last month, is a conservative who has promised greater cooperation with Japan on issues such as North Korea, which has accelerated its nuclear weapons development.",
                'author' => 2,
                'status' => TRUE,
                'category_id' => 2,
                'is_post' => TRUE,
                'is_main_blog' => TRUE,
                'is_thumbnail_blog' => FALSE,
                'is_content_blog' => FALSE,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'US, Britain Join Other Democracies Urging China to Honor Hong Kong Commitments Ahead of Handover Anniversary',
                'content' => "Ahead of the 25th anniversary of the return of Hong Kong to China’s rule, the United States and Britain joined other democracies urging Beijing to honor its commitments to ensure autonomy and freedoms to the former British colony.<br>
                Chinese President Xi Jinping is expected to attend events marking the anniversary in person. It would be the first time Xi has left mainland China since the coronavirus outbreak.<br>
                On Tuesday, the State Department issued a security alert urging U.S. citizens in Hong Kong to remain vigilant, exercise caution in the vicinity of large gatherings and avoid taking photographs of police without permission.<br>
                “President Xi Jinping is likely to visit Hong Kong June 30-July 1 for events marking the 25th handover anniversary and inauguration of the Chief Executive,” the State Department’s Bureau of Consular Affairs said in a Twitter Post. “Hong Kong Police Force may deploy 10,000+ police officers for security during the visit.”<br>
                A sweeping national security law was imposed in the summer of 2020 to clamp down on dissent in Hong Kong following the massive, sometimes violent pro-democracy protests since 2019.<br>
                Earlier this year, a U.S. State Department report said the government of the People’s Republic of China (PRC) took new actions directly threatening U.S. interests in Hong Kong and eliminating the ability of Hong Kong’s pro-democracy opposition to play a meaningful role. Those actions have breached PRC’s obligations under the Hong Kong Basic Law and the Sino-British Joint Declaration of 1984, which promised Hong Kong a high degree of autonomy.",
                'author' => 2,
                'status' => TRUE,
                'category_id' => 3,
                'is_post' => TRUE,
                'is_main_blog' => FALSE,
                'is_thumbnail_blog' => FALSE,
                'is_content_blog' => TRUE,
                'created_at' => Carbon::now()
            ],
        ];
        Blog::insert($blog);

        BlogImage::truncate();
        $blogImage = [
            ['path' => 'blog/china/content_1.webp', 'blog_id' => 2, 'created_at' => Carbon::now()],
            ['path' => 'blog/the_americas/content_1.webp', 'blog_id' => 1, 'created_at' => Carbon::now()],
        ];
        BlogImage::insert($blogImage);
    }
}
