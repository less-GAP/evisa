<?php

use App\Models\Page;
use ProtoneMedia\Splade\Facades\SEO;

$page = Page::where('slug', request()->route('slug'))->first();
if (!$page) {
    echo view('Frontend::not-found');
    return ;
}
$content = \Blade::render($page->content);
SEO::title($page->title)
    ->description($page->excerpt ?? '')
    ->keywords($page->keywords ?? '');
SEO::openGraphType('WebPage');
SEO::openGraphSiteName(settings('site_title',''));
SEO::openGraphTitle($page->title);
SEO::openGraphUrl(url($page->slug));
if ($page->image) {
    SEO::openGraphImage(url($page->image));
}
?>

<x-Frontend::layout.default>
    {!! $content !!}
</x-Frontend::layout.default>



