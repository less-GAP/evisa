<?php

use ProtoneMedia\Splade\Facades\SEO;

SEO::title(settings('site_title', ''))
    ->description(settings('site_description', ''))
    ->keywords(settings('site_keywords', ''));
SEO::openGraphType('WebPage');
SEO::openGraphSiteName(settings('site_title', ''));
SEO::openGraphTitle(settings('site_title', ''));
SEO::openGraphUrl(url('/'));

?>
<x-front::layout.default>
    <section class="relative banner">
        <div class="absolute top-0 left-0 z-10 w-full h-full overflow-hidden bg-banner">
            <img src="/static/images/home/banner.png"
                 alt="eVisa" class="absolute top-0 left-0 z-0 object-cover w-full h-full opacity-30">
        </div>
        <div class="container relative z-20 px-4 py-20 mx-auto content lg:py-32 xl:pt-32 xl:pb-56">
            <!-- <legend class="text-white text-[40px] sm:text-[48px] md:text-[54px] lg:text-[72px] 2xl:text-[100px] uppercase font-black italic leading-none">Make your dream</br>vacation happen!</legend> -->
            <form method="get" action="{{ route('apply') }}" class="2xl:text-lg">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="has-feedback">
                            <label class="block mb-2 font-semibold uppercase" for="applicant">Number of
                                applicants</label>
                            <select name="applicant" id="applicant"
                                    class="w-full bg-white border-0 cursor-pointer rounded-none js-select2"
                                    placeholder="Select number of applicants">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="mt-4 lg:mt-6 has-feedback">
                            <label class="block mb-2 font-semibold uppercase" for="visatype">Type of
                                visa</label>
                            <select name="visatype" id="visatype"
                                    class="w-full bg-white border-0 cursor-pointer rounded-none js-select2"
                                    placeholder="Select type of visa">
                                <!-- <option></option> -->
                                @foreach(master_data('type-of-visa') as $typeVisa)
                                    <option value="{{$typeVisa['value']}}">{{$typeVisa['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-4 mt-5 md:w-1/2 lg:w-1/3 md:mt-0 xl:flex xl:justify-center">
                        <div class="inner">
                            <span class="font-semibold uppercase form-label">Processing Time</span>
                            @foreach(frontend_processing_time()->where('contact_admin','<>',true) as $data)

                                <label class="flex p-2 pl-0 cursor-pointer">
                                    <div class="flex items-center justify-center w-6 h-6 p-1 mr-2 bg-white shadow">
                                        <input type="radio" class="hidden peer visa-processing-time"
                                               data-value="{{json_encode($data)}}" value="{{$data['value']}}"
                                               name="processing" checked
                                               data-time="Delivery Time: 14:30 - Friday, August 11 2023">
                                        <svg class="hidden w-4 h-4 pointer-events-none text-purple peer-checked:block"
                                             viewBox="0 0 172 172">
                                            <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none"
                                               font-weight="none" font-size="none" text-anchor="none"
                                               style="mix-blend-mode:normal">
                                                <path d="M0 172V0h172v172z"/>
                                                <path
                                                    d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                                    fill="currentColor" stroke-width="1"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="select-none">{{$data['label']}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full px-4 mt-5 md:w-1/2 lg:w-1/3 lg:mt-0">
                        <div class="font-semibold uppercase">Service fee:</div>
                        <div class="mt-2 font-semibold text-[36px] 2xl:text-[48px] leading-none"><span
                                id="lblTotal" class="">US$98.00</span>
                        </div>
                        <div class="mt-2 text-base">*This fee excludes US $25 for the government e-visa fees.
                        </div>
                        <button type="submit" href="/apply"
                           class="flex items-center justify-center p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10">Apply
                            Now</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="relative z-30 py-10 form-steps xl:-translate-y-2/3 xl:py-0">
        <div class="container px-4 mx-auto">
            <div class="space-y-4 xl:grid-cols-4 md:grid md:grid-cols-2 lg:gap-8 md:gap-4 md:space-y-0">
                <div
                    class="box flex items-center bg-[#f6f6f6] transition  lg:rounded-2xl rounded-xl relative overflow-hidden cursor-pointer p-5 lg:px-10 lg:py-8 h-full">
                    <!-- <div class="number relative z-10 text-3xl md:text-[42px] 2xl:text-[80px] mr-5 -mb-1 md:-mb-2">1</div> -->
                    <p class="relative z-10 w-full text-lg text-center xl:text-2xl md:text-xl lg:text-left">
                        <strong>300K</strong> Happy Customers
                    </p>
                </div>
                <div
                    class="box flex items-center bg-[#f6f6f6] transition  lg:rounded-2xl rounded-xl relative overflow-hidden cursor-pointer p-5 lg:px-10 lg:py-8 h-full">
                    <!-- <div class="number relative z-10 text-3xl md:text-[42px] 2xl:text-[80px] mr-5 -mb-1 md:-mb-2">2</div> -->
                    <p class="relative z-10 w-full text-lg text-center xl:text-2xl md:text-xl lg:text-left">
                        <strong>99%</strong> On Time Delivery
                    </p>
                </div>
                <div
                    class="box flex items-center bg-[#f6f6f6] transition  lg:rounded-2xl rounded-xl relative overflow-hidden cursor-pointer p-5 lg:px-10 lg:py-8 h-full">
                    <!-- <div class="number relative z-10 text-3xl md:text-[42px] 2xl:text-[80px] mr-5 -mb-1 md:-mb-2">3</div> -->
                    <p class="relative z-10 w-full text-lg text-center xl:text-2xl md:text-xl lg:text-left">
                        <strong>15</strong> Years of Experience
                    </p>
                </div>
                <div
                    class="box flex items-center bg-[#f6f6f6] transition  lg:rounded-2xl rounded-xl relative overflow-hidden cursor-pointer p-5 lg:px-10 lg:py-8 h-full">
                    <!-- <div class="number relative z-10 text-3xl md:text-[42px] 2xl:text-[80px] mr-5 -mb-1 md:-mb-2">3</div> -->
                    <p class="relative z-10 w-full text-lg text-center xl:text-2xl md:text-xl">Featured on <img
                            class="inline-block m-1"
                            src="/static/images/home/the-new-york-times.webp"
                            alt="the-new-york-times"></p>
                </div>
            </div>
        </div>
    </section>
    <section class="relative get-visa">
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
                        <h2
                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">
                            GET YOUR VISA</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-4 py-10 mx-auto md:py-20 xl:py-32">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 xl:w-3/4 2xl:w-7/12">
                    <div class="content max-w-[550px]">
                        <h3 class="lg:text-3xl text-xl text-[#2cafa4] font-black uppercase italic">How online
                            visa works?</h3>
                        <p class="mt-1 text-justify md:text-xl xl:text-2xl">Get your visa for Vietnam in 3
                            simple steps</p>
                    </div>
                    <div class="mt-5 tabs">
                        <div class="flex flex-wrap -mx-2 tab-navs">
                            <a href="javascript:void(0)"
                               class="block py-2 px-6 bg-[#f6f6f6] transition m-2 rounded-md js-tab active"
                               data-tab-id="tabevisa">E-visa</a>
                            <a href="javascript:void(0)"
                               class="block py-2 px-6 bg-[#f6f6f6] transition m-2 rounded-md js-tab"
                               data-tab-id="tabvisaonarrival">Visa on arrival</a>
                        </div>
                        <div class="tab-contents">
                            <div class="pt-4 js-tab-content" data-tab-id="tabevisa">
                                <div class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0">
                                    <h3 class="text-lg font-black uppercase quest lg:text-2xl">1. Fill in an
                                        online e-visa application form</h3>
                                    <p class="mt-1 text-base">Takes less than 5 minutes</p>
                                    <p class="mt-2 text-lg lg:text-xl">Upload clear and high-quality images of
                                        your passport's bio page and photo (4x6cm) in .jpg format.</p>
                                </div>
                                <div class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0">
                                    <h3 class="text-lg font-black uppercase quest lg:text-2xl">2. Review
                                        application and make payment</h3>
                                    <p class="mt-1 text-base">Review your application and pay for the e-visa
                                        fees</p>
                                    <p class="mt-2 text-lg lg:text-xl">Please carefully review and confirm all
                                        the information provided in your application, including your ports of
                                        arrival and date of travel. Please note that once your e-visa is issued,
                                        these details cannot be changed.</p>
                                </div>
                                <div class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0">
                                    <h3 class="text-lg font-black uppercase quest lg:text-2xl">3. Receive e-visa
                                        by email</h3>
                                    <p class="mt-1 text-base">The e-visa will be sent to you by email within 5-7
                                        working days</p>
                                    <p class="mt-2 text-lg lg:text-xl">Upon receiving your e-visa document via
                                        email, please ensure to print it out and have it with you when arriving
                                        at the port of entry in Vietnam.</p>
                                </div>
                            </div>
                            <div class="hidden pt-4 js-tab-content" data-tab-id="tabvisaonarrival">
                                <div class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0">
                                    <h3 class="text-lg font-black uppercase quest lg:text-2xl">1. Fill in an
                                        online form</h3>
                                    <p class="mt-1 text-base">Takes less than 5 minutes</p>
                                    <p class="mt-2 text-lg lg:text-xl">Fill in a secure online visa on arrival
                                        application form which takes a couple of minutes.</p>
                                </div>
                                <div class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0">
                                    <h3 class="text-lg font-black uppercase quest lg:text-2xl">2. Confirm and
                                        pay</h3>
                                    <p class="mt-1 text-base">Review the visa information and pay for the
                                        service fee</p>
                                    <p class="mt-2 text-lg lg:text-xl">Confirm the information for processing
                                        your visa letter including your name, date of birth, nationality,
                                        passport number and the date of arrival and then pay the service fee
                                        using credit cards or debit cards.</p>
                                </div>
                                <div class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0">
                                    <h3 class="text-lg font-black uppercase quest lg:text-2xl">3. Get your visa
                                        stamp</h3>
                                    <p class="mt-1 text-base">Prepare all documents and get on landing airport
                                        in Vietnam</p>
                                    <p class="mt-2 text-lg lg:text-xl">Receive the "<strong>Visa approval
                                            letter</strong>" by email in 3-5 working days, print it out, prepare
                                        2 passport size photos, <strong>stamping fee</strong> in cash,
                                        entry/exit form and your <strong>original passport</strong> to get your
                                        visa stamp when you arrive at Vietnam airport.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 mt-12 text-center xl:w-1/4 2xl:w-5/12 xl:text-left xl:mt-0">
                    <img src="/static/images/home/passport.png"
                         alt="passport-eVisa"
                         class="w-[200px] md:w-[375px] xl:ml-32 max-w-full inline-block grayscale">
                </div>
            </div>
        </div>
    </section>
    <section class="relative why-apply">
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
                        <h2
                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">
                            Why Apply with us</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-4 py-10 mx-auto md:py-20 xl:py-32">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full px-4 mb-4 md:w-1/2 xl:w-1/4">
                    <h3 class="text-xl font-black uppercase quest lg:text-2xl">Takes less than 5 minutes</h3>
                    <p class="mt-2 text-lg lg:text-xl">Our application form is user-friendly and simplified with
                        fewer fields to fill in.</p>
                </div>
                <div class="w-full px-4 mb-4 md:w-1/2 xl:w-1/4">
                    <h3 class="text-xl font-black uppercase quest lg:text-2xl">Expert review</h3>
                    <p class="mt-2 text-lg lg:text-xl">Our immigration experts review all information and
                        documents to ensure they meet the requirements.</p>
                </div>
                <div class="w-full px-4 mb-4 md:w-1/2 xl:w-1/4">
                    <h3 class="text-xl font-black uppercase quest lg:text-2xl">Money-back guarantee</h3>
                    <p class="mt-2 text-lg lg:text-xl">We offer a full refund for all fees in case your
                        application is rejected.</p>
                </div>
                <div class="w-full px-4 mb-4 md:w-1/2 xl:w-1/4">
                    <h3 class="text-xl font-black uppercase quest lg:text-2xl">Prompt support</h3>
                    <p class="mt-2 text-lg lg:text-xl">We offer quick support via Whatsapp, chat and email.</p>
                </div>
            </div>
            <div class="mt-10">
                <div class="text-center">
                    <a href="/apply"
                       class="inline-block px-6 pt-3 pb-2 text-lg font-semibold text-white uppercase bg-black md:px-12 xl:px-20">Apply
                        now</a>
                </div>
            </div>
        </div>
    </section>
    <x-front::posts title="News" tag="news">
    </x-front::posts>
    <x-splade-script>
        function calculateFee(){
        const value = jQuery('.visa-processing-time:checked').data('value')
        jQuery('#lblTotal').text('US$'+value['price_'+jQuery('#visatype').val()]+'.00');
        }
        jQuery('#visatype').change(function(){
        calculateFee()
        })
        jQuery('.visa-processing-time').click(function(){
        calculateFee()
        })
    </x-splade-script>
</x-front::layout.default>


