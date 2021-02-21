<section class="portfolio-section" id="about">
    @include('components.section-title', [ 'title' => 'Portfolio' ])
            <div class="wrapper">
                <div class="carousel">
                    @foreach ($portfolios as $p)
                        <div class="carousel__item">
                            <div class="carousel__item-head">
                                <img src="{{ $p['img'] }}" style="width: 100%;">
                            </div>
                            <div class="carousel__item-body">
                                <div class="title">{{ $p['name'] }}</div>
                                <div class="stacks">{{ $p['stacks'] }}</div>
                                <div class="description" style="display: none">{!! $p['description'] !!}</div>
                                <div class="url" style="display: none">{{ $p['url'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="modal" id="modal">
                <a href="#!" class="overlay"></a>
                <div class="modal-wrapper">
                    <div class="modal-contents">
                        <a href="#!" class="modal-close">✕</a>
                        <div class="modal-content">
                            <img class="img">
                            <div class="title"></div>
                            <div class="stacks"></div>
                            <a class="url" target="_blank">Show Page</a>
                            <p class="description"></p>
                        </div>
                    </div>
                </div>
            </div>
</section>
