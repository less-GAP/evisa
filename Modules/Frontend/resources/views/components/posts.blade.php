<?php

use App\Models\Post;

$postQuery = Post::query();
if (isset($tag)) {
    $postQuery->whereHas('tag_models', function ($query) use ($tag) {
        $query->whereIn('name', explode(',', $tag));
    });
}
$posts = $postQuery->orderBy('id', 'desc')->paginate(20);
?>
<div class="mx-auto px-3 min-[576px]:max-w-[540px] md:max-w-[720px] lg:max-w-[930px] xl:max-w-[1434px]">
    @if(isset($title))
        <p
            class="text-first-brand text-[25px] leading-[35px] sm:text-[30px] sm:leading-[40px] md:text-[36px] md:leading-[46px] lg:text-header-2 text-center mb-[51px]">
            {{$title}}
        </p>
    @endif
    <div class="tabContents w-full clear-both">
        <div class="tabBox" id="allArticles">
            <div class="grid grid-cols-12 gap-x-[30px] gap-y-[74px]">
                @foreach($posts as $post)
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                        <div class="block">
                            <div class="relative mb-[18px]"><Link href="{{$post->url}}"><img
                                        class="rounded-lg w-full max-w-full"
                                        src="{{$post->image?$post->image_url:url('images/placeholder.jpg')}}"
                                        alt="10 Content Proofreading Tips to Catch More Avoidable Goofs"></Link>

                            </div>
                            <div class="block"><Link href="{{$post->url}}"><p
                                        class="font-bold text-first-brand text-header-5 tracking-[-0.02em] transition-common hover:text-success">
                                        {{$post->title}}</p></Link>
                                <div class="font-medium text-gray-500 text-mini-desc mb-6 mt-[10px]">
                                    <span>{{$post->created_at->format('M d, Y')}}</span><span
                                        class="inline-block ml-5 pl-5 bg-no-repeat bg-[left_center] bg-[url('{{$post->image_url}}')]"></span>
                                </div>
                                <p class="text-base font-medium text-gray-500">{{$post->excerpt}}</p></div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

    </div>
    {{ $posts->links() }}
</div>
