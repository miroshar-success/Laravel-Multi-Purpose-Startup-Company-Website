@php
    $supportedLocales = Language::getSupportedLocales();

    if (empty($options)) {
        $options = [
            'before' => '',
            'lang_flag' => true,
            'lang_name' => true,
            'class' => '',
            'after' => '',
        ];
    }
@endphp

@if ($supportedLocales && count($supportedLocales) > 1)
    @php
        $languageDisplay = setting('language_display', 'all');
        $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
    @endphp
    @if (setting('language_switcher_display', 'dropdown') == 'dropdown')
        <div class="d-none d-lg-block box-dropdown-cart me-2">
            <span class="font-lg icon-list icon-account">
                @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                    {!! language_flag(Language::getCurrentLocaleFlag()) !!}
                    <span class="color-grey-900 arrow-down ms-1">{{ Language::getCurrentLocaleName() }}</span>
                @endif
                @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'name'))
                    &nbsp;<span class="color-grey-900 arrow-down">{{ Language::getCurrentLocaleName() }}</span>
                @endif
            </span>
            <div class="dropdown-account">
                <ul class="p-0">
                    @foreach ($supportedLocales as $localeCode => $properties)
                        @if ($localeCode != Language::getCurrentLocale())
                            <li>
                                <a class="font-md d-flex align-items-center" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                                    @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                        {!! language_flag($properties['lang_flag']) !!} <span>{{ $properties['lang_name'] }}</span>
                                    @endif
                                    @if (Arr::get($options, 'lang_name', true) &&  ($languageDisplay == 'name'))
                                        &nbsp;{{ $properties['lang_name'] }}
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <ul @class(['d-none d-xl-flex gap-3 box-dropdown-cart me-2', Arr::get($options, 'class')])>
            @foreach ($supportedLocales as $localeCode => $properties)
                @if ($localeCode !== Language::getCurrentLocale())
                    <li>
                        <a href="{{ Language::getSwitcherUrl($localeCode, $properties['lang_code']) }}">
                            @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                {!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}
                            @endif
                            @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))
                                &nbsp;<span>{{ $properties['lang_name'] }}</span>
                            @endif
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
    <ul class="d-flex d-xl-none nav nav-tabs nav-tabs-mobile mt-25" role="tablist">
        <li>
            <a class="active" href="#tab-menu" data-bs-toggle="tab" role="tab" aria-controls="tab-menu" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
                {{ __('Languages') }}
            </a>
        </li>
    </ul>
    <div class="d-flex d-xl-none tab-content">
        <div class="tab-pane fade active show" id="tab-menu" role="tabpanel" aria-labelledby="tab-menu">
            <nav class="mt-15">
                <ul class="mobile-menu font-heading">
                    @foreach ($supportedLocales as $localeCode => $properties)
                        @if ($localeCode !== Language::getCurrentLocale())
                            <li>
                                <a href="{{ Language::getSwitcherUrl($localeCode, $properties['lang_code']) }}">
                                    @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                        {!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}
                                    @endif
                                    @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))
                                        &nbsp;<span>{{ $properties['lang_name'] }}</span>
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
@endif
