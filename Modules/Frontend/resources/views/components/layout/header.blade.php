<?php
$menus = master_data('site-menu')->toArray();
$mainMenus = array_slice($menus, 0, 5);
$dropdownMenus = array_slice($menus, 6, -1);
?>
<header class="relative z-50 main-header">
    <div class="header-2">
        <nav class="py-2 bg-white lg:py-5">
            <div class="container relative px-4 mx-auto lg:flex lg:items-center">
                <x-splade-toggle>

                    <div class="relative z-50 flex items-center justify-between">
                        <Link href="/" class="">
                            <img src="{{url(settings('site_logo','/static/images/logo-eVisa.png?v=1691981753'))}}"
                                 alt="eVisa" class="max-w-[150px]">
                        </Link>
                        <span class="navbar-toggle" :class="toggled?'active':''">

                        <button @click.prevent="toggle"
                                class="relative  overflow-hidden rounded-full outline-none lg:hidden">

                            <div
                                class="relative flex overflow-hidden items-center justify-center rounded-full w-8 h-8 md:w-[50px] md:h-[50px] transform transition-all duration-200 shadow-md">
                                <div
                                    class="flex flex-col justify-between w-[20px] h-[20px] transform transition-all duration-300 origin-center overflow-hidden">
                                    <div
                                        class="bg-black h-[2px] w-7 transform transition-all duration-300 origin-left active-1 delay-100">
                                    </div>
                                    <div
                                        class="bg-black h-[2px] w-7 rounded transform transition-all duration-300 active-1 delay-75">
                                    </div>
                                    <div
                                        class="bg-black h-[2px] w-7 transform transition-all duration-300 origin-left active-1">
                                    </div>
                                    <div
                                        class="absolute items-center justify-between transform transition-all duration-500 top-2.5 -translate-x-10 active-2 flex w-0">
                                        <div
                                            class="absolute bg-black h-[2px] w-5 transform transition-all duration-500 rotate-0 delay-300 active-3">
                                        </div>
                                        <div
                                            class="absolute bg-black h-[2px] w-5 transform transition-all duration-500 -rotate-0 delay-300 active-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        </span>
                    </div>

                    <ul :class="toggled?'active':''"
                        class="flex-col absolute z-9999 lg:static lg:items-center flex lg:flex-row lg:ml-auto mt-1 lg:mt-0 lg:static absolute top-[51px] left-0 w-full lg:w-auto bg-white shadow-sm lg:shadow-none transition py-5 lg:py-0"
                        id="navbar-collapse">
                        @foreach($mainMenus as $menu)
                            <li class="relative group">
                                <Link href="{{$menu['url']??''}}"
                                      class="px-5 py-3 text-lg font-medium uppercase">{{$menu['label']}}</Link>
                                @if(count($menu['children']))
                                    <span

                                        class="absolute top-0 right-[18px] lg:right-0 flex items-center justify-center w-5 h-5 menu-toggle transition -translate-y-1/2 cursor-pointer top-1/2 -mt-[2px]"><i
                                            class="text-xs fa-solid fa-chevron-down"></i></span>
                                    <ul
                                        class="z-50 list-disc lg:list-none flex-col ml-10 lg:ml-0 w-full lg:absolute lg:flex sub-menu lg:group-hover:opacity-100 opacity-1 lg:opacity-0 lg:pointer-events-none lg:group-hover:pointer-events-auto lg:w-max top-full lg:pt-6">
                                        @foreach($menu['children'] as $child)
                                            <li class="relative bg-white">
                                                <Link href="{{$child['url']??''}}"
                                                      class="block px-5 py-1 text-lg font-medium text-gray-500 uppercase lg:text-black lg:py-3 whitespace-nowrap">{{$child['label']}}</Link>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        @if(count($dropdownMenus))
                            <li class="relative group navbar-toggle">
                                <button class="relative hidden overflow-hidden rounded-full outline-none lg:block">
                                    <div
                                        class="relative flex overflow-hidden items-center justify-center rounded-full w-8 h-8 md:w-[50px] md:h-[50px] transform transition-all duration-200 shadow-md">
                                        <div
                                            class="flex flex-col justify-between w-[20px] h-[20px] transform transition-all duration-300 origin-center overflow-hidden">
                                            <div
                                                class="bg-black h-[2px] w-7 transform transition-all duration-300 origin-left active-1 delay-100">
                                            </div>
                                            <div
                                                class="bg-black h-[2px] w-7 rounded transform transition-all duration-300 active-1 delay-75">
                                            </div>
                                            <div
                                                class="bg-black h-[2px] w-7 transform transition-all duration-300 origin-left active-1">
                                            </div>
                                            <div
                                                class="absolute items-center justify-between transform transition-all duration-500 top-2.5 -translate-x-10 active-2 flex w-0">
                                                <div
                                                    class="absolute bg-black h-[2px] w-5 transform transition-all duration-500 rotate-0 delay-300 active-3">
                                                </div>
                                                <div
                                                    class="absolute bg-black h-[2px] w-5 transform transition-all duration-500 -rotate-0 delay-300 active-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </button>

                                <ul
                                    class="right-0 z-50 flex flex-col w-full lg:absolute lg:flex sub-menu lg:group-hover:opacity-100 lg:opacity-0 lg:pointer-events-none lg:group-hover:pointer-events-auto lg:w-max top-full lg:pt-4">
                                    @foreach($dropdownMenus as $dropdownMenu)
                                        <li class="relative bg-white">
                                            <Link href="{{$dropdownMenu['url']??''}}"
                                                  class="block px-5 py-3 text-lg lg:font-normal font-medium uppercase">{{$dropdownMenu['label']??''}}</Link>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                </x-splade-toggle>
            </div>
        </nav>
    </div>
</header>
