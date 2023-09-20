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
    <h1 class="text-center mb-5 text-neutral-900 text-left font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl "
        title="{{$page->title}}">{{$page->title}}</h1>
    <div class="prose lg:prose-lg !max-w-screen-md mx-auto dark:prose-invert">
        {!! $content !!}
    </div>
</x-front::layout.sidebar>



