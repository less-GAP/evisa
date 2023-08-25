<?php

namespace App\Console\Commands;

use App\Models\CrawlPostUrl;
use App\Models\DataSource;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Admin\Services\CrawlerService;

class CrawlPostUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CrawlPostUrls';

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
        $sources = DataSource::where('status', 'active')
            ->where(function ($subquery){
                $subquery->where('latest_crawl_time', '<', Carbon::now()->addHours(-1))
                ->orWhereNull('latest_crawl_time');
            })->get();
        $service = app(CrawlerService::class);

        foreach ($sources as $source) {
            $data = $source->toArray();
            $sourceUrl  =$source->url;
            $crawler = $service->initDomCrawler($sourceUrl, $data);
            $result = $service->filterXPath($crawler, $data['rule_detect_post_link']);
            $urls = $service->listText($result);
            $insertDatas = [];
            foreach ($urls as $url){
                $insertDatas[] = [
                    'data_source_id'=>$source->id,
                    'url'=>$url,
                ];
            }
            CrawlPostUrl::upsert($insertDatas,['url']);
            $source->update(['latest_crawl_time'=>Carbon::now()]);
        }

    }
}
