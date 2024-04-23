@if (SocialService::hasAnyProviderEnable())
    <div class="row">
        <div class="col-lg-12 mt-30">
            <div class="form-group mb-25">
                <p class="font-sm-bold text-center color-grey-500">{{ __('Or continue with') }}</p>
            </div>
        </div>
        @foreach (SocialService::getProviderKeys() as $item)
            @if (SocialService::getProviderEnabled($item))
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="form-group mb-25">
                        <a class="btn btn-border-80 btn-full" data-bs-original-title="{{ $item }}" href="{{ route('auth.social', isset($params) ? array_merge([$item], $params) : $item) }}">
                            <img class="d-inline-block align-middle mr-5" src="{{ Theme::asset()->url('imgs/page/register/'. $item .'.svg') }}" alt="{{ $item }}">{{ $item }}
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif
