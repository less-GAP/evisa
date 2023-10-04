<x-front::layout.default>
    <div class="container mx-auto">
        <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">
            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">
                <div class="bg-white h-1/3"></div>
                <div class="h-1/3"
                     style="background: linear-gradient( to right, rgb(233,68,220) 0%, rgb(35,171,169) 25%, rgb(230,214,36) 50%, rgb(35,171,169) 75%, rgb(233,68,220) 100%); background-size: 200%; background-position: center;">
                </div>
                <div class="bg-white h-1/3"></div>
            </div>
            <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">
                <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">
                    <div class="hidden h-1/3"></div>
                    <div class="absolute bg-white h-1/3 mid-skew"></div>
                    <div class="hidden h-1/3"></div>
                    <div>
                        <h1
                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">
                            SIGNUP</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex  justify-center px-6 my-12">
            <!-- Row -->
                <x-splade-form  :validateTrigger="'submit'" action="/signup" method="POST">
                    <a-card class="px-4 " body-style="width:500px">
                        <x-splade-input required name="full_name" label="Full Name"  autocomplete="off"/>
                        <x-splade-input required name="phone" label="Phone"  autocomplete="off"/>
                        <x-splade-input name="email" label="Email" type="email" required autocomplete="off"/>
                        <x-splade-input name="password"  type="password" label="Password" required autocomplete="off"/>
                        <x-splade-input type="password" name="password_confirmation" label="Confirm Password" required
                                        autocomplete="off"/>
                        <x-splade-submit
                            class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                            :spinner="true">
                            Signup
                        </x-splade-submit>
                        @if(settings('login_google')=='active')
                            <GoogleLogin login_url="{{url('auth/google')}}"
                                         :success="()=>$splade.visit('/my-account')"
                                         client_id="{{settings('login_google_id')}}">

                            </GoogleLogin>
                        @endif
                    </a-card>
                </x-splade-form>
        </div>
    </div>
</x-front::layout.default>
