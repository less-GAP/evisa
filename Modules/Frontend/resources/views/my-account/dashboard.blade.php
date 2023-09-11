<?php
$user = auth('frontend')->user();
$currentLevel = $user->level;
?>
<x-Frontend::layout.my-account>
    <div
        class="bg-white dark:bg-neutral-900 dark:border dark:border-neutral-800 shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6"><h3
                class="text-lg leading-6 font-medium text-neutral-900 dark:text-neutral-200">
                Package Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-neutral-500 dark:text-neutral-400">You've
                subscribed to the following package</p></div>
        <div class="border-t border-neutral-200 dark:border-neutral-900">
            <dl>
                <div
                    class="bg-neutral-50 dark:bg-neutral-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-300">
                       Current Level
                    </dt>
                    <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                        {{$currentLevel->name}}
                    </dd>
                </div>
                @foreach($currentLevel->price_config as $priceConfig)
                <div
                    class="bg-white dark:bg-neutral-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-300">
                        {{$priceConfig['label']}}
                    </dt>
                    <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                        ${{number_format($priceConfig['price_1'],2)}}
                    </dd>
                </div>
                @endforeach
                <div
                    class="bg-white dark:bg-neutral-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-300">
                        Expire date
                    </dt>
                    <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                        {{$user->customer_level_expired_at->format('M d, Y')}}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-Frontend::layout.my-account>
