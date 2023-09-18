<?php
$default = [
    'number_of_visa'=>request()->input('applicant',1),
    'type_of_visa'=>request()->input('visatype',"1"),
    'processing_time'=>request()->input('processing'],"2")
]
?>
<x-front::layout.default>

<section class="py-10 md:pt-14 xl:pt-16 md:pb-20 xl:pb-32">
    <VisaApplicationForm :value="{{json_encode($default)}}"></VisaApplicationForm>
</section>
</x-front::layout.default>
