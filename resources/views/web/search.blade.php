@extends('web.includes.layout')
@section('title', 'HelaView - Hotels')

@section('content')

    <!-- =======================
             Banner innerpage -->
    <div class="innerpage-banner left bg-overlay-dark-7 py-7"
        style="background:url(images/07.jpg) repeat; background-size:cover;">
        <div class="container">
            <div class="row all-text-white">
                <div class="col-md-12 align-self-center">
                    <h1 class="innerpage-title">Book your Hotel!</h1>
                    <h6 class="subtitle">Find the most suitable hotel based on your needs and services!</h6>
                </div>
            </div>
        </div>
    </div>

    <section class="pt80 pb80 cruise-grid-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 Filter-left">
                    <form action="/hotels" method="GET" autocomplete="off">
                        @if(isset(request()->page))
                            <input type="hidden" name="page" value="{{request()->page}}">
                        @endif
                        <div class="mb-left">
                            <label for="form_type" class="form-label">Hotel type</label>
                            <select class="custom-select select-big" name="hotel_type">
                                    <option value="0">All Types</option>
                                @foreach($hotel_types as $hotel_type)
                                    <option value="{{ $hotel_type->id }}" {{ isset(request()->hotel_type) ? (request()->hotel_type==$hotel_type->id ? 'selected':''):'' }}>{{$hotel_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-left">
                            <label class="form-label">Price range</label>
                            <div class="range-slider">
                                <input type="range" value="{{ isset(request()->max_price) ? request()->max_price:$max }}" min="{{$min}}" max="{{$max}}" name="max_price" range="true">
                                <span class="range-value">{{ isset(request()->max_price) ? request()->max_price:$max }}</span>
                            </div>
                        </div>
                        <div class="pb-left">
                            <div id="moreFilters" class="collapse show">
                                <div class="filter-block">
                                    <h6 class="mb-3">Location</h6>
                                    <div class="form-group">
                                        <label for="form_neighbourhood" class="form-label">Neighbourhood</label>
                                        <select class="custom-select select-big mb-3" name="location">
                                                <option value="0">All cities</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{ isset(request()->location) ? (request()->location==$city->id ? 'selected':''):'' }}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-block">
                                    <h6 class="mb-3">Rooms and beds</h6>
                                    <div class="form-group">
                                        <label class="form-label">Bedrooms</label>
                                        <div class="d-flex align-items-center"> <span
                                                class="input-number-decrement">–</span>
                                            <input class="input-number" id="inp_rooms" name="rooms" type="text" value="{{ isset(request()->rooms) ? request()->rooms:'1' }}" min="0"
                                                max="10">
                                            <span class="input-number-increment">+</span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Guests</label>
                                        <div class="d-flex align-items-center"> <span
                                                class="input-number-decrement">–</span>
                                            <input class="input-number" id="inp_beds" name="guests" type="text" value="{{ isset(request()->guests) ? request()->guests:'1' }}" min="0"
                                                max="10">
                                            <span class="input-number-increment">+</span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-label">Bathrooms</label>
                                        <div class="d-flex align-items-center"> <span
                                                class="input-number-decrement">–</span>
                                            <input class="input-number" id="inp_bath" name="bathrooms" type="text" value="{{ isset(request()->bathrooms) ? request()->bathrooms:'1' }}" min="0"
                                                max="10">
                                            <span class="input-number-increment">+</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-block">
                                    <h6 class="mb-3">Facilities</h6>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($facilities as $facility)
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="facilities_{{$facility->id}}" name="facilities[]"
                                                    class="custom-control-input" value="{{$facility->id}}" {{ isset(request()->facilities) ? in_array($facility->id, request()->facilities) ? 'checked':'':''}}>
                                                <label for="facilities_{{$facility->id}}" class="custom-control-label"><i class="fa fa-{{$facility->icon}}"></i> {{$facility->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-left">
                                <button type="submit" class="btn btn-primary btn-grad FilterBtn"> <i
                                        class="fas fa-filter mr-1"></i>Filter </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="listing-item ">
                                    <article class="TravelGo-category-listing fl-wrap">
                                        <div class="TravelGo-category-img"><a href="package/{{ $package->id }}"><img
                                                    src="images/hotels/room8.jpg" alt=""></a>

                                            <div class="TravelGo-category-opt">
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i></div>
                                                <div class="rate-class-name">
                                                    <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                    <span>5.0</span>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="TravelGo-category-content fl-wrap title-sin_item">
                                            <div class="TravelGo-category-content-title fl-wrap">
                                                <div class="TravelGo-category-content-title-item">
                                                    <h3 class="title-sin_map"><a href="package/{{ $package->id }}">{{ $package->name }} by {{ $package->profile->name }} </a></h3>

                                                    <div class="TravelGo-category-location fl-wrap">
                                                        <a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> {{ $package->profile->address }}</a><br>
                                                        <a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> NEIGHBOURHOOD : {{ $package->profile->city->name }}</a>
                                                        <span>{{env('DEFAULT_PRICE_TYPE_ID')." ".number_format($package->total, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>Type : {{ $package->profile->hotelType->name }} | Beds : {{$package->rooms->count()}} | Bathrooms : {{$package->bathrooms}} | Guests : {{$package->capacity}}</h6><br>
                                            <p>{{Str::limit($package->description, 150, $end='...')}}</p>
                                            <ul class="facilities-list fl-wrap">
                                                @foreach($package->rooms->first()->facilities as $facility)
                                                    <li><i class="fas fa-{{$facility->icon}}"></i><span>{{$facility->name}}</span></li>
                                                @endforeach
                                            </ul>
                                            <div class="TravelGo-category-footer fl-wrap">
                                                <a href="/package/{{ $package->id }}">
                                                    <div class="TravelGo-category-price btn-grad">
                                                        <span>View</span>
                                                    </div>
                                                </a>
                                                <div class="TravelGo-opt-list">
                                                    <a href="/package/{{ $package->id }}/#gLocation" class="single-map-item">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span class="TravelGo-opt-tooltip">On the map</span>
                                                    </a>
                                                    <a href="#" class="TravelGo-js-favorite">
                                                        <i class="fas fa-heart"></i>
                                                        <span class="TravelGo-opt-tooltip">Save</span>
                                                    </a>
                                                    <a href="https://www.google.com/maps/dir//{{ $package->profile->lat }}+,+{{ $package->profile->lng }}" class="TravelGo-js-booking">
                                                        <i class="fas fa-retweet"></i>
                                                        <span class="TravelGo-opt-tooltip">Find Directions</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $packages->links() }}
                </div>
            </div>
    </section>

    <!-- =======================
                      newsletter -->
    <section class="bg-light pattern-overlay-1-dark">
        <div class="container">
            <div class="col-md-12 col-lg-9 mx-auto p-4 p-sm-5">
                <div class="text-center px-0 px-sm-5">
                    <p class="mb-3 lead">21,215+ Hotel and Resorts Available!</p>
                    <form>
                        <div class="input-group px-0 px-md-5">
                            <input class="form-control border-radius-right-0 border-right-0 bg-transparent" type="text"
                                name="search" placeholder="Enter destination">
                            <button type="button" class="btn btn-grad mb-0 border-radius-left-0"> <span
                                    class=" d-md-block">Search now</span> <span class="d-md-none"><i
                                        class="fab fa-paper-plane-o m-0"></i></span> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
                      newsletter -->



@endsection
