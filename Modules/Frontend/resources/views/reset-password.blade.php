<?php

use Carbon\Carbon;

$default = [
    'email' => cache()->has('reset_code_' . session('reset_email')) ? session('reset_email') : ''
];
?>
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
                            RESET</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex  justify-center px-6 my-12">
            <!-- Row -->
            <x-splade-form
            class="max-w-[600px] mx-auto"
                :default="$default"
                :validateTrigger="'submit'" action="/reset-password" method="POST">
                <a-card class="px-4 min-w-full max-w-[800px]">

                    @if(cache()->has('reset_code_' .session('reset_email')))

                        <vue-countdown
                            :time="{{(int)Carbon::parse(cache()->get('reset_code_valid_' .session('reset_email')))->diffInSeconds(Carbon::now())}}*1000"
                            v-slot="{ days, hours, minutes, seconds }">
                            <x-splade-input v-bind:disabled="minutes || seconds" v-model="form.email" name="email" label="Email" type="email" required
                                            autocomplete="off"/>
                            <x-splade-input v-if="minutes || seconds" v-model="form.code" name="code" label="Code"
                                            required autocomplete="off"/>

                            <p v-if="minutes || seconds">
                                Expired after: <b v-if="minutes" v-text="minutes+' minutes'"></b> <b
                                    v-text="seconds +' seconds'"></b>

                            </p>
                            <div class="inline-flex w-full">
                                <div v-if="minutes || seconds" class="w-full" href="/reset-password">
                                    <x-splade-submit
                                        class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                                        :spinner="true">Submit
                                    </x-splade-submit>
                                </div>
                                <div class="w-full" v-if="!minutes && !seconds" href="/resend">
                                    <x-splade-submit :spinner="true">Resend</x-splade-submit>
                                </div>
                            </div>
                        </vue-countdown>


                    @else
                        <x-splade-input  v-model="form.email" name="email" label="Email" type="email" required
                                        autocomplete="off"/>
                        <x-splade-submit
                        class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                            :spinner="true">Send Code
                        </x-splade-submit>
                    @endif

                    <div class="inline-flex w-full">
                        <Link href="/login">
                            <x-front::button link>Login</x-front::button>
                        </Link>
                    </div>

                </a-card>
            </x-splade-form>
        </div>
    </div>
</x-front::layout.default>
