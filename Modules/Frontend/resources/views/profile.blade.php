<x-Frontend::layout.default>
    <div class="container m-auto relative pt-6 sm:pt-10 pb-16 lg:pt-20 lg:pb-28">
        <div
            class="p-5 mx-auto bg-white rounded-xl sm:rounded-3xl lg:rounded-[40px] shadow-lg sm:p-10 lg:p-16 dark:bg-neutral-900">
            <div class="nc-PageDashboard">
                <header class="text-center max-w-2xl mx-auto - mb-14 sm:mb-16 lg:mb-24"><h2
                        class="flex items-center text-3xl leading-[115%] md:text-5xl md:leading-[115%] font-semibold text-neutral-900 dark:text-neutral-100 justify-center">
                        Dash board</h2><span
                        class="block text-sm mt-2 text-neutral-700 sm:text-base dark:text-neutral-200">View your dashboard, manage your visas, subscription and edit and profile.</span>
                </header>
                <div class="flex flex-col space-y-8 xl:space-y-0 xl:flex-row">
                    <div class="flex-shrink-0 max-w-xl xl:w-80 xl:pe-8">
                        <ul class="text-base space-y-1 text-neutral-700 dark:text-neutral-400">
                            <li>
                                <a class="px-6 py-3 bg-neutral-100  font-medium rounded-full flex items-center hover:text-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-800 dark:hover:text-neutral-100"
                                   href="/my-account"><span class="w-8 me-2 text-lg">⏳</span><span> Dash board</span></a>
                            </li>
                            <li>
                                <a class="px-6 py-3 font-medium rounded-full flex items-center hover:text-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-800 dark:hover:text-neutral-100"
                                   href="/my-account/my-visa"><span class="w-8 me-2 text-lg">📕</span><span> My Visas</span></a>
                            </li>
                            <li>
                                <a class="px-6 py-3 font-medium rounded-full flex items-center hover:text-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-800 dark:hover:text-neutral-100"
                                   href="/my-account/edit-profile"><span class="w-8 me-2 text-lg">🛠</span><span> Edit profile</span></a>
                            </li>

                            <li>
                                <a class="px-6 py-3 font-medium rounded-full flex items-center hover:text-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-800 dark:hover:text-neutral-100"
                                   href="/my-account/submit-post"><span class="w-8 me-2 text-lg">✍</span><span> Submit post</span></a>
                            </li>
                            <li class=" border-t border-neutral-200 dark:border-neutral-700"></li>
                            <li><a class="flex items-center px-6 py-3 font-medium text-red-500" href="/logout"><span
                                        class="w-8 me-2 text-lg">💡</span>Sign out</a></li>
                        </ul>
                    </div>
                    <div class="border-t border-neutral-500 dark:border-neutral-300 md:hidden"></div>
                    <div class="flex-1">
                        <div class="flex-1">
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
                                                Subcription Name
                                            </dt>
                                            <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                                                Premium
                                            </dd>
                                        </div>
                                        <div
                                            class="bg-white dark:bg-neutral-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-300">
                                                Package &amp; billing details
                                            </dt>
                                            <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                                                $222.00
                                            </dd>
                                        </div>
                                        <div
                                            class="bg-neutral-50 dark:bg-neutral-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-300">
                                                Remaining post
                                            </dt>
                                            <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                                                18
                                            </dd>
                                        </div>
                                        <div
                                            class="bg-white dark:bg-neutral-900 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-300">
                                                Expire date
                                            </dt>
                                            <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-200 font-medium sm:mt-0 sm:col-span-2">
                                                October 20, 2021
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-Frontend::layout.default>
