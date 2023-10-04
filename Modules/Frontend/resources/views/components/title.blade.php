<div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">
    <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">
        <div class="bg-white h-1/3"></div>
        <div class="h-1/3"
             style="background: linear-gradient(to right, rgb(233, 68, 220) 0%, rgb(35, 171, 169) 25%, rgb(230, 214, 36) 50%, rgb(35, 171, 169) 75%, rgb(233, 68, 220) 100%) center center / 200%;"></div>
        <div class="bg-white h-1/3"></div>
    </div>
    <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">
        <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">
            <div class="hidden h-1/3"></div>
            <div class="absolute bg-white h-1/3 mid-skew"></div>
            <div class="hidden h-1/3"></div>
            <div><h2
                    class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">
                    {{$slot}}
                </h2></div>
        </div>
    </div>
</div>
