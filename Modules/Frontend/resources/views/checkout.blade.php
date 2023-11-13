<x-front::layout.default>

    <section class="py-10 md:pt-14 xl:pt-16 md:pb-20 xl:pb-32">
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
                            e-Visa Apply Online</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 mt-20 !mt-10 mb-5 !mb-10 text-center">
            <div class="">
                <a-steps class="w-full lg:w-[700px] m-auto "
                         :current="{{$visaApplication->payment_status == 'success'?3:2}}" status="success" :items="[
                {
                    title: 'Visa Options'
                },
                {
                    title: 'Applicant Detail',
                },
                {
                    title: 'Review & Payment',
                },
            ]"></a-steps>
                <div class="container mx-auto px-4 mt-10 mb-5 lg:mb-10 text-left">
                    <h2 class="m-5">Vietnam E-visa Applicant Detail</h2>
                    <a-row :gutter="20">
                        <a-col :lg="16" :md="24">
                            @foreach($visaApplication->applicants as $index=>$applicant)
                                <a-card title="Applicant {{$index+1}}">
                                    <a-descriptions :label-style="{width:'200px'}" :column="1"
                                    >
                                        <a-descriptions-item label="Full name as in passport">
                                            <b>{{$applicant->full_name}}</b>
                                        </a-descriptions-item>
                                        <a-descriptions-item label="Nationality">
                                            <b>{{countryName($applicant->nationality)}}</b>
                                        </a-descriptions-item>
                                        <a-descriptions-item label="Passport number">
                                            <b>{{$applicant->passport_number}}</b>
                                        </a-descriptions-item>
                                        <a-descriptions-item label="Email">
                                            <b>{{$applicant->email}}</b>
                                        </a-descriptions-item>

                                    </a-descriptions>
                                </a-card>
                            @endforeach
                            <a-card class="!mt-3" title="Travel Information">
                                <a-descriptions :label-style="{width:'200px'}" :column="1"
                                >
                                    <a-descriptions-item label="Date of arrival">
                                        <b>{{$visaApplication->date_arrival->format('d/m/Y')}}</b>
                                    </a-descriptions-item>
                                    <a-descriptions-item label="Port of entry">
                                        <b>{{$visaApplication->entry_port}}</b>
                                    </a-descriptions-item>

                                </a-descriptions>
                            </a-card>
                            <a-card class="!mt-3" title="Contact Information">
                                <a-descriptions :label-style="{width:'200px'}" :column="1"
                                >
                                    <a-descriptions-item label="Customer Name">
                                        <b>{{$visaApplication->contact_name}}</b>
                                    </a-descriptions-item>
                                    <a-descriptions-item label="Contact Email">
                                        <b>{{$visaApplication->contact_email}}</b>
                                    </a-descriptions-item>
                                    <a-descriptions-item label="Phone Number">
                                        <b>{{$visaApplication->contact_phone}}</b>
                                    </a-descriptions-item>

                                </a-descriptions>
                            </a-card>
                        </a-col>
                        <a-col :lg="8" :md="24">
                            <a-card title="Summary">
                                <a-descriptions :label-style="{width:'200px'}" :column="1"
                                >
                                    <a-descriptions-item label="Number of Visa">
                                        <b>{{$visaApplication->applicants->count()}}</b>
                                    </a-descriptions-item>
                                    <a-descriptions-item label="Type of visa">
                                        <b>{{typeOfVisaName($visaApplication->type_of_visa)}}</b>
                                    </a-descriptions-item>
                                    <a-descriptions-item label="Processing Time">
                                        <b>{{processingTypeName($visaApplication->processing_time)}}</b>
                                    </a-descriptions-item>
                                    <a-descriptions-item label="TOTAL SERVICE FEE">
                                        <b class="text-2xl">
                                            ${{$visaApplication->total_amount}}.00
                                        </b>
                                    </a-descriptions-item>
                                </a-descriptions>
                                @if($visaApplication->fresh()->payment_status !=='PAID')
                                    <a-divider/>
                                    <div
                                        class="w-[400px] m-auto css-dev-only-do-not-override-eq3tly ant-result-success">
                                        <div id="payment-form">
                                            <a href="/process-payment" id="card-button"
                                               class="!mt-1 m-auto flex disabled:bg-gray-500 items-center justify-center uppercase p-4 mt-5 text-white bg-black 2xl:text-3xl lg:mt-10"
                                               type="button">
                                                <svg

                                                    class="animate-spin hidden mr-3 h-5 w-5  text-white"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                >
                                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor"
                                                            stroke-width="4"/>
                                                    <path class="opacity-75" fill="currentColor"
                                                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                                                </svg>
                                                Check out
                                            </a>
                                            @if(settings('paypal_payment_enable') == 'active')
                                                <a href="/process-payment-paypal" id="card-button"
                                                   class=" flex disabled:bg-gray-500 items-center justify-center uppercase mt-5    2xl:text-2xl "
                                                   type="primary" ghost>
                                                    <svg style="width: 30px;margin-right: 15px" aria-hidden="true"
                                                         focusable="false"
                                                         data-prefix="fab" data-icon="paypal" role="img"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                        <path fill="currentColor"
                                                              d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4 .7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9 .7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z"></path>
                                                    </svg>
                                                    Check out with Paypal
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </a-card>

                        </a-col>
                    </a-row>


                </div>

            </div>
        </div>
    </section>

</x-front::layout.default>
