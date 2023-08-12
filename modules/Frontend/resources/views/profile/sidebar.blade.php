@php
    $routeName = \Request::route()->getName();
@endphp

<aside id="default-sidebar" class="h-screen transition-transform  sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('profile')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
                    dark:hover:bg-gray-700 group dark:bg-gray-900 dark:text-white @if($routeName == 'profile')text-indigo-600 @endif
                    ">
                    <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="ml-3">Thông tin tài khoản

                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('profile.product')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
                    dark:hover:bg-gray-700 group @if($routeName == 'profile.product')text-indigo-600 @endif">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 0 1-8 0"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="{{route('profile.cart')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100
                dark:hover:bg-gray-700 group @if($routeName == 'profile.cart')text-indigo-600 @endif">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Giỏ hàng</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <line x1="3" y1="9" x2="21" y2="9"/>
                        <line x1="9" y1="21" x2="9" y2="9"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Đơn hàng</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="h-5 w-5 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <line x1="10" y1="14" x2="21" y2="3"/>
                        <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sổ địa chỉ</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Thông tin thanh toán</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="5" x2="5" y2="19"/>
                        <circle cx="6.5" cy="6.5" r="2.5"/>
                        <circle cx="17.5" cy="17.5" r="2.5"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Hoa hồng</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="19 20 9 12 19 4 19 20"/>
                        <line x1="5" y1="19" x2="5" y2="5"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

