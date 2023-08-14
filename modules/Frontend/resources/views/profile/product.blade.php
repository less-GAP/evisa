@extends("Frontend::layout.index")
@section('content')
    <div class="grid grid-cols-4 max-w-screen-xl h-screen xl:mx-auto xl:grid-cols-4 gap-4 py-4">
        <div>
            @include("Frontend::profile.sidebar")
        </div>
        <div class="bg-white h-screen col-span-3 border-[1px] p-5">
            <h2 class="text-4xl font-extrabold dark:text-white pb-5">Danh sách sản phẩm</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
                @if(!empty($products))
                    @foreach($products as $key => $pro)
                        <a href="{{url('profile/product/'.$pro['id'])}}" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7" style="min-height: 235px;display: flex; align-items: center;">
                                <img src="{{$pro['image_url']}}" alt="{{$pro['products']['name'].' '.$pro['name'].' '.$pro['time']}}"
                                     class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-gray-700 font-semibold">
                                {{$pro['products']['name']}}
                            </h3>
                            <span aria-hidden="true" class="text-gray-400 text-sm">{{$pro['name'].' '.$pro['time']}}</span>
                            <p class="mt-1 text-lg font-medium text-gray-900">{{number_format($pro['price'],-3,',','.')}}</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
@endsection

