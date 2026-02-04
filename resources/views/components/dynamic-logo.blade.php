@if($siteSetting && $siteSetting->logo)
    <img src="{{ asset('storage/' . $siteSetting->logo) }}"
         alt="{{ $siteSetting->site_name ?? config('app.name', 'Logo') }}"
         {{ $attributes->merge(['class' => '']) }} />
@else
    <x-application-logo {{ $attributes }} />
@endif
