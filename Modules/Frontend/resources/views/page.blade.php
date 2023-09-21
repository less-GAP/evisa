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
        @seoOpenGraphImage(url($page->image));
    @endif
    <h1 class="text-center mb-5 text-neutral-900 text-left font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl "
        title="{{$page->title}}">{{$page->title}}</h1>
    <div id="page-content">

        {!! $content !!}
    </div>
</x-front::layout.sidebar>



