@php
    $backgroundColors = ['bg-4', 'bg-5', 'bg-7']
@endphp

<section class="section mt-50">
    <div class="container">
        <div class="row align-items-center">
            @foreach($tabs as $tab)
                <div class="col-lg-4 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $loop->index * 2 }}s">
                    <div class="card-guide {{ $backgroundColors[rand(0, count($backgroundColors) - 1)] }}">
                        @if ($tab['image'])
                            <div class="card-image">
                                {{ RvMedia::image($tab['image'], $tab['title']) }}
                            </div>
                        @endif
                        <div class="card-info">
                            <h5 class="color-brand-1 mb-15">{{ $tab['title'] }}</h5>
                            <p class="font-md color-grey-500">{{ $tab['description'] }}</p>

                            @if ($tab['action'] && $tab['label'])
                                <div class="mt-10">
                                    <a href="{{ $tab['action'] }}" class="btn btn-default font-sm-bold pl-0">{{ $tab['label'] }}
                                        <svg class="w-6 h-6 icon-16 ms-1" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
