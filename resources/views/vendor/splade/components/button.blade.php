@php $customStyling = $hasCustomStyling($attributes) @endphp

<SpladeButton {{ $attributes->only(['v-bind:spinner', ':spinner']) }}>
    <template #default="button">
        <{{ $type === 'link' ? 'Link' : 'button' }} :disabled="button.spinner" {{ $attributes->class([
            'p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10',
            'p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10' => !$customStyling && $primary,
            'p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10' => !$customStyling && $danger,
            'p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10' => !$customStyling && $secondary,
        ])
            ->except(['v-bind:spinner', ':spinner'])
            ->merge(['type' => $type])
            ->when($name, fn($attr) => $attr->merge(['name' => $name, 'value' => $value])) }}
        >
            @if(trim($slot))
                {{ $slot }}
            @else
                <div class="flex flex-row items-center justify-center">
                    <svg
                        v-if="button.spinner"
                        class="animate-spin mr-3 h-5 w-5 @if($secondary) text-gray-700 @else text-white @endif" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    >
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                    </svg>

                    <span :class="{ 'opacity-50': button.spinner }">
                        {{ $label }}
                    </span>
                </div>
            @endif
        </{{ $type === 'link' ? 'Link' : 'button' }}>
    </template>
</SpladeButton>
