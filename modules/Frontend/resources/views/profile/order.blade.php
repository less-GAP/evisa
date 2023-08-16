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
            <h2 class="text-4xl font-extrabold dark:text-white pb-3">Đơn hàng của tôi</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 xl:gap-x-8">
                <div class="">
                    @if(!empty($orders))
                        @foreach($orders as $order)
                            <div class="shadow-md shadow-slate-500 p-4 mt-8">
                                <div class="flex flex-row justify-between items-end">
                                    <div class="flex content-baseline">
                                        <h1 class="text-2xl text-gray-900 tracking-tight font-bold">Đơn hàng #{{$order['id']}}</h1>
                                        <a href="#" class="block text-base font-normal text-blue-500 ml-4 mt-2">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                                @if($order['order_status'] == 'new')
                                                    Chờ xác nhận
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-gray-600 text-sm">Ngày đặt
                                        <time class="text-indigo-400">
                                            {{ \Carbon\Carbon::parse($order['created_date'])->format('d/m/Y') }}
                                        </time>
                                    </p>
                                </div>
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
                                                            <div class="text-lg text-gray-500 font-semibold text-right">
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
                                                        <div class="flex flex-row justify-between justify-items-center py-4">
                                                            <dt class="text-gray-900 text-lg font-semibold">Tổng tiền</dt>
                                                            <dd class="text-lg text-gray-900 font-semibold">{{number_format($order['total'],-3,',','.')}}<span style="text-transform: none">đ</span></dd>
                                                        </div>
                                                        <div class="text-right">
                                                            <a href="{{route('profile.order-detail',['order_id' => $order['id']])}}" class="font-medium text-blue-500 hover:underline">Xem chi tiết<span aria-hidden="true"> →</span></a>
                                                        </div>

                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

