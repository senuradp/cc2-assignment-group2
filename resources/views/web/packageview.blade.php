@extends('web.includes.layout')
@section('title', 'HelaView - Hotels')

@section('content')

    <div class="innerpage-banner left bg-overlay-dark-7 py-7"
        style="background:url(/images/07.jpg) repeat; background-size:cover;">
        <div class="container">
            <div class="row all-text-white">
                <div class="col-md-12 align-self-center">
                    <h1 class="innerpage-title">{{ $package->name }} by <a href="/hotel/{{ $package->id }}"> {{ $package->profile->name }} </a></h1>
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
                            </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-4"> Calendar </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-5"> Gallery </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-6"> Reviews </a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-de-1">
                            <div class="text-block NopaddingDetails">
                                <h5 class="mb-4"> Description </h5>
                                <p class="text-muted font-weight-light">
                                    {{ $package->description }}
                                </p>
                                {{-- <a href="hotel/{{ $package->id }}">
                                    <span><strong><u>Click to view more packages from this hotel !</u></strong></span>
                                </a> --}}
                                <div class="col-md-12 d-lg-flex align-items-center justify-content-end">
                                    {{-- <strong> --}}
                                        <a href="/hotel/{{ $package->profile->id }}" class="blist text-sm ml-2">
                                            See more packages from this hotel
                                            <i class="fas fa-angle-double-right ml-2"></i>
                                        </a>
                                    {{-- </strong> --}}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="column">
                                    <br>
                                    @php
                                        $roomcount=0;
                                        $person_array = array();
                                        $total_persons=0;
                                    @endphp
                                    @foreach($package->rooms as $room)
                                        @php
                                            $person_array[$roomcount]=array("Name" => $room->name, "Capacity" => 0, "Id"=>$room->id);
                                        @endphp
                                        <span><strong>{{$room->name}}</strong></span>
                                            <p>
                                                Bathrooms : {{$room->bathrooms_qty}} <br> Price : LKR {{ number_format($room->price,2) }}
                                            </p>
                                            <p>
                                                @foreach($room->facilities as $facility)
                                                    <i class="fa fa-{{$facility->icon}}" aria-hidden="true"></i> {{$facility->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                                @endforeach
                                            </p>
                                            <p>
                                                Beds :
                                                @foreach($room->beds as $bed)
                                                    {{$bed->name}} for {{$bed->pivot->capacity}} person |
                                                    @php
                                                        $person_array[$roomcount]["Capacity"]+=$bed->pivot->capacity;
                                                        $total_persons+=$bed->pivot->capacity;
                                                    @endphp
                                                @endforeach
                                                <hr class="hr" />
                                            </p>
                                        @php
                                            $roomcount++;
                                        @endphp
                                    @endforeach
                                </div>

                            </div>

                            <div class="text-block">
                                <!-- Listing Location-->
                                <h5 class="mb-4" id="gLocation">Location</h5>
                                <div class="map-wrapper-300 mb-3">
                                    <div class="map-container fw-map">
                                        <div id="map-main" style="overflow: hidden;">
                                                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6482631736635!2d79.84254911465017!3d6.932576394991148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259132e85493d%3A0x9d5e04ea64814a8!2sHilton%20Colombo!5e0!3m2!1sen!2ssg!4v1662024337864!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                                <iframe src="https://maps.google.com/maps?q={{$package->profile->lat}}+,+{{ $package->profile->lng }}&t=&z=15&ie=UTF8&iwloc=&output=embed"  width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

                                <h5 class="mb-4">Amenities</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled text-muted">
                                            {{-- <li class="mb-2"><i
                                                class="fa fa-wifi text-secondary w-1rem mr-3 text-center"></i> <span
                                                class="text-sm">Wifi</span></li> --}}
                                            @foreach($package->rooms->first()->facilities as $facility)
                                                <li class="mb-2" >
                                                    <i class="fas fa-{{$facility->icon}} text-secondary w-1rem mr-3 text-center"></i>
                                                    <span class="text-sm">{{$facility->name}}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <ul class="list-unstyled text-muted">
                                            <li class="mb-2"><i
                                                    class="fa fa-bath text-secondary w-1rem mr-3 text-center"></i><span
                                                    class="text-sm">Toiletteries</span></li>
                                        </ul>
                                    </div> --}}
                                </div>
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
                        <div class="tab-pane" id="tab-de-4">
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
                        </div>
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
                        <p class="text-muted"><span class="text-primary h2">LKR {{ number_format($package->total,2) }}</span> per night</p>
                        <hr class="my-4">
                        <form id="booking-form" method="post" action="/checkout" autocomplete="off" class="form" >
                            @csrf
                            <div clsass="form-group mb-4">
                                <label for="room" class="form-label">Guests *</label>
                                <select name="room" id="room" class="form-control">
                                    <option value="">Select number of guests</option>
                                    @foreach ($person_array as $person)
                                        <option value="{{ $person["Id"] }}">{{"Max " .$person["Capacity"]." person for ".$person["Name"] }}</option>
                                    @endforeach
                                    <option value="0">{{ 'Max '.$total_persons.' person for ' }} all rooms</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookingDate" class="form-label">Your stay *</label>
                                <div class="datepicker-container datepicker-container-right">
                                    <input type="text" name="bookingDate" id="bookingDate"
                                        placeholder="Choose your dates" required="" class="form-control">
                                </div>
                                <input type="hidden" name="startDate" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="endDate" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="packageID" value="{{ Request::segment(2) }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                            </div>
                        </form>
                        <hr class="my-4">
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


@section('scripts')
    <script>
    var disabledDate = ['2022-09-06', '2022-09-08'];

       $('#bookingDate').daterangepicker({
            opens: 'left',
            minDate: moment().startOf('day'),
            isInvalidDate: function(ele) {
                var currDate = moment(ele._d).format('YYYY-MM-DD');
                return ["2022-09-09"].indexOf(currDate) != -1 || ["2022-09-11"].indexOf(currDate) != -1;
            },
            locale: {
                format: 'YYYY-MM-DD'
            }

        }, function (start, end, label) {
            $('input[name="startDate"]').val(start.format('YYYY-MM-DD'));
            $('input[name="endDate"]').val(end.format('YYYY-MM-DD'));
            // swal("A new date selection was made", start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'), "success")

        });
    </script>

@endsection
