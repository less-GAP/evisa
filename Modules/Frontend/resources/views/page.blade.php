<?php

use App\Models\Page;
use ProtoneMedia\Splade\Facades\SEO;

$page = Page::where('slug', request()->route('slug'))->first();
if (!$page) {
    echo view('front::not-found');
    return;
}

SEO::title($page->title)
    ->description($page->excerpt ?? '')
    ->keywords($page->keywords ?? '');
SEO::openGraphType('WebPage');
SEO::openGraphSiteName(settings('site_title', ''));
SEO::openGraphTitle($page->title);
SEO::openGraphUrl(url($page->slug));
if ($page->image) {
    SEO::openGraphImage(url($page->image));
}


$content = \Blade::render($page->content);
?>

<x-front::layout.sidebar>

    <div class="prose lg:prose-lg !max-w-screen-md mx-auto dark:prose-invert">
        {!! $content !!}
    </div>
</x-front::layout.sidebar>



