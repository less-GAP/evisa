<?php

use App\Models\Post;
use ProtoneMedia\Splade\Facades\SEO;

$page = Post::where('slug', request()->route('slug'))->first();
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
    <h1 class="text-left w-full mb-5 text-neutral-900 text-left font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100"
        title="{{$page->title}}">{{$page->title}}</h1>
    <p class="block text-base text-neutral-500 md:text-lg dark:text-neutral-400 pb-1">{{$page->excerpt}}</p>
    <div id="page-content" class="my-10">
        {!! $content !!}
    </div>
</x-front::layout.sidebar>

