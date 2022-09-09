@extends('web.includes.layout')
@section('title', 'HelaView - Hotels')

@section('content')

    <div class="innerpage-banner left bg-overlay-dark-7 py-7"
        style="background:url(/images/07.jpg) repeat; background-size:cover;">
        <div class="container">
            <div class="row all-text-white">
                <div class="col-md-12 align-self-center">
                    <h1 class="innerpage-title">{{ $profile->name }} </h1>
                </div>
            </div>
        </div>
    </div>



    <section class="pt80 pb80 listingDetails Campaigns">
        <div class="container">
            <div class="row">

                <!-- Tab line -->
                <div class="col-lg-8 col-md-12 col-sm-12 ">
                    <ul class="nav nav-tabs tab-line">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab-de-1"> Description
                            </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-2"> Availability </a>
                        </li>
                        {{-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-4"> Calendar </a> </li> --}}
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-5"> Gallery </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-6"> Reviews </a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-de-1">
                            <div class="text-block NopaddingDetails">

                                {{-- <h5 class="mb-4"> {{ $package->name }} </h5> --}}
                                <p class="text-muted font-weight-light">
                                    {{ $profile->description }}
                                </p>

                                {{-- @endforeach --}}
                            </div>
                            <div class="text-block">
                                <!-- Listing Location-->
                                <h5 class="mb-4">Location</h5>
                                <div class="map-wrapper-300 mb-3">
                                    <div class="map-container fw-map">
                                        <div id="map-main" style="overflow: hidden;">
                                            @foreach ($profile->packeges as $package)
                                                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6482631736635!2d79.84254911465017!3d6.932576394991148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259132e85493d%3A0x9d5e04ea64814a8!2sHilton%20Colombo!5e0!3m2!1sen!2ssg!4v1662024337864!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                                <iframe src="https://maps.google.com/maps?q={{$package->profile->lat}}+,+{{ $package->profile->lng }}&t=&z=15&ie=UTF8&iwloc=&output=embed"  width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-block">
                                <!-- Gallery-->
                                <h5 class="mb-4">Gallery</h5>
                                <div class="row gallery ml-n1 mr-n1">
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room1.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room2.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room3.jpg" alt="..." class="img-fluid"></a></div>
                                </div>
                            </div>
                            <div class="text-block">

                                {{-- <h5 class="mb-4">Amenities</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($profile->packeges as $package)
                                        <ul class="list-unstyled text-muted">
                                            @foreach($package->rooms->first()->facilities as $facility)
                                            <li class="mb-2" >
                                                <i class="fas fa-{{$facility->icon}} text-secondary w-1rem mr-3 text-center"></i>
                                                <span class="text-sm">{{$facility->name}}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                        @endforeach
                                    </div>
                                </div> --}}
                            </div>


                            <div class="text-block">
                                <p class="subtitle text-sm text-primary">Reviews </p>
                                <h5 class="mb-4">Listing Reviews </h5>
                                <div class="media d-block d-sm-flex review">
                                    <div class="text-md-center mr-4 mr-xl-5"><img src="/images/img-22.jpg"
                                            alt="Padmé Amidala" class="avatar avatar-xl p-2 mb-2"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 mb-1">Deho Smith</h6>
                                        <div class="mb-2"><i class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i> </div>
                                        <p class="text-muted text-sm">ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. </p>
                                    </div>
                                </div>
                                <div class="media d-block d-sm-flex review">
                                    <div class="text-md-center mr-4 mr-xl-5"><img src="/images/img-11.jpg" alt="Jabba Hut"
                                            class="avatar avatar-xl p-2 mb-2"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 mb-1">S. M Smithrs</h6>
                                        <div class="mb-2"><i class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i> </div>
                                        <p class="text-muted text-sm">ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. </p>
                                    </div>
                                </div>
                                <div class="rebiew_section">
                                    {{-- <div id="leaveReview" class="mt-4 collapse show" style="">
                                        <h5 class="mb-4">Leave a review</h5>
                                        <form id="contact-form" method="get" action="#" class="form" wtx-context="4F414E29-4D9C-4EAF-8AD4-1C88D3B088BA">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" placeholder="Enter your name" required="" class="form-control" wtx-context="6E9F56E3-6085-4BE7-8BC6-A26DE2A25857">
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="rating" id="rating" class="custom-select focus-shadow-0" wtx-context="169DBAA5-E301-459D-BC4B-2BBD5AB9369C">
                                                <option value="5">★★★★★ (5/5)</option>
                                                <option value="4">★★★★☆ (4/5)</option>
                                                <option value="3">★★★☆☆ (3/5)</option>
                                                <option value="2">★★☆☆☆ (2/5)</option>
                                                <option value="1">★☆☆☆☆ (1/5)</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Enter your  email" required="" class="form-control" wtx-context="C93E9383-08BC-4066-8DA5-E232B2F9264C">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="4" name="review" id="review" placeholder="Enter your review" required="" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Post review</button>
                                        </form>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane booking-search show" id="tab-de-2">

                            {{-- <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding8">
                                    <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                                        <input class="form-control" type="text"
                                            placeholder="City, Point of Interest or U.S. Zip Code"
                                            wtx-context="09157AF2-AD84-43CD-97A7-390B89D45286">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                                    <div class="form-group"> <span class="far fa-calendar-alt"></span>
                                        <input class="form-control hasDatepicker" type="text" id="datepicker"
                                            autocomplete="off" placeholder="Check-in"
                                            wtx-context="73EEFBF8-2A4F-48CD-81A5-51C69293B487">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                                    <div class="form-group"> <span class="far fa-calendar-alt"></span>
                                        <input class="form-control hasDatepicker" type="text" id="datepicker-out"
                                            autocomplete="off" placeholder="Check-out"
                                            wtx-context="F8EC44D2-EEB1-4913-8C85-7151BC03C0E3">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding8">
                                    <div class="form-group">
                                        <select class="custom-select select-big"
                                            wtx-context="69643E95-5EA4-4537-86A5-2849E608C366">
                                            <option selected="">Rooms</option>
                                            <option value="location1">01</option>
                                            <option value="location2">02</option>
                                            <option value="location3">03</option>
                                            <option value="location4">04</option>
                                            <option value="location5">05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding8">
                                    <div class="form-group">
                                        <select class="custom-select select-big"
                                            wtx-context="5AA4BCD4-9331-4594-9489-E1C013E7ACE1">
                                            <option selected="">Guests</option>
                                            <option value="location1">01</option>
                                            <option value="location2">02</option>
                                            <option value="location3">03</option>
                                            <option value="location4">04</option>
                                            <option value="location5">05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding8">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg btn-grad" type="submit">Search</button>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="mb-4">Available Packages</h5>
                                </div>
                                @foreach ($profile->packeges as $package)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="listing-item ">
                                            <article class="TravelGo-category-listing fl-wrap">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="TravelGo-category-img TravelGo-category-list-img"> <a
                                                                href="/package/{{ $package->id }}"><img
                                                                    src="/images/hotels/room4.jpg" alt=""></a>
                                                            <div class="TravelGo-category-opt">
                                                                <div class="listing-rating card-popup-rainingvis"
                                                                    data-starrating2="5"><i class="fa fa-star"></i><i
                                                                        class="fa fa-star"></i><i
                                                                        class="fa fa-star"></i><i
                                                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                </div>
                                                                <div class="rate-class-name">
                                                                    <div class="score"><strong>Very Good</strong>27
                                                                        Reviews </div>
                                                                    <span>5.0</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-12">
                                                        <div class="TravelGo-category-content fl-wrap title-sin_item">
                                                            <div class="TravelGo-category-content-title fl-wrap">
                                                                <div class="TravelGo-category-content-title-item">
                                                                    <h3 class="title-sin_map"><a href="/package/{{ $package->id }}">{{ $package->name }} by {{ $package->profile->name }} </a></h3>
                                                                    <div class="TravelGo-category-location fl-wrap">
                                                                        <span>LKR {{ number_format($package->total, 2) }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>{{Str::limit($package->description, 150, $end='...')}}</p>
                                                            <ul class="facilities-list fl-wrXap">
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
                                                                <div class="TravelGo-opt-list"> <a href="#"
                                                                        class="single-map-item"><i
                                                                            class="fas fa-map-marker-alt"></i><span
                                                                            class="TravelGo-opt-tooltip">On the
                                                                            map</span></a> <a href="#"
                                                                        class="TravelGo-js-favorite"><i
                                                                            class="fas fa-heart"></i><span
                                                                            class="TravelGo-opt-tooltip">Save</span></a> <a
                                                                        href="#" class="TravelGo-js-booking"><i
                                                                            class="fas fa-retweet"></i><span
                                                                            class="TravelGo-opt-tooltip">Find
                                                                            Directions</span></a> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="tab-pane" id="tab-de-4">
                            <div class="text-block NopaddingDetails">
                                <!-- Gallery-->
                                <h5 class="mb-4">Calender</h5>
                                <div id="calendar">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="lastmonth">30</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td class="hastask">4</td>
                                                <td>5</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td class="current">8</td>
                                                <td class="hastask">9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td class="hastask">12</td>
                                                <td>13</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td class="hastask">15</td>
                                                <td>16</td>
                                                <td>17</td>
                                                <td>18</td>
                                                <td>19</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td class="hastask">21</td>
                                                <td>22</td>
                                                <td>23</td>
                                                <td>24</td>
                                                <td>25</td>
                                                <td class="hastask">26</td>
                                                <td>27</td>
                                            </tr>
                                            <tr>
                                                <td>28</td>
                                                <td>29</td>
                                                <td class="hastask">30</td>
                                                <td>31</td>
                                                <td class="nextmonth">1</td>
                                                <td>2</td>
                                                <td>3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tab-pane" id="tab-de-5">
                            <div class="text-block NopaddingDetails">
                                <!-- Gallery-->
                                <h5 class="mb-4">Gallery</h5>
                                <div class="row gallery ml-n1 mr-n1">
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room1.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room7.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room2.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room3.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room4.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room5.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room6.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room7.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="col-lg-4 col-6 px-1 mb-2"><a href="#"><img
                                                src="/images/hotels/room8.jpg" alt="..." class="img-fluid"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-de-6">
                            <div class="text-block NopaddingDetails">
                                <h5 class="mb-4">Reviews</h5>
                                <div class="media d-block d-sm-flex review">
                                    <div class="text-md-center mr-4 mr-xl-5"><img src="/images/img-22.jpg"
                                            alt="Padmé Amidala" class="avatar avatar-xl p-2 mb-2"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 mb-1">Deho Smith</h6>
                                        <div class="mb-2"><i class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i> </div>
                                        <p class="text-muted text-sm">ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. </p>
                                    </div>
                                </div>
                                <div class="media d-block d-sm-flex review">
                                    <div class="text-md-center mr-4 mr-xl-5"><img src="/images/img-11.jpg" alt="Jabba Hut"
                                            class="avatar avatar-xl p-2 mb-2"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 mb-1">S. M Smithrs</h6>
                                        <div class="mb-2"><i class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i><i
                                                class="fa fa-xs fa-star text-primary"></i> </div>
                                        <p class="text-muted text-sm">ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 right_Details">
                    <div class="p-4 shadow ml-lg-4 rounded sticky-top" style="top: 100px;">
                        <div class="text-center">
                            <p> <a href="#" class="text-secondary text-sm"> <i class="fa fa-share"></i> Share this page</a></p>
                        </div>
                        <!-- ShareThis BEGIN -->
                        <div class="sharethis-inline-share-buttons mt-4"></div><!-- ShareThis END -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =======================
          newsletter -->
    <section class="bg-light pattern-overlay-1-dark">
        <div class="container">
            <div class="col-md-12 col-lg-9 mx-auto p-4 p-sm-5">

            </div>
        </div>
    </section>


@endsection
