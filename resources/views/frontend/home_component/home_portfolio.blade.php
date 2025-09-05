 @php

     $portfolios = App\Models\Portfolio::all();
    $portfolio_string = App\Models\Portfolio::select('portfolios.portfolio_string')->groupBy('portfolios.portfolio_string')->get();


@endphp
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                    @foreach ($portfolio_string as $portfolio_strings)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="{{ str_replace(' ', '', $portfolio_strings['portfolio_string']) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ str_replace(' ', '', $portfolio_strings['portfolio_string']) }}" type="button"
                            role="tab" aria-controls="{{ str_replace(' ', '', $portfolio_strings['portfolio_string']) }}" aria-selected="false">{{ $portfolio_strings['portfolio_string']}}</button>
                    </li>
                   @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @foreach ($portfolios as $portfolio)
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{ asset($portfolio['portfolio_image'])}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{ $portfolio['portfolio_string'] }}</span>
                                    <h4 class="title"><a href="{{ route('portfolio.details',$portfolio['id'] )}}">{{ $portfolio['portfolio_name'] }}</a></h4>
                                    <a href="{{ route('portfolio.details',$portfolio['id'] )}}" class="link">Case Study</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($portfolio_string as $portfolio_strings)
        <div class="tab-pane" id="{{ str_replace(' ', '', $portfolio_strings['portfolio_string']) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ', '', $portfolio_strings['portfolio_string']) }}-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
 @php


    $portfolio_detail = App\Models\Portfolio::select('portfolios.*')->where('portfolios.portfolio_string',$portfolio_strings['portfolio_string'])->get();


@endphp
 @foreach ($portfolio_detail as $portfolio_details)

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{ asset($portfolio_details['portfolio_image'])}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{ $portfolio_details['portfolio_string'] }}</span>
                                    <h4 class="title"><a href="{{ route('portfolio.details',$portfolio_details['id'] )}}">{{ $portfolio_details['portfolio_name'] }}</a></h4>
                                    <a href="{{ route('portfolio.details',$portfolio_details['id'] )}}" class="link">Case Study</a>
                                </div>
                            </div>
 @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endforeach
    </div>
</section>
