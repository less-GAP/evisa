<x-Frontend::layout.default>
    <section class="relative banner">
        <div class="absolute top-0 left-0 z-10 w-full h-full overflow-hidden bg-banner">
            <img src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/banner.png"
                 alt="eVisa" class="absolute top-0 left-0 z-0 object-cover w-full h-full opacity-30">
        </div>
        <div class="container relative z-20 px-4 py-20 mx-auto content lg:py-32 xl:pt-32 xl:pb-56">
            <!-- <legend class="text-white text-[40px] sm:text-[48px] md:text-[54px] lg:text-[72px] 2xl:text-[100px] uppercase font-black italic leading-none">Make your dream</br>vacation happen!</legend> -->
            <form method="post" action="{{ route('apply') }}" class="2xl:text-lg">
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
                                <option value="evisa1m">E-Visa (1 Month Single Entry):</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-4 mt-5 md:w-1/2 lg:w-1/3 md:mt-0 xl:flex xl:justify-center">
                        <div class="inner">
                            <span class="font-semibold uppercase form-label">Processing Time</span>
                            <label class="flex p-2 pl-0 cursor-pointer">
                                <div class="flex items-center justify-center w-6 h-6 p-1 mr-2 bg-white shadow">
                                    <input type="radio" class="hidden peer" name="processing" checked
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
                                <span class="select-none">Standard processing (5-7 working days)</span>
                            </label>
                            <label class="flex p-2 pl-0 cursor-pointer">
                                <div class="flex items-center justify-center w-6 h-6 p-1 mr-2 bg-white shadow">
                                    <input type="radio" class="hidden peer" name="processing"
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
                                <span class="select-none">Urgent 2 Working Days (Mon-Fri)</span>
                            </label>
                            <label class="flex p-2 pl-0 cursor-pointer">
                                <div class="flex items-center justify-center w-6 h-6 p-1 mr-2 bg-white shadow">
                                    <input type="radio" class="hidden peer" name="processing"
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
                                <span class="select-none">Urgent 1 Working Day (Mon-Fri)</span>
                            </label>
                            <label class="flex p-2 pl-0 cursor-pointer">
                                <div class="flex items-center justify-center w-6 h-6 p-1 mr-2 bg-white shadow">
                                    <input type="radio" class="hidden peer" name="processing"
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
                                <span class="select-none">Same Day (4-8 Working Hours)</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-full px-4 mt-5 md:w-1/2 lg:w-1/3 lg:mt-0">
                        <div class="font-semibold uppercase">Service fee:</div>
                        <div class="mt-2 font-semibold text-[36px] 2xl:text-[48px] leading-none"><span
                                id="lblTotal" class="">US$98.00</span>
                        </div>
                        <div class="mt-2 text-base">*This fee excludes US $25 for the government e-visa fees.
                        </div>
                        <a href="/apply"
                           class="flex items-center justify-center p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10">Apply
                            Now</a>
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
                            src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/the-new-york-times.webp"
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
                    <img src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/passport.png"
                         alt="passport-eVisa"
                         class="w-[200px] md:w-[375px] xl:ml-32 max-w-full inline-block grayscale">
                </div>
            </div>
        </div>
    </section>
{{--    <section class="relative our-services">--}}
{{--        <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">--}}
{{--            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--                <div class="h-1/3"--}}
{{--                     style="background: linear-gradient( to right, rgb(35,171,169) 0%, rgb(228,204,55) 25%, rgb(179,36,107) 50%, rgb(228,204,55) 75%, rgb(35,171,169) 100%); background-size: 200%; background-position: center;">--}}
{{--                </div>--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--            </div>--}}
{{--            <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">--}}
{{--                <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div class="absolute bg-white h-1/3 mid-skew"></div>--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div>--}}
{{--                        <h2--}}
{{--                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">--}}
{{--                            Visa information by countries</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container px-4 py-10 mx-auto md:py-20 xl:py-32">--}}
{{--            <div class="flex flex-wrap justify-center -mx-4">--}}
{{--                <div class="w-full px-4 mb-4 sm:w-1/2 md:w-1/3 xl:w-1/5">--}}
{{--                    <div--}}
{{--                        class="content md:w-[350px] max-w-full relative bg-white group rounded-md overflow-hidden shadow-md">--}}
{{--                        <div class="relative h-40 overflow-hidden rounded-md top">--}}
{{--                            <a href="#">--}}
{{--                                <img class="absolute top-0 left-0 object-cover w-full h-full"--}}
{{--                                     src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/countries/visa-information-by-united-states.webp"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="relative p-3 bottom">--}}
{{--                                    <span--}}
{{--                                        class="absolute z-10 flex items-center justify-center w-10 h-10 overflow-hidden translate-y-1/2 bg-white rounded-full right-3 bottom-full"><i--}}
{{--                                            class="w-8 h-8 fflag ff-round fflag-US"></i></span>--}}
{{--                            <h4 class="text-lg font-black uppercase opacity-80 lg:text-xl"><a href="#">United--}}
{{--                                    States</a></h4>--}}
{{--                            <a href="#"--}}
{{--                               class="transition border-b border-transparent border-solid group-hover:border-black">Learn--}}
{{--                                More</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="absolute top-0 left-0 z-50 w-full h-full"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-4 mb-4 sm:w-1/2 md:w-1/3 xl:w-1/5">--}}
{{--                    <div--}}
{{--                        class="content md:w-[350px] max-w-full relative bg-white group rounded-md overflow-hidden shadow-md">--}}
{{--                        <div class="relative h-40 overflow-hidden rounded-md top">--}}
{{--                            <a href="#">--}}
{{--                                <img class="absolute top-0 left-0 object-cover w-full h-full"--}}
{{--                                     src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/countries/visa-information-by-canada.webp"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="relative p-3 bottom">--}}
{{--                                    <span--}}
{{--                                        class="absolute z-10 flex items-center justify-center w-10 h-10 overflow-hidden translate-y-1/2 bg-white rounded-full right-3 bottom-full"><i--}}
{{--                                            class="w-8 h-8 fflag ff-round fflag-CA"></i></span>--}}
{{--                            <h4 class="text-lg font-black uppercase opacity-80 lg:text-xl"><a--}}
{{--                                    href="#">Canada</a></h4>--}}
{{--                            <a href="#"--}}
{{--                               class="transition border-b border-transparent border-solid group-hover:border-black">Learn--}}
{{--                                More</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="absolute top-0 left-0 z-50 w-full h-full"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-4 mb-4 sm:w-1/2 md:w-1/3 xl:w-1/5">--}}
{{--                    <div--}}
{{--                        class="content md:w-[350px] max-w-full relative bg-white group rounded-md overflow-hidden shadow-md">--}}
{{--                        <div class="relative h-40 overflow-hidden rounded-md top">--}}
{{--                            <a href="#">--}}
{{--                                <img class="absolute top-0 left-0 object-cover w-full h-full"--}}
{{--                                     src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/countries/visa-information-by-australia.webp"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="relative p-3 bottom">--}}
{{--                                    <span--}}
{{--                                        class="absolute z-10 flex items-center justify-center w-10 h-10 overflow-hidden translate-y-1/2 bg-white rounded-full right-3 bottom-full"><i--}}
{{--                                            class="w-8 h-8 fflag ff-round fflag-AU"></i></span>--}}
{{--                            <h4 class="text-lg font-black uppercase opacity-80 lg:text-xl"><a--}}
{{--                                    href="#">Australia</a></h4>--}}
{{--                            <a href="#"--}}
{{--                               class="transition border-b border-transparent border-solid group-hover:border-black">Learn--}}
{{--                                More</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="absolute top-0 left-0 z-50 w-full h-full"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-4 mb-4 sm:w-1/2 md:w-1/3 xl:w-1/5">--}}
{{--                    <div--}}
{{--                        class="content md:w-[350px] max-w-full relative bg-white group rounded-md overflow-hidden shadow-md">--}}
{{--                        <div class="relative h-40 overflow-hidden rounded-md top">--}}
{{--                            <a href="#">--}}
{{--                                <img class="absolute top-0 left-0 object-cover w-full h-full"--}}
{{--                                     src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/countries/visa-information-by-united-kingdom.webp"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="relative p-3 bottom">--}}
{{--                                    <span--}}
{{--                                        class="absolute z-10 flex items-center justify-center w-10 h-10 overflow-hidden translate-y-1/2 bg-white rounded-full right-3 bottom-full"><i--}}
{{--                                            class="w-8 h-8 fflag ff-round fflag-GB"></i></span>--}}
{{--                            <h4 class="text-lg font-black uppercase opacity-80 lg:text-xl"><a href="#">United--}}
{{--                                    Kingdom</a></h4>--}}
{{--                            <a href="#"--}}
{{--                               class="transition border-b border-transparent border-solid group-hover:border-black">Learn--}}
{{--                                More</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="absolute top-0 left-0 z-50 w-full h-full"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-4 mb-4 sm:w-1/2 md:w-1/3 xl:w-1/5">--}}
{{--                    <div--}}
{{--                        class="content md:w-[350px] max-w-full relative bg-white group rounded-md overflow-hidden shadow-md">--}}
{{--                        <div class="relative h-40 overflow-hidden rounded-md top">--}}
{{--                            <a href="#">--}}
{{--                                <img class="absolute top-0 left-0 object-cover w-full h-full"--}}
{{--                                     src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/countries/visa-information-by-india.webp"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="relative p-3 bottom">--}}
{{--                                    <span--}}
{{--                                        class="absolute z-10 flex items-center justify-center w-10 h-10 overflow-hidden translate-y-1/2 bg-white rounded-full right-3 bottom-full"><i--}}
{{--                                            class="w-8 h-8 fflag ff-round fflag-IN"></i></span>--}}
{{--                            <h4 class="text-lg font-black uppercase opacity-80 lg:text-xl"><a href="#">India</a>--}}
{{--                            </h4>--}}
{{--                            <a href="#"--}}
{{--                               class="transition border-b border-transparent border-solid group-hover:border-black">Learn--}}
{{--                                More</a>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="absolute top-0 left-0 z-50 w-full h-full"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mt-10">--}}
{{--                <div class="text-center">--}}
{{--                    <a href="javascript:void(0)" data-toggle="list-country"--}}
{{--                       class="inline-block px-6 pt-3 pb-2 text-lg font-semibold text-white uppercase bg-black md:px-12 xl:px-20 js-toggle">View--}}
{{--                        more</a>--}}
{{--                </div>--}}
{{--                <div class="hidden js-toggle-content" data-toggle="list-country">--}}
{{--                    <ul class="grid grid-cols-2 gap-5 mt-10 lg:gap-8 md:grid-cols-3 lg:grid-cols-5">--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-AD"></i>--}}
{{--                                Andorra (AD)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-AR"></i>--}}
{{--                                Argentina (AR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-AM"></i>--}}
{{--                                Armenia (AM)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-AT"></i>--}}
{{--                                Austria (AT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-AZ"></i>--}}
{{--                                Azerbaijan (AZ)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BY"></i>--}}
{{--                                Belarus (BY)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BE"></i>--}}
{{--                                Belgium (BE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BT"></i>--}}
{{--                                Bhutan (BT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BO"></i>--}}
{{--                                Bolivia (BO)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BA"></i>--}}
{{--                                Bosnia and Herzegovina (BA)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BR"></i>--}}
{{--                                Brazil (BR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BN"></i>--}}
{{--                                Brunei (BN)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-BG"></i>--}}
{{--                                Bulgaria (BG)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-KH"></i>--}}
{{--                                Cambodia (KH)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CL"></i>--}}
{{--                                Chile (CL)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CN"></i>--}}
{{--                                China (CN)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CO"></i>--}}
{{--                                Colombia (CO)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-HR"></i>--}}
{{--                                Croatia (HR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CU"></i>--}}
{{--                                Cuba (CU)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CY"></i>--}}
{{--                                Cyprus (CY)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CZ"></i>--}}
{{--                                Czech Republic (CZ)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-DK"></i>--}}
{{--                                Denmark (DK)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-EC"></i>--}}
{{--                                Ecuador (EC)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-EE"></i>--}}
{{--                                Estonia (EE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-FJ"></i>--}}
{{--                                Fiji (FJ)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-FI"></i>--}}
{{--                                Finland (FI)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-FR"></i>--}}
{{--                                France (FR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-GE"></i>--}}
{{--                                Georgia (GE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-DE"></i>--}}
{{--                                Germany (DE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-GR"></i>--}}
{{--                                Greece (GR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-GT"></i>--}}
{{--                                Guatemala (GT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-HN"></i>--}}
{{--                                Honduras (HN)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-HK"></i>--}}
{{--                                Hong Kong (HK)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-HU"></i>--}}
{{--                                Hungary (HU)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-IS"></i>--}}
{{--                                Iceland (IS)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-IN"></i>--}}
{{--                                India (IN)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-ID"></i>--}}
{{--                                Indonesia (ID)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-IE"></i>--}}
{{--                                Ireland (IE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-IL"></i>--}}
{{--                                Israel (IL)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-IT"></i>--}}
{{--                                Italy (IT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-JP"></i>--}}
{{--                                Japan (JP)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-KZ"></i>--}}
{{--                                Kazakhstan (KZ)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-KG"></i>--}}
{{--                                Kyrgyzstan (KG)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-LA"></i>--}}
{{--                                Laos (LA)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-LV"></i>--}}
{{--                                Latvia (LV)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-LI"></i>--}}
{{--                                Liechtenstein (LI)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-LT"></i>--}}
{{--                                Lithuania (LT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-LU"></i>--}}
{{--                                Luxembourg (LU)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MY"></i>--}}
{{--                                Malaysia (MY)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MT"></i>--}}
{{--                                Malta (MT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MH"></i>--}}
{{--                                Marshall Islands (MH)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MX"></i>--}}
{{--                                Mexico (MX)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-FM"></i>--}}
{{--                                Micronesia (FM)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MD"></i>--}}
{{--                                Moldova (MD)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MC"></i>--}}
{{--                                Monaco (MC)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MN"></i>--}}
{{--                                Mongolia (MN)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-ME"></i>--}}
{{--                                Montenegro (ME)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MM"></i>--}}
{{--                                Myanmar (MM)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-NR"></i>--}}
{{--                                Nauru (NR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-NL"></i>--}}
{{--                                Netherlands (NL)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-NZ"></i>--}}
{{--                                New Zealand (NZ)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-MK"></i>--}}
{{--                                North Macedonia (MK)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-NO"></i>--}}
{{--                                Norway (NO)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PW"></i>--}}
{{--                                Palau (PW)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PA"></i>--}}
{{--                                Panama (PA)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PG"></i>--}}
{{--                                Papua New Guinea (PG)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PY"></i>--}}
{{--                                Paraguay (PY)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PE"></i>--}}
{{--                                Peru (PE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PH"></i>--}}
{{--                                Philippines (PH)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PL"></i>--}}
{{--                                Poland (PL)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-PT"></i>--}}
{{--                                Portugal (PT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-QA"></i>--}}
{{--                                Qatar (QA)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-RO"></i>--}}
{{--                                Romania (RO)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-RU"></i>--}}
{{--                                Russia (RU)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-WS"></i>--}}
{{--                                Samoa (WS)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-SM"></i>--}}
{{--                                San Marino (SM)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-RS"></i>--}}
{{--                                Serbia (RS)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-SG"></i>--}}
{{--                                Singapore (SG)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-SK"></i>--}}
{{--                                Slovakia (SK)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-SI"></i>--}}
{{--                                Slovenia (SI)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-SB"></i>--}}
{{--                                Solomon Islands (SB)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-ZA"></i>--}}
{{--                                South Africa (ZA)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-KR"></i>--}}
{{--                                South Korea (KR)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-ES"></i>--}}
{{--                                Spain (ES)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-SE"></i>--}}
{{--                                Sweden (SE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-CH"></i>--}}
{{--                                Switzerland (CH)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-TH"></i>--}}
{{--                                Thailand (TH)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-TL"></i>--}}
{{--                                Timor-Leste (TL)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-TT"></i>--}}
{{--                                Trinidad and Tobago (TT)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-AE"></i>--}}
{{--                                United Arab Emirates (AE)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-UY"></i>--}}
{{--                                Uruguay (UY)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-UZ"></i>--}}
{{--                                Uzbekistan (UZ)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-VU"></i>--}}
{{--                                Vanuatu (VU)</a></li>--}}
{{--                        <li><a class="flex items-center p-2 bg-white shadow" href="#"><i--}}
{{--                                    class="inline-block w-8 h-8 mr-2 rounded-full shadow-xl fflag ff-round fflag-VE"></i>--}}
{{--                                Venezuela (VE)</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
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
{{--    <section class="relative visa-centre">--}}
{{--        <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">--}}
{{--            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--                <div class="h-1/3"--}}
{{--                     style="background: linear-gradient( to right, rgb(222,255,67) 0%, rgb(0,85,193) 25%, rgb(115,255,87) 50%, rgb(0,85,193) 75%, rgb(222,255,67) 100%); background-size: 200%; background-position: center;">--}}
{{--                </div>--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--            </div>--}}
{{--            <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">--}}
{{--                <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div class="absolute bg-white h-1/3 mid-skew"></div>--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div>--}}
{{--                        <h2--}}
{{--                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">--}}
{{--                            Visa information centre</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container px-4 py-10 mx-auto md:py-20 xl:py-32">--}}
{{--            <div class="flex flex-wrap justify-center -mx-4">--}}
{{--                <div class="w-full px-4 mt-4 mb-4 md:w-1/2 xl:w-1/3 md:mt-0">--}}
{{--                    <div class="post">--}}
{{--                        <div class="post-wrapper">--}}
{{--                            <div--}}
{{--                                class="featured-image post-image pb-[58.5%] h-0 overflow-hidden relative z-10 w-full rounded-lg lg:rounded-xl">--}}
{{--                                <a href="#">--}}
{{--                                    <img--}}
{{--                                        src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/e-visa.webp"--}}
{{--                                        alt="news-eVisa"--}}
{{--                                        class="absolute top-0 left-0 object-cover w-full h-full">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 post-content">--}}
{{--                                <h4--}}
{{--                                    class="mb-2 text-lg font-black uppercase post-title md:text-xl xl:text-2xl line-clamp-2">--}}
{{--                                    <a href="#" class="text-inherit">E-visa</a>--}}
{{--                                </h4>--}}
{{--                                <p--}}
{{--                                    class="post-description text-lg lg:text-xl text-justify w-[650px] max-w-full line-clamp-2">--}}
{{--                                    The easiest and most convenient way to get a visa for Vietnam with a simple--}}
{{--                                    form to fill in.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-4 mt-4 mb-4 md:w-1/2 xl:w-1/3 md:mt-0">--}}
{{--                    <div class="post">--}}
{{--                        <div class="post-wrapper">--}}
{{--                            <div--}}
{{--                                class="featured-image post-image pb-[58.5%] h-0 overflow-hidden relative z-10 w-full rounded-lg lg:rounded-xl">--}}
{{--                                <a href="#">--}}
{{--                                    <img--}}
{{--                                        src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/visa-on-arrival.webp"--}}
{{--                                        alt="news-eVisa"--}}
{{--                                        class="absolute top-0 left-0 object-cover w-full h-full">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 post-content">--}}
{{--                                <h4--}}
{{--                                    class="mb-2 text-lg font-black uppercase post-title md:text-xl xl:text-2xl line-clamp-2">--}}
{{--                                    <a href="#" class="text-inherit">Visa On Arrival</a>--}}
{{--                                </h4>--}}
{{--                                <p--}}
{{--                                    class="post-description text-lg lg:text-xl text-justify w-[650px] max-w-full line-clamp-2">--}}
{{--                                    Visa on arrival is an alternative way to get a visa for Vietnam for those--}}
{{--                                    who travel on a tour package with local operator...</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-4 mt-4 mb-4 md:w-1/2 xl:w-1/3 md:mt-0">--}}
{{--                    <div class="post">--}}
{{--                        <div class="post-wrapper">--}}
{{--                            <div--}}
{{--                                class="featured-image post-image pb-[58.5%] h-0 overflow-hidden relative z-10 w-full rounded-lg lg:rounded-xl">--}}
{{--                                <a href="#">--}}
{{--                                    <img--}}
{{--                                        src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/visa-update.webp"--}}
{{--                                        alt="news-eVisa"--}}
{{--                                        class="absolute top-0 left-0 object-cover w-full h-full">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 post-content">--}}
{{--                                <h4--}}
{{--                                    class="mb-2 text-lg font-black uppercase post-title md:text-xl xl:text-2xl line-clamp-2">--}}
{{--                                    <a href="#" class="text-inherit">News & Updates</a>--}}
{{--                                </h4>--}}
{{--                                <p--}}
{{--                                    class="post-description text-lg lg:text-xl text-justify w-[650px] max-w-full line-clamp-2">--}}
{{--                                    Stay updated, stay informed with our latest and upcoming visa policy--}}
{{--                                    changes...</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="relative featured-on">--}}
{{--        <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">--}}
{{--            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--                <div class="h-1/3"--}}
{{--                     style="background: linear-gradient( to right, rgb(35,171,169) 0%, rgb(228,204,55) 25%, rgb(179,36,107) 50%, rgb(228,204,55) 75%, rgb(35,171,169) 100%); background-size: 200%; background-position: center;">--}}
{{--                </div>--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--            </div>--}}
{{--            <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">--}}
{{--                <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div class="absolute bg-white h-1/3 mid-skew"></div>--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div>--}}
{{--                        <h2--}}
{{--                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">--}}
{{--                            As Featured on</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container px-4 py-10 mx-auto md:py-20 xl:py-32">--}}
{{--            <div class="text-center">--}}
{{--                <img class="inline-block"--}}
{{--                     src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/home/clients-myvietnamvisa.webp"--}}
{{--                     alt="As Featured on">--}}
{{--            </div>--}}
{{--            <div class="max-w-3xl pt-8 mx-auto mt-8 border-t border-black border-solid xl:mt-20">--}}
{{--                <div class="mb-10 post">--}}
{{--                    <h4 class="mb-2 text-2xl font-semibold"><a href="#">The New York Times</a></h4>--}}
{{--                    <p>Visas are required for American visitors — a one-month, single-entry visa is $20 through--}}
{{--                        My Vietnam Visa (myvietnamvisa.com), an online agency that arranges for documents to be--}}
{{--                        picked up upon arrival at Vietnam’s international airports.</p>--}}
{{--                </div>--}}
{{--                <div class="post">--}}
{{--                    <h4 class="mb-2 text-2xl font-semibold"><a href="#">What Our Clients Say</a></h4>--}}
{{--                    <p>Dear Ms Van Anh<br>--}}
{{--                        First let me thank you for your excellent service.--}}
{{--                        Many of my friends have used your service and my experience only reinforces what they--}}
{{--                        have already recommend to me. I will be pleased to tell others about your very efficient--}}
{{--                        services.--}}
{{--                        <br>--}}
{{--                        Best Wishes,--}}
{{--                        John Wilfred FARRER--}}
{{--                    </p>--}}
{{--                    <a href="#" class="inline-block mt-2 underline">View our customer's testimonials</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="relative faqs">--}}
{{--        <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">--}}
{{--            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--                <div class="h-1/3"--}}
{{--                     style="background: linear-gradient( to right, rgb(230,214,36) 0%, rgb(35,171,169) 25%, rgb(233,68,220) 50%, rgb(35,171,169) 75%, rgb(230,214,36) 100%); background-size: 200%; background-position: center;">--}}
{{--                </div>--}}
{{--                <div class="bg-white h-1/3"></div>--}}
{{--            </div>--}}
{{--            <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">--}}
{{--                <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div class="absolute bg-white h-1/3 mid-skew"></div>--}}
{{--                    <div class="hidden h-1/3"></div>--}}
{{--                    <div>--}}
{{--                        <h2--}}
{{--                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">--}}
{{--                            FAQs</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container px-4 py-10 mx-auto md:py-20 xl:py-32">--}}
{{--            <div class="max-w-4xl mx-auto list-questions">--}}

{{--                <div--}}

{{--                    class="relative pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}
{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-1">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">1. What are the recent visa--}}
{{--                                policy changes in Vietnam for 2023?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-1">--}}
{{--                            <p class="mb-2">Here are a few updates on visa for Vietnam:</p>--}}
{{--                            <ul class="mb-2">--}}
{{--                                <li class="ml-4 list-disc list-item">For visa exemption: The gap between 2 visa-free--}}
{{--                                    entries has been removed, you now can re-enter Vietnam immediately without--}}
{{--                                    having to wait for another 30 days.--}}
{{--                                </li>--}}
{{--                                <li class="ml-4 list-disc list-item">Visa on arrival option is only available to--}}
{{--                                    visitors who are traveling on a tour program.--}}
{{--                                </li>--}}
{{--                                <li class="ml-4 list-disc list-item">3 month multi-entry (Evisa) may be available in--}}
{{--                                    June or July this year.--}}
{{--                                </li>--}}
{{--                                <li class="ml-4 list-disc list-item">More countries to be added to the visa-free--}}
{{--                                    country list soon.--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p>More news and updates:</p>--}}
{{--                            <p><a class="hover:text-[#d75dd6]"--}}
{{--                                  href="https://www.myvietnamvisa.com/vietnam-visa-policy-updates-news.html">https://www.myvietnamvisa.com/vietnam-visa-policy-updates-news.html</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}

{{--                </div>--}}
{{--                <div--}}
{{--                    class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}

{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-2">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">2. Where can I submit an--}}
{{--                                application for a Vietnam e-Visa?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-2">--}}
{{--                            <p class="mb-2">There are two options:</p>--}}
{{--                            <ul class="mb-2">--}}
{{--                                <li class="ml-4 list-disc list-item">1. Apply on the official website of the--}}
{{--                                    Immigration Department (<a class="hover:text-[#d75dd6]"--}}
{{--                                                               href="https://evisa.xuatnhapcanh.gov.vn/trang-chu-ttdt">https://evisa.xuatnhapcanh.gov.vn/trang-chu-ttdt</a>).--}}
{{--                                </li>--}}
{{--                                <li class="ml-4 list-disc list-item">2. Apply on our website:</li>--}}
{{--                            </ul>--}}
{{--                            <p class="mb-2">Benefits of applying for an e-visa on My Vietnam Visa website:</p>--}}
{{--                            <ul class="">--}}
{{--                                <li class="ml-4 list-disc list-item">We have created a simplified form with fewer--}}
{{--                                    required fields, making it easier to complete.--}}
{{--                                </li>--}}
{{--                                <li class="ml-4 list-disc list-item">We have 99% on time rate. Our team of--}}
{{--                                    immigration experts thoroughly reviews all information and documentation--}}
{{--                                    provided. That will decrease the likelihood of your visa application being--}}
{{--                                    rejected.--}}
{{--                                </li>--}}
{{--                                <li class="ml-4 list-disc list-item">We provide customers with fast and responsive--}}
{{--                                    support.--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}

{{--                </div>--}}
{{--                <div--}}
{{--                    class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}

{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-3">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">3. Can I extend my Vietnam--}}
{{--                                visa?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-3">--}}
{{--                            <p class="">Currently, as of May 2023, visa extensions are not available. However,--}}
{{--                                starting from June 2023, visitors will be able to extend their stay in Vietnam when--}}
{{--                                the visa policy is eased.</p>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}

{{--                </div>--}}
{{--                <div--}}
{{--                    class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}

{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-4">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">4. How long does it take to--}}
{{--                                get a visa to Vietnam?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-4">--}}
{{--                            <p class="">The standard processing time for a pre-approved visa letter normally takes--}}
{{--                                2-3 working days, while for an e-visa, it usually takes 3-5 working days. However,--}}
{{--                                urgent visa processing can be completed within 1 working day for both types of--}}
{{--                                visas. In cases where super urgent processing is required, it can be done in as--}}
{{--                                little as 2 hours.</p>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}

{{--                </div>--}}
{{--                <div--}}
{{--                    class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}

{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-5">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">5. How much is a Vietnam--}}
{{--                                visa?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-5">--}}
{{--                            <p class="">The cost of a visa for Vietnam depends on the type of visa you are applying--}}
{{--                                for. In general, a single-entry 30-day e-visa fee is $25 USD per person if you apply--}}
{{--                                directly on the official immigration website.</p>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}

{{--                </div>--}}
{{--                <div--}}
{{--                    class="pb-6 mt-10 border-b border-black item border-opacity-30 first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}
{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-6">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">6. How do I get a visa for--}}
{{--                                Vietnam?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-6">--}}
{{--                            <p class="">Electronic visa (E-visa) is currently the simplest and easiest way to apply--}}
{{--                                for a visa to visit Vietnam. E-visa allows citizens from 80 countries to register--}}
{{--                                and use it at 33 international ports of entry including land, sea, and air--}}
{{--                                borders.</p>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}
{{--                </div>--}}
{{--                <div class="pb-6 mt-10 item first:mt-0 question-wrapper">--}}
{{--                    <x-splade-toggle>--}}
{{--                        <div @click.prevent="toggle" class="relative pl-12 cursor-pointer question js-toggle"--}}
{{--                             data-toggle="quest-7">--}}
{{--                                <span--}}
{{--                                    class="absolute left-0 flex items-center justify-center w-8 h-8 text-white -translate-y-1/2 bg-black rounded drop-shadow-lg top-1/2 shadow-gray-500 transistion question-icon"><i--}}
{{--                                        class="text-sm fa-solid fa-chevron-down"></i></span>--}}
{{--                            <h3 class="text-lg font-black uppercase quest lg:text-2xl">7. Do I need a visa to go to--}}
{{--                                Vietnam?</h3>--}}
{{--                        </div>--}}
{{--                        <div v-show="toggled" class=" mt-4 text-base lg:text-lg question-answer js-toggle-content"--}}
{{--                             data-toggle="quest-7">--}}
{{--                            <p class="mb-2">Vietnam is currently granting visa <strong>exemptions</strong> to <a--}}
{{--                                    class="text-[#d75dd6] underline font-bold" href="">25 countries</a>, including--}}
{{--                                ASEAN countries, the UK, Spain, Germany, France, and some others. If you are <b>not--}}
{{--                                    eligible</b> for entry visa exemption, you will <b>need</b> to obtain a <b>valid--}}
{{--                                    visa</b> to enter Vietnam.</p>--}}
{{--                            <table--}}
{{--                                class="w-full text-sm border-t border-l border-gray-500 border-solid lg:text-base">--}}
{{--                                <thead>--}}
{{--                                <th class="p-2 text-left border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                    Country--}}
{{--                                </th>--}}
{{--                                <th class="p-2 text-left border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                    Duration (days)--}}
{{--                                </th>--}}
{{--                                <th class="p-2 text-left border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                    Note--}}
{{--                                </th>--}}
{{--                                <th class="p-2 text-left border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                    Purpose of entry--}}
{{--                                </th>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Russia--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Japan--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">South--}}
{{--                                        Korea--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Norway--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Finland--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Denmark--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Sweden--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">United--}}
{{--                                        Kingdom--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">France--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Germany--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Spain--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Italia--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Belarus--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">15--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">--}}
{{--                                        Unilateral--}}
{{--                                    </td>--}}
{{--                                    <td class="p-2 border-b border-r border-gray-500 border-solid md:p-3">Not--}}
{{--                                        required--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </x-splade-toggle>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container px-4 pb-5 mx-auto lg:pb-10 2xl:pb-16">--}}
{{--            <div class="swiper swiper-partners">--}}
{{--                <swiper--}}
{{--                    class="swiper-wrapper"--}}
{{--                    :slides-per-view="3"--}}
{{--                    :space-between="50"--}}
{{--                    :breakpoints="{--}}
{{--                    0: {--}}
{{--                        slidesPerView: 2,--}}
{{--                        spaceBetween: 10,--}}
{{--                    },--}}
{{--                    640: {--}}
{{--                        slidesPerView: 3,--}}
{{--                        spaceBetween: 20,--}}
{{--                    },--}}
{{--                    768: {--}}
{{--                        slidesPerView: 4,--}}
{{--                        spaceBetween: 30,--}}
{{--                    },--}}
{{--                    1024: {--}}
{{--                        slidesPerView: 5,--}}
{{--                        spaceBetween: 40,--}}
{{--                    },--}}
{{--                    1280: {--}}
{{--                        slidesPerView: 6,--}}
{{--                        spaceBetween: 50,--}}
{{--                    }}"--}}
{{--                >--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/alpha-delight.png"--}}
{{--                                alt="alpha-delight.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/buddha.png"--}}
{{--                                alt="buddha.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/cobra.png"--}}
{{--                                alt="cobra.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/craw-fish-7.png"--}}
{{--                                alt="craw-fish-7.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/d360.png"--}}
{{--                                alt="d360.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/damtexas.png"--}}
{{--                                alt="damtexas.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/ellipsis-360.svg"--}}
{{--                                alt="ellipsis-360.svg-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/liftmar.png"--}}
{{--                                alt="liftmar.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/lpfbakery.png"--}}
{{--                                alt="lpfbakery.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/luxnailspa.png"--}}
{{--                                alt="luxnailspa.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/msrauma.png"--}}
{{--                                alt="msrauma.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/nailsupplydiscount.png"--}}
{{--                                alt="nailsupplydiscount.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/nikki.png"--}}
{{--                                alt="nikki.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/omega-flux.png"--}}
{{--                                alt="omega-flux.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/ongles.png"--}}
{{--                                alt="ongles.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/power-of-five.png"--}}
{{--                                alt="power-of-five.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/qura.png"--}}
{{--                                alt="qura.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/thuan-chay.png"--}}
{{--                                alt="thuan-chay.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                    <swiper-slide class="swiper-slide">--}}
{{--                        <div--}}
{{--                            class="partner flex items-center justify-center mx-auto h-[80px] xl:h-[120px] w-[150px] xl:w-[230px] max-w-full">--}}
{{--                            <img--}}
{{--                                src="https://evisa.usa-server.com/wp-content/themes/lessGAP/assets/images/partners/titras.png"--}}
{{--                                alt="titras.png-eVisa"--}}
{{--                                class="object-contain max-w-full max-h-full transition cursor-pointer grayscale hover:grayscale-0">--}}
{{--                        </div>--}}
{{--                    </swiper-slide>--}}
{{--                </swiper>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}
</x-Frontend::layout.default>


