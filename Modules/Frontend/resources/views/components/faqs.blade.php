<?php

use App\Models\Faq;

$postQuery = Faq::query();
$items = Faq::where('status', 'publish')->orderBy('order', 'ASC')->get();
?>
    <div class="mx-auto list-questions">
        @foreach($items as $index => $item )
            <div class="relative pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">
                <x-splade-toggle>
                    <div @click.prevent="toggle" class="relative  cursor-pointer question js-toggle"
                         data-toggle="quest-1">

                        <h3 class="text-lg font-black uppercase quest lg:text-2xl">{{$index+1}}. {{$item->question}}</h3>
                    </div>
                    <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"
                         data-toggle="quest-1">
                        {!! $item->answer !!}
                    </div>
                </x-splade-toggle>
            </div>
        @endforeach
    </div>
