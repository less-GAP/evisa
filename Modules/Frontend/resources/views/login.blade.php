<x-front::layout.default>
<div class="pt-10 mx-auto">
    <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">
            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">
                <div class="bg-white h-1/3"></div>
                <div class="h-1/3" style="background: linear-gradient( to right, rgb(233,68,220) 0%, rgb(35,171,169) 25%, rgb(230,214,36) 50%, rgb(35,171,169) 75%, rgb(233,68,220) 100%); background-size: 200%; background-position: center;">
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
                            LOGIN</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <x-splade-form 
            class="max-w-[600px] mx-auto"
            :validateTrigger="'submit'" action="/login" method="POST">
                <a-card class="px-4 min-w-full max-w-[800px]">
                    <x-splade-input name="email" label="Email" type="email" required autocomplete="off"/>
                    <x-splade-input name="password" type="password" label="Password" required autocomplete="off"/>
                    @if(settings('recaptcha_auth_enable') == 'active')
                        <x-splade-input name="captcha" type="hidden" required
                                        autocomplete="off"/>
                        <Recaptcha v-model:value="form.captcha" action="test"
                                   site_key="{{settings('recaptcha_site_key')}}" v-slot="{ result }">
                            <x-splade-submit
                                v-bind:disabled="!result"
                                data-badge="inline"
                                class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                                :spinner="true"/>
                        </Recaptcha>
                    @else
                        <x-splade-submit
                            data-badge="inline"
                            class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                            :spinner="true"/>
                    @endif

                    <div class="inline-flex mt-3 w-full">
                        <Link class="mr-5" href="/reset-password">
                            Reset password
                        </Link>
                        <Link  href="/signup">
                            Signup
                        </Link>
                    </div>
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
