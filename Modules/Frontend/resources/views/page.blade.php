<?php

use App\Models\Page;
use ProtoneMedia\Splade\Facades\SEO;

$page = Page::where('slug', request()->route('slug'))->first();
if (!$page) {
    echo view('front::not-found');
    return;
}


$content = \Blade::render($page->content);
?>

<x-front::layout.sidebar>
    @seoTitle($page->title)
    @seoDescription($page->excerpt ?? '')
    @seoKeywords($page->excerpt ?? '')
    @if ($page->image)
        @seoOpenGraphImage(url($page->image))
    @endif
    <div id="page-content">
        <x-front::title>{{$page->title}}</x-front::title>

        {!! $content !!}
    </div>
</x-front::layout.sidebar>



