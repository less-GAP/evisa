<span class="block mb-1 text-gray-700 font-sans">
    <b>
    {!! $label !!}
    </b>
    @if($attributes->has('required') || $attributes->has('data-required'))
        <span aria-hidden="true" class="text-red-600" title="{{ __('This field is required') }}">*</span>
    @endif
</span>
