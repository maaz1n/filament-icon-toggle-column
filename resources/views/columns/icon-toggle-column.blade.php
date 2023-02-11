<div
    x-data="{
        error: undefined,
        state: @js((bool) $getState()),
        isLoading: false
    }"
    x-init="$watch('state', () => $refs.button.dispatchEvent(new Event('change')))"
    {{ $attributes->merge($getExtraAttributes())->class([
        'filament-tables-icon-toggle-column px-4 py-1',
    ]) }}
>
    <button
        role="switch"
        aria-checked="false"
        x-bind:aria-checked="state.toString()"
        x-on:click="! isLoading && (state = ! state)"
        x-ref="button"
        x-on:change="
            isLoading = true
            response = await $wire.updateTableColumnState(@js($getName()), @js($recordKey), state)
            error = response?.error ?? undefined
            isLoading = false
        "
        x-tooltip="error"
        x-bind:class="{'opacity-70 pointer-events-none': isLoading}"
        {!! $isDisabled() ? 'disabled' : null !!}
        type="button"
        @class([
            'relative shrink-0 rounded-full cursor-pointer w-8 h-8 hover:bg-gray-500/5 focus:outline-none',
            'disabled:opacity-70 disabled:cursor-not-allowed disabled:pointer-events-none',
        ])
    >
        <span
            class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
            aria-hidden="true"
            x-bind:class="{
                'opacity-0 ease-out duration-100': state,
                'opacity-100 ease-in duration-200': ! state
            }"
        >
            <x-dynamic-component
                :component="$getOffIcon() ?? config('filament-icon-toggle-column.defaults.off-icon')"
                :class="\Illuminate\Support\Arr::toCssClasses([
                    'h-6 w-6',
                    match ($getOffColor() ?? config('filament-icon-toggle-column.defaults.off-color')) {
                        'danger' => 'text-danger-500',
                        'primary' => 'text-primary-500',
                        'success' => 'text-success-500',
                        'warning' => 'text-warning-500',
                        default => 'text-gray-400',
                    },
                ])"
            />
        </span>

        <span
            class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
            aria-hidden="true"
            x-bind:class="{
                'opacity-100 ease-in duration-200': state,
                'opacity-0 ease-out duration-100': ! state
            }"
        >
            <x-dynamic-component
                :component="$getOnIcon() ?? config('filament-icon-toggle-column.defaults.on-icon')"
                x-cloak
                :class="\Illuminate\Support\Arr::toCssClasses([
                    'h-6 w-6',
                    match ($getOnColor() ?? config('filament-icon-toggle-column.defaults.on-color')) {
                        'danger' => 'text-danger-500',
                        'secondary' => 'text-gray-400',
                        'success' => 'text-success-500',
                        'warning' => 'text-warning-500',
                        default => 'text-primary-500',
                    },
                ])"
            />
        </span>
    </button>
</div>
