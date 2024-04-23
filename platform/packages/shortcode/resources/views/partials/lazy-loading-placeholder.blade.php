@once
    <style>
        .shortcode-lazy-loading {
            position: relative;
            min-height: 12rem;
        }

        .loading-spinner {
            align-items: center;
            background: hsla(0, 0%, 100%, 0.5);
            display: flex;
            height: 100%;
            inset-inline-start: 0;
            justify-content: center;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 1;

            &:after {
                animation: loading-spinner-rotation 0.5s linear infinite;
                border-color: var(--primary-color) transparent var(--primary-color) transparent;
                border-radius: 50%;
                border-style: solid;
                border-width: 1px;
                content: ' ';
                display: block;
                height: 40px;
                position: absolute;
                top: calc(50% - 20px);
                width: 40px;
                z-index: 1;
            }
        }

        @keyframes loading-spinner-rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            $('.shortcode-lazy-loading').each(function(index, element) {
                var $element = $(element);
                var name = $element.data('name');
                var attributes = $element.data('attributes');

                $.ajax({
                    url: '{{ route('public.ajax.render-ui-block') }}',
                    type: 'POST',
                    data: {
                        name,
                        attributes: {
                            ...attributes,
                        },
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function({
                        error,
                        data
                    }) {
                        if (error) {
                            return;
                        }

                        if (data) {
                            $element.replaceWith(data);
                        }

                        if (typeof Theme.lazyLoadInstance !== 'undefined') {
                            Theme.lazyLoadInstance.update()
                        }

                        document.dispatchEvent(new CustomEvent('shortcode.loaded', {
                            detail: {
                                name,
                                attributes,
                                html: data,
                            }
                        }));
                    },
                });
            });
        });
    </script>
@endonce

<div class="shortcode-lazy-loading" data-name="{{ $name }}" data-attributes="{{ json_encode($attributes) }}">
    <div class="loading-spinner"></div>
</div>
