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
            <h2 class="text-4xl font-extrabold dark:text-white pb-3">Giỏ hàng</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 xl:gap-x-8">
                @if(!empty($cart))
                    <x-splade-form action="{{route('profile.checkout')}}" method="POST" class="mt-3" :default="$form" id="checkout-form">
                        <ul class="border-t border-b border-gray-300 w-full ">
                            @foreach($cart as $k => $pro)
                                @php
                                    $subtotal += $pro['price']*$pro['amount'];
                                @endphp

                                <li class="py-10 flex @if($k%2==1) border-t border-gray-300 @endif">
                                    <div class="shrink-0">
                                        <img src="{{$pro['package_course']['image_url']}}"
                                             alt="{{$pro['product']}} {{$pro['package_course']['name']}} {{$pro['package_course']['time']}}" class="w-32 h-32 object-center object-cover rounded-lg">
                                    </div>
                                    <div class="flex-1 flex-col justify-between relative ml-6">
                                        <div>
                                            <div class="grid grid-cols-2 justify-between relative">
                                                <div class="pr-6">
                                                    <h3 class="text-sm"><a href="#" class="text-sm text-gray-700 font-semibold">{{$pro['product']}} {{$pro['package_course']['name']}}</a></h3>
                                                    <p class="text-sm text-gray-500 mt-1">{{$pro['package_course']['time']}}</p>
                                                </div>
                                                <p class="text-sm text-right font-semibold">{{number_format($pro['price'],-3,',','.')}}<span style="text-transform: none">đ</span></p>
                                            </div>
                                            <div class="mt-0 block absolute top-0 inset-x-1/2">
                                                <label for="quantity-{{$pro['product_id']}}-{{$pro['package_course_id']}}" class="t">Số lượng</label>
                                                <select id="quantity-{{$pro['product_id']}}-{{$pro['package_course_id']}}" name="quantity-{{$pro['product_id']}}-{{$pro['package_course_id']}}"
                                                        class="text-sm shadow-sm rounded border-slate-400 quantity">
                                                    @for($i = 1; $i <= 10; $i++)
                                                        <option value="{{$i}}" @if($pro['amount'] == $i) selected="selected" @endif>{{$i}}</option>
                                                    @endfor
                                                </select>
                                                <a href="{{url('profile/cart/'.$pro['product_id'].'/'.$pro['package_course_id'])}}" class="inline-block mt-3 ml-0 text-sm text-blue-600"><span>Xóa</span></a>
                                            </div>
                                        </div>
                                        <p class="flex text-sm mt-4 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-600">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Còn hàng</span>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="px-32 mt-8">
                            <div class="p-8 bg-gray-100 rounded-lg">
                                <h2 class="t">Tóm tắt</h2>
                                <div class="flow-root">
                                    <dl class="text-sm -mt-4 -mb-4">
                                        <div class="pt-4 pb-4 flex justify-between justify-items-center border-b border-gray-300">
                                            <dt class="text-gray-500">Thành tiền</dt>
                                            <dd class="text-black">{{number_format($subtotal,-3,',','.')}}<span style="text-transform: none">đ</span></dd>
                                        </div>
                                        <div class="pt-4 pb-4 flex justify-between justify-items-center border-b border-gray-300">
                                            <dt class="text-gray-500">Phí vận chuyển</dt>
                                            <dd class="text-black">0<span style="text-transform: none">đ</span></dd>
                                        </div>
                                        <div class="pt-4 pb-4 flex justify-between justify-items-center text-base">
                                            <dt class="font-semibold">Tổng tiền</dt>
                                            <dd class="font-semibold">{{number_format($subtotal,-3,',','.')}}<span style="text-transform: none">đ</span></dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                            <div class="mt-10">
                                <button type="submit" class="text-base py-4 px-5 bg-blue-600 text-white rounded-md w-full font-semibold">Thanh toán</button>
                            </div>
                            <div class="text-sm text-center text-gray-300 mt-5">
                                <p>or <a href="{{route('profile.product')}}" class="text-sm text-blue-500 font-semibold">Tiếp tục mua hàng <span aria-hidden="true"> →</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </x-splade-form>
                    <x-splade-script>
                        @foreach($cart as $k => $pro)
                            button = document.querySelector("#quantity-{{$pro['product_id']}}-{{$pro['package_course_id']}}");
                            button.addEventListener("change", function(event) {
                            form = document.querySelector("#checkout-form");
                            form.action = '{{route('profile.update.cart')}}';
                            form.submit();
                            })
                        @endforeach
                    </x-splade-script>
                @endif
            </div>
        </div>
    </div>
@endsection

