<?php
$style = 'border bg-black text-white';
if (!empty($attributes['outlined'])) {
    $style = 'border border-[black] text-black';
}
if (!empty($attributes['link'])) {
    $style = ' text-black hover:opacity-[0.7] hover:underline';
    if (!empty($attributes['border'])) {
        $style .= ' border';
    }
}
?>
<button type="submit"
        class="flex items-center w-full justify-center uppercase pt-4 pb-3 px-[2rem] mt-5 text-2xl {{$style}} 2xl:text-3xl lg:mt-10 uppercase leading-none">
    {{$slot}}
</button>
