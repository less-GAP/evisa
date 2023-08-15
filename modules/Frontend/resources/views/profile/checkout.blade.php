@extends("Frontend::layout.index")
@section('content')
    @php
        $subtotal = 0;
        $shipping_cost = $form['shipping_cost'];
    @endphp
    <div class="grid grid-cols-4 max-w-screen-xl xl:mx-auto xl:grid-cols-4 gap-4 py-4">
        <div>
            @include("Frontend::profile.sidebar")
        </div>
        <div class="bg-gray-50 col-span-3 border-[1px] p-5">
            <h2 class="text-4xl font-extrabold dark:text-white pb-3">Thanh toán</h2>
            <x-splade-form action="{{route('profile.checkout.done')}}" method="POST" class="mt-3" :default="$form" id="checkout-form">
                <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 xl:gap-x-8">
                    <x-splade-input name="customer_id" type="hidden" v-model="form.customer_id"/>
                    <div>
                        <h2 class="text-lg text-gray-900">Thông tin khách hàng</h2>
                        <x-splade-input name="customer_email" type="email" label="Email" v-model="form.customer_email" class="mt-4 text-sm" disabled/>
                        <hr class="my-5">
                        <h2 class="text-lg text-gray-900">Thông tin vận chuyển</h2>
                        <div class="grid grid-cols-2 w-full gap-x-4">
                            <x-splade-input name="s_name" type="text" label="Họ và Tên" v-model="form.s_name" class="mt-4 text-sm"/>
                            <x-splade-input name="s_phone" type="text" label="Điện thoại" v-model="form.s_phone" class="mt-4 text-sm"/>
                        </div>

                        <x-splade-select name="s_province" label="Tỉnh/Thành phố"
                                         v-model="form.s_province" class="mt-4 text-sm"
                                         remote-url="{{route('provinces')}}"
                                         option-label="name" option-value="code"
                                         choices="{ searchEnabled: true }"
                        >

                        </x-splade-select>

                        <x-splade-select name="s_district" label="Quận/Huyện"
                                         v-model="form.s_district" class="mt-4 text-sm"
                                         remote-url="{{route('provinces')}}"
                                         option-label="name" option-value="code"
                                         choices="{ searchEnabled: true }"
                                         remote-url="`{{url('districts')}}/${form.s_province}`"

                        >
                        </x-splade-select>


                        <x-splade-select name="s_ward" label="Phường/Xã"
                                         v-model="form.s_ward" class="mt-4 text-sm"
                                         option-label="name" option-value="code"
                                         choices="{ searchEnabled: true }"
                                         remote-url="`{{url('wards')}}/${form.s_province}-${form.s_district}`"

                        >
                        </x-splade-select>

                        <x-splade-textarea name="s_address" label="Địa chỉ" autosize v-model="form.s_address" class="mt-4 text-sm"/>
                        <hr class="my-5">
                        <h2 class="text-lg text-gray-900">Phương thức vận chuyển</h2>
                        @if(!empty($shippings))
                            <ul class="grid w-full gap-6 md:grid-cols-1 mt-4 text-sm">
                                @foreach($shippings as $shipping)
                                    <li>
                                        <input type="radio" id="shipping-{{$shipping['id']}}" name="shipping_id" value="{{$shipping['id']}}" class="hidden peer" @if($form['shipping_id'] == $shipping['id']) checked="checked" @endif>
                                        <label for="shipping-{{$shipping['id']}}"
                                               class="inline-flex w-full p-5
                                       text-gray-500 bg-white
                                       border border-gray-200 rounded-lg cursor-pointer
                                       peer-checked:border-blue-600
                                       peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100
                                        ">
                                            <div class="grid grid-cols-2 w-full">
                                                <div>
                                                    <div class="w-full text-lg font-semibold">{{$shipping['name']}}</div>
                                                    <div class="w-full text-base text-gray-400">{{$shipping['short_description']}}</div>
                                                </div>
                                                <div class="w-full text-lg font-semibold text-right">
                                                    {{number_format($shipping['cost'],-3,',','.')}}<span style="text-transform: none">đ</span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <hr class="my-5">
                        <h2 class="text-lg text-gray-900">Phương thức thanh toán</h2>
                        @if(!empty($payments))
                            <ul class="grid w-full gap-6 md:grid-cols-2 mt-4 text-sm">
                                @foreach($payments as $payment)
                                    <li>
                                        <input type="radio" id="payment-{{$payment['id']}}" name="payment_id" value="{{$payment['id']}}" class="hidden peer" @if($form['payment_id'] == $payment['id']) checked="checked" @endif>
                                        <label for="payment-{{$payment['id']}}"
                                               class="inline-flex w-full p-5 items-center justify-between
                                       text-gray-500 bg-white
                                       border border-gray-200 rounded-lg cursor-pointer
                                       peer-checked:border-blue-600
                                       peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100
                                        ">
                                            <div>
                                                <div class="w-full text-lg font-semibold">C.O.D</div>
                                                <div class="w-full text-base text-gray-400">Thanh toán khi nhận hàng</div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-lg text-gray-900">Thông tin đơn hàng</h2>
                        <div class="shadow-sm bg-white border border-gray-200 rounded-lg mt-5">
                            <h3 class="t">Sản phẩm trong giỏ hàng</h3>
                            @if(!empty($cart))
                                <ul role="list">
                                    @foreach($cart as $k => $pro)
                                        @php
                                            $subtotal += $pro['amount']*$pro['price'];
                                        @endphp
                                        <x-splade-input name="cart[{{$pro['product_id']}}]['package_course_id']" type="hidden" value="{{$pro['package_course_id']}}"/>
                                        <li class="p-6 flex border-b border-gray-200">
                                            <div class="shrink-0">
                                                <img src="{{$pro['package_course']['image_url']}}"
                                                     alt="{{$pro['product']}} - {{$pro['package_course']['name']}}: {{$pro['package_course']['time']}}"
                                                     class="rounded-md w-24">
                                            </div>
                                            <div class="flex flex-1 flex-col ml-6">
                                                <div class="flex ">
                                                    <div class="flex-1 min-w-0">
                                                        <h4 class="text-base">
                                                            <a href="#" class="text-gray-700 font-normal">{{$pro['product']}} - {{$pro['package_course']['name']}}</a>
                                                        </h4>
                                                        <p class="text-sm mt-2 text-gray-500">{{$pro['package_course']['time']}}</p>
                                                    </div>
                                                </div>
                                                <div class="flex flex-1 pt-2 justify-between justify-items-end">
                                                    <p class="text-base mt-2 text-gray-900 w-full text-right">{{$pro['amount']}} x {{number_format($pro['price'],-3,',','.')}}<span style="text-transform: none">đ</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <dl class="p-6 ">
                                    <div class="flex justify-between justify-items-center pb-6">
                                        <dt class="text-base">Thành tiền</dt>
                                        <dd class="text-base text-gray-900">
                                            {{number_format($subtotal,-3,',','.')}}<span style="text-transform: none">đ</span>
                                            <x-splade-input name="subtotal" type="hidden" value="{{$subtotal}}"/>
                                        </dd>
                                    </div>
                                    <div class="flex justify-between justify-items-center pb-6">
                                        <dt class="text-base">Phí vận chuyển</dt>
                                        <dd class="text-base text-gray-900">
                                            {{number_format($shipping_cost,-3,',','.')}}<span style="text-transform: none">đ</span>
                                            <x-splade-input name="shipping_cost" type="hidden" value="{{$shipping_cost}}"/>
                                        </dd>
                                    </div>
                                    <div class="flex justify-between justify-items-center pb-6 pt-6 border-t border-gray-200">
                                        <dt class="text-lg font-semibold">Tổng tiền</dt>
                                        <dd class="text-lg font-semibold">
                                            {{number_format($subtotal+$shipping_cost,-3,',','.')}}<span style="text-transform: none">đ</span>
                                            <x-splade-input name="total" type="hidden" value="{{$subtotal+$shipping_cost}}"/>
                                        </dd>
                                    </div>
                                </dl>
                                <div class="p-6 border-t border-gray-200">
                                    <button type="submit" class="shadow-sm text-lg font-semibold text-white bg-blue-600 w-full py-3 rounded-md">Thanh toán</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </x-splade-form>
            <x-splade-script>
                @foreach($shippings as $k => $shipping)
                    button = document.querySelector("#shipping-{{$shipping['id']}}");
                    button.addEventListener("change", function(event) {
                    form = document.querySelector("#checkout-form");
                    form.action = '{{route('profile.checkout.update')}}';
                    form.submit();
                    })
                @endforeach

                @foreach($payments as $k => $payment)
                    button = document.querySelector("#payment-{{$payment['id']}}");
                    button.addEventListener("change", function(event) {
                    form = document.querySelector("#checkout-form");
                    form.action = '{{route('profile.checkout.update')}}';
                    form.submit();
                    })
                @endforeach
            </x-splade-script>
        </div>
    </div>
@endsection

