@php
    use App\Models\Product;
      $query = Product::where('type', 'package')->where('status', 'A');
      $menus = $query->get()->toArray();
@endphp
<header id="header-main" class="fixed top-0 left-0 z-40 w-full bg-white">
    <x-splade-toggle>
        <div class="py-4 header-inner">
            <div class="xl:px-[100px] px-5 md:px-10">
                <div class="flex items-center">
                    <div class="logo w-[80px] md:w-[100px] xl:w-[180px]" id="logo">
                        <a href="/">
                            <img
                                src="/data/img/logo.png?ver=1" alt="logo"/>
                        </a>
                    </div>
                    <div class="flex items-center ml-auto nav" id="nav-right">
                        <button @click.prevent="toggle" id="open-menu"
                                class="cursor-pointer hamburger-icon w-[26px] md:w-auto">
                            <svg width="41" height="32" viewbox="0 0 41 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="41" height="4" rx="2" fill="black"></rect>
                                <rect y="14" width="23" height="4" rx="2" fill="black"></rect>
                                <rect y="28" width="41" height="4" rx="2" fill="black"></rect>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <nav :class="{open:toggled}" id="navigation-main"
             class="navigation-main  side-nav fixed z-50 right-0 top-0 w-full md:w-[635px] h-full bg-black text-white flex flex-col justify-between">
            <div
                class="flex justify-end px-10 py-5 nav-top lg:px-24 h-[63px] md:h-[71px] xl:h-[103px] border-b border-white border-solid">
                <button @click.prevent="toggle" id="close-menu" class="ml-8 w-[26px] md:w-auto">
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="7.41895" width="41" height="4" rx="2" transform="rotate(45 7.41895 0)" fill="white"/>
                        <rect x="4.58984" y="29" width="41" height="4" rx="2" transform="rotate(-45 4.58984 29)"
                              fill="white"/>
                    </svg>
                </button>
            </div>
            <div id="main-menu" class="px-10 py-10 lg:px-16">
                <ul class="flex flex-col p-0 m-0 font-bold uppercase list-none">
                    <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">
                        <a href="/" class="h-[40px] xl:h-[60px] flex items-center">
                            <span class="mr-2 txt">Home</span>
                            <span class="ml-auto">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z"
                                          fill="#BFBCB9"/>
                                </svg>
                            </span>
                        </a>
                    </li>
                    @if(!empty($menus))
                        @foreach($menus as $me)
                            <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">
                                <a href="{{url('product/'.$me['slug'])}}" class="h-[40px] xl:h-[60px] flex items-center">
                                    <span class="mr-2 txt">{{$me['name']}}</span>
                                    <span class="ml-auto">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z"
                                          fill="#BFBCB9"/>
                                </svg>
                            </span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">
                        <a href="{{route('login.get')}}" class="h-[40px] xl:h-[60px] flex items-center">
                            <span class="mr-2 txt">Login</span>
                        </a>
                    </li>
                {{--                    <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">--}}
                {{--                        <a href="/product/recovery-package" class="h-[40px] xl:h-[60px] flex items-center">--}}
                {{--                            <span class="mr-2 txt">Recovery Package</span>--}}
                {{--                            <span class="ml-auto">--}}
                {{--                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"--}}
                {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                          d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z"--}}
                {{--                                          fill="#BFBCB9"/>--}}
                {{--                                </svg>--}}
                {{--                            </span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                    <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">--}}
                {{--                        <a href="/product/transformation-package" class="h-[40px] xl:h-[60px] flex items-center">--}}
                {{--                            <span class="mr-2 txt">Transformation Package</span>--}}
                {{--                            <span class="ml-auto">--}}
                {{--                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"--}}
                {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                          d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z"--}}
                {{--                                          fill="#BFBCB9"/>--}}
                {{--                                </svg>--}}
                {{--                            </span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                    <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">--}}
                {{--                        <a href="/product/revitalization-package" class="h-[40px] xl:h-[60px] flex items-center">--}}
                {{--                            <span class="mr-2 txt">Revitalization Package</span>--}}
                {{--                            <span class="ml-auto">--}}
                {{--                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"--}}
                {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
                {{--                                          d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z"--}}
                {{--                                          fill="#BFBCB9"/>--}}
                {{--                                </svg>--}}
                {{--                            </span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                <!-- <li class="py-5 border-b border-white border-solid last:pb-0 border-opacity-40">
                        <a href="/about-us/" class="h-[40px] xl:h-[60px] flex items-center">
                            <span class="mr-2 txt">About us</span>
                            <span class="ml-auto">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z" fill="#BFBCB9" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="py-5 border-white border-solid last:pb-0 border-opacity-40">
                        <a href="/contact-us/" class="h-[40px] xl:h-[60px] flex items-center">
                            <span class="mr-2 txt">Contact us</span>
                            <span class="ml-auto">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0575 7.05654C11.5782 6.53584 12.4224 6.53584 12.9431 7.05654L20.9431 15.0565C21.4638 15.5772 21.4638 16.4215 20.9431 16.9422L12.9431 24.9422C12.4224 25.4629 11.5782 25.4629 11.0575 24.9422C10.5368 24.4215 10.5368 23.5772 11.0575 23.0565L18.1147 15.9993L11.0575 8.94216C10.5368 8.42146 10.5368 7.57724 11.0575 7.05654Z" fill="#BFBCB9" />
                                </svg>
                            </span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div id="social-header" class="">
                <ul class="flex items-center justify-center pt-5 text-center list-none border-t border-white border-solid pb-7 border-opacity-40">
                    <li class="mx-2 md:mx-3">
                        <a href="#">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="30" cy="30" r="30" fill="black"/>
                                <path
                                    d="M31.6396 32.363V42.7059H26.8885V32.363H22.9414V28.1692H26.8885V26.6434C26.8885 20.9786 29.2549 18 34.2619 18C35.7969 18 36.1806 18.2467 37.0212 18.4477V22.5958C36.0801 22.4313 35.8151 22.34 34.8375 22.34C33.6771 22.34 33.0558 22.6689 32.4894 23.3176C31.9229 23.9663 31.6396 25.0901 31.6396 26.6982V28.1784H37.0212L35.5776 32.3722H31.6396V32.363Z"
                                    fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li class="mx-2 md:mx-3">
                        <a href="#">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="30" cy="30" r="30" fill="black"/>
                                <path
                                    d="M37.049 40.9411H22.9517C21.0036 40.9411 19.4121 39.3496 19.4121 37.4016V23.3042C19.4121 21.3561 21.0036 19.7646 22.9517 19.7646H37.049C38.9971 19.7646 40.5886 21.3561 40.5886 23.3042V37.4016C40.5886 39.3583 39.0058 40.9411 37.049 40.9411Z"
                                    fill="white"/>
                                <path
                                    d="M30.0048 35.7928C28.5524 35.7928 27.187 35.2275 26.1608 34.2013C25.1346 33.175 24.5693 31.8097 24.5693 30.3573C24.5693 28.905 25.1346 27.5396 26.1608 26.5134C27.187 25.4872 28.5524 24.9219 30.0048 24.9219C31.4571 24.9219 32.8225 25.4872 33.8487 26.5134C34.8749 27.5396 35.4402 28.905 35.4402 30.3573C35.4402 31.8097 34.8749 33.175 33.8487 34.2013C32.8138 35.2275 31.4571 35.7928 30.0048 35.7928ZM30.0048 26.0785C27.648 26.0785 25.726 27.9918 25.726 30.3573C25.726 32.7141 27.6393 34.6361 30.0048 34.6361C32.3616 34.6361 34.2836 32.7228 34.2836 30.3573C34.2749 28.0005 32.3616 26.0785 30.0048 26.0785Z"
                                    fill="black"/>
                                <path
                                    d="M36.4997 24.7435C37.0761 24.7435 37.5433 24.2763 37.5433 23.6999C37.5433 23.1235 37.0761 22.6562 36.4997 22.6562C35.9233 22.6562 35.4561 23.1235 35.4561 23.6999C35.4561 24.2763 35.9233 24.7435 36.4997 24.7435Z"
                                    fill="black"/>
                            </svg>
                        </a>
                    </li>
                    <li class="mx-2 md:mx-3">
                        <a href="#">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="30" cy="30" r="30" fill="black"/>
                                <path
                                    d="M41.1182 40.5886H19.94C17.1063 40.5886 14.8232 38.0825 14.8232 35V25.0007C14.8232 21.9057 17.1178 19.4121 19.94 19.4121H41.1182C43.9519 19.4121 46.235 21.9182 46.235 25.0007V35C46.2464 38.095 43.9519 40.5886 41.1182 40.5886Z"
                                    fill="white"/>
                                <path d="M36.0849 29.8435L27.1758 24.7061V34.981L36.0849 29.8435Z" fill="black"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </x-splade-toggle>
</header>
