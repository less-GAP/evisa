<?php

use App\Models\Post;
use ProtoneMedia\Splade\Facades\SEO;

$page = Post::where('slug', request()->route('slug'))->first();
if (!$page) {
    echo view('front::not-found');
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

<x-front::layout.default>
    {!! $content !!}
</x-front::layout.default>



