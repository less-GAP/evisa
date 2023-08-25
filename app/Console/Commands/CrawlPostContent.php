<?php

namespace App\Console\Commands;

use App\Models\CrawlPostUrl;
use App\Models\DataSource;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Admin\Services\CrawlerService;

class CrawlPostContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CrawlPostContent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $crawlPostUrls = CrawlPostUrl::where('status', 'init')
            ->limit(100)
            ->get();
        $service = app(CrawlerService::class);

        foreach ($crawlPostUrls as $crawlPostUrl) {
            try {

                $data = $crawlPostUrl->source->toArray();
                $crawler = $service->initDomCrawler($crawlPostUrl->url, $data);
                $crawlPostUrl->content = $crawler->html();
                $crawlPostUrl->status = 'crawled';
                $crawlPostUrl->crawl_time = Carbon::now();
                $crawlPostUrl->save();
                $postData = [
                    'title' => $service->filterXPath($crawler, $data['rule_detect_post_title'])->text(),
                    'type' => 'post',
                    'country' => $crawlPostUrl->source->country,
                    'source_url' => $crawlPostUrl->url,
                    'status' => $crawlPostUrl->source->default_post_status ?? 'publish',
                    'image' => $service->filterXPath($crawler, $data['rule_detect_post_image'])->text(),
                    'excerpt' => $service->filterXPath($crawler, $data['rule_detect_post_excerpt'])->text(),
                    'keywords' => $service->filterXPath($crawler, $data['rule_detect_post_keywords'])->text(),
                    'content' => $service->filterXPath($crawler, $data['rule_detect_post_content'])->html(),
                ];
                $tags = explode(',', $service->filterXPath($crawler, $data['rule_detect_post_tags'])->text());
                $post = Post::create($postData);
                $post->syncTags($tags);
            } catch (\Throwable $exception) {
                \Log::error($exception);
                $crawlPostUrl->content = $exception->getMessage();
                $crawlPostUrl->status = 'error';
                $crawlPostUrl->crawl_time = Carbon::now();
                $crawlPostUrl->save();
            }
        }
    }
}
