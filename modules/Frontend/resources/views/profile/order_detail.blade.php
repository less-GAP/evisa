@extends("Frontend::layout.index")
@section('content')
    @php
        $subtotal = 0;
    @endphp
    <div class="grid grid-cols-4 max-w-screen-xl xl:mx-auto xl:grid-cols-4 gap-4 py-4">
        <div>
            @include("Frontend::profile.sidebar")
        </div>
        <div class="bg-white col-span-3 border-[1px] p-5">
            <div class="flex flex-row justify-between items-end content-center">
                <div class="flex content-baseline h-9">
                    <h2 class="text-2xl font-extrabold dark:text-white pb-3 ">Chi tiết đơn hàng #578458837</h2>
                    <a href="#" class="block text-base font-normal text-blue-500 ml-4 mt-2">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                                @if($order['order_status'] == 'new')
                                                    Chờ xác nhận
                                                @endif
                                            </span>
                    </a>
                </div>
                <p class="text-gray-600 text-sm -mt-4">Ngày đặt
                    <time class="text-indigo-400">
                        {{ \Carbon\Carbon::parse($order['created_date'])->format('d/m/Y') }}
                    </time>
                </p>
            </div>
            <div class="grid grid-cols-3 gap-x-6 gap-y-10">
                <div class="mt-4 p-2">
                    <h3 class="uppercase">Địa chỉ người nhận</h3>
                    <div class="p-2 mt-2 border-t border-gray-200">
                        <p class="text-gray-500">{{$order['s_name']}}</p>
                        <p class="text-sm">Địa chỉ: {{$order['s_address']}}, {{$order['ward_name']}}, {{$order['district_name']}}, {{$order['province_name']}}, Việt Nam</p>
                        <p class="text-sm">Điện thoại: {{$order['s_phone']}}</p>
                    </div>
                </div>
                <div class="mt-4 p-2">
                    <h3 class="uppercase">Hình thức giao hàng</h3>
                    <div class="p-2 mt-2 border-t border-gray-200">
                        <p class="text-gray-500">{{$order['shipping_name']}}</p>
                        <p>Phí vận chuyển: {{number_format($order['shipping_cost'],-3,',','.')}}<span style="text-transform: none">đ</span></p>
                    </div>
                </div>
                <div class="mt-4 p-2">
                    <h3 class="uppercase">Hình thức thanh toán</h3>
                    <div class="p-2 mt-2 border-t border-gray-200">
                        <p class="text-gray-500">{{$order['payment_name']}}</p>
                    </div>
                </div>
            </div>
            <div>
                @if($order['order_details'])
                    <div class="bg-white">
                        <h2 class="t">Products</h2>
                        <div class="px-8 pt-4">
                            @foreach($order['order_details'] as $detail)
                                <div class="border-b border-gray-200 py-4 pt-0 border-t">
                                    <div class="grid gap-8 grid-cols-1">
                                        <div class="flex flex-row justify-between">
                                            <div class="flex flex-row">
                                                <div class="w-40 h-40 flex-shrink-0">
                                                    <img src="{{$detail['extra']['image_url']}}" alt="{{$detail['extra']['name']}}: {{$detail['extra']['time']}}"
                                                         class="object-cover object-center"/>
                                                </div>
                                                <div class="ml-6">
                                                    <h3 class="text-lg text-gray-900 font-semibold">
                                                        <a href="{{url('profile/product/'.$detail['package_course_id'])}}">
                                                            {{$detail['product']}}
                                                        </a>
                                                    </h3>
                                                    <p class="text-sm text-gray-500">
                                                        {{$detail['extra']['name']}}: {{$detail['extra']['time']}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-base text-gray-500 font-semibold text-right">
                                                {{$detail['amount']}} x {{number_format($detail['price'],-3,',','.')}}<span style="text-transform: none">đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="la">
                                <div class="grid grid-cols-3 gap-8">
                                    <dl></dl>
                                    <dl></dl>
                                    <dl class="">
                                        <div class="flex flex-row justify-between justify-items-center py-4 border-b border-gray-200">
                                            <dt class="text-gray-700 text-base">Tạm tính</dt>
                                            <dd class="text-gray-700 text-base">{{number_format($order['subtotal'],-3,',','.')}}<span style="text-transform: none">đ</span></dd>
                                        </div>
                                        <div class="flex flex-row justify-between justify-items-center py-4  border-b border-gray-200">
                                            <dt class="text-gray-700 text-base">Phí vận chuyển</dt>
                                            <dd class="text-gray-700 text-base">{{number_format($order['shipping_cost'],-3,',','.')}}<span style="text-transform: none">đ</span></dd>
                                        </div>
                                        <div class="flex flex-row justify-between justify-items-center py-4">
                                            <dt class="text-gray-900 text-lg font-semibold">Tổng tiền</dt>
                                            <dd class="text-lg text-gray-900 font-semibold">{{number_format($order['total'],-3,',','.')}}<span style="text-transform: none">đ</span></dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

