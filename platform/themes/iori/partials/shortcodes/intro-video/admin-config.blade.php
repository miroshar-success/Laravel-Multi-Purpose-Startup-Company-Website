<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <textarea name="subtitle" class="form-control" >{{ Arr::get($attributes, 'subtitle') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Image') }}</label>
    {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Tag') }}</label>
    <input name="tag" value="{{ Arr::get($attributes, 'tag') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Youtube video URL') }}</label>
    <input name="youtube_video_url" value="{{ Arr::get($attributes, 'youtube_video_url') }}" class="form-control" />
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Icon image') }}</label>
    {!! Form::mediaImage('icon_image', Arr::get($attributes, 'icon_image')) !!}
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Style') }}</label>
    {!! Form::customSelect('style', [
            'style-1'  => __('Style :number', ['number' => 1]),
            'style-2'  => __('Style :number', ['number' => 2]),
        ], Arr::get($attributes, 'style')) !!}
</div>
