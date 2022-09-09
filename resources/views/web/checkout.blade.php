@extends('web.includes.layout')

@section('title', 'Booking')

@section('content')

<section class="pt80 pb80 booking-section login-area">
    <div class="container">
      <div class="row"> 
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="listing-item ">
            <article class="TravelGo-category-listing fl-wrap">
              <div class="TravelGo-category-img"> <a href="#"><img src="images/hotels/room8.jpg" alt=""></a>
                <div class="TravelGo-category-opt">
                  <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                  <div class="rate-class-name">
                    <div class="score"><strong>Very Good</strong>27 Reviews </div>
                    <span>5.0</span> </div>
                </div>
              </div>
              <div class="TravelGo-category-content fl-wrap title-sin_item">
                <div class="TravelGo-category-content-title fl-wrap">
                  <div class="TravelGo-category-content-title-item">
                    <h3 class="title-sin_map">{{ $package->name }} by {{ $package->profile->name }} </h3>
                    <div class="TravelGo-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>  {{ $package->profile->address }} </div>
                  </div>
                </div>
                <p>{{Str::limit($package->description, 130, $end='...')}}</p>

                <div class="TravelGo-category-footer fl-wrap">
                    <a href="/package/{{ $package->id }}">
                        <div class="TravelGo-category-price btn-grad"><span>Edit</span></div>
                    </a>
                </div>
                <div class="TravelGo-category-content-title-item others-details">
                  <h3 class="title-sin_map"><a href="hotel-detailed.html">Others Details</a></h3>
                </div>
                @php
                    $total = 0;
                    $totalGuest = 0;
                @endphp
                @if ($room)
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td class="bookex">{{$room->name}}</td>
                            <td style="text-align: right">{{env('DEFAULT_PRICE_TYPE_ID').' '. number_format($room->price,2)}}</td>
                            @php
                                $total += $room->price;
                            @endphp
                        </tr>
                        <tr>
                            <td class="bookex" style="font-size: 11px">Bathrooms</td>
                            <td style="text-align: right; font-size: 11px">{{$room->bathrooms_qty}} bathroom(s)</td>
                        </tr>
                        <tr>
                            <td class="bookex" style="font-size: 11px">Beds</td>
                            <td style="text-align: right; font-size: 11px">{{$room->beds->count()}} bed(s) for {{ $room->beds->sum('pivot.capacity') }}</td>
                            @php
                                $totalGuest += $room->beds->sum('pivot.capacity');
                            @endphp
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 11px">
                                @foreach($room->facilities as $facility)
                                    <i class="fa fa-{{$facility->icon}}" aria-hidden="true"></i> {{$facility->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <br>
                @else
                    @foreach($package->rooms as $singleRoom)
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="bookex">{{$singleRoom->name}}</td>
                                    <td style="text-align: right">{{env('DEFAULT_PRICE_TYPE_ID').' '. number_format($singleRoom->price,2)}}</td>
                                    @php
                                        $total += $singleRoom->price;
                                        $totalGuest += $singleRoom->beds->sum('pivot.capacity');
                                    @endphp
                                </tr>
                                <tr>
                                    <td class="bookex" style="font-size: 11px">Bathrooms</td>
                                    <td style="text-align: right; font-size: 11px">{{$singleRoom->bathrooms_qty}} bathroom(s)</td>
                                </tr>
                                <tr>
                                    <td class="bookex" style="font-size: 11px">Beds</td>
                                    <td style="text-align: right; font-size: 11px">{{$singleRoom->beds->count()}} bed(s) for {{ $singleRoom->beds->sum('pivot.capacity') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 11px">
                                        @foreach($singleRoom->facilities as $facility)
                                            <i class="fa fa-{{$facility->icon}}" aria-hidden="true"></i> {{$facility->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    @endforeach
                @endif
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td class="bookex"><strong>Total Guests : </strong></td>
                            <td style="text-align: right"><strong>{{ $totalGuest }}</strong></td>
                        </tr>
                        <tr>
                            <td class="bookex"><strong>From : </strong></td>
                            <td style="text-align: right"><strong>{{Session::get('currentBooking')['startDate']}}</strong></td>
                            {{-- <input type="hidden" name="packageID" value="{{ Request::segment(2) }}"> --}}
                        </tr>
                        <tr>
                            <td class="bookex"><strong>To : </strong></td>
                            <td style="text-align: right"><strong>{{Session::get('currentBooking')['endDate']}}</strong></td>
                            {{-- <input type="hidden" name="packageID" value="{{ Request::segment(2) }}"> --}}
                        </tr>
                        <tr>
                            <td class="bookex"><strong>Package Price : </strong></td>
                            <td style="text-align: right"><strong>{{env('DEFAULT_PRICE_TYPE_ID').' '. number_format($total,2)}}</strong></td>
                        </tr>
                        <tr>
                            <td class="bookex"><strong>Number of days : </strong></td>
                            <td style="text-align: right"><strong>{{Session::get('currentBooking')['pkg_qty']}}</strong></td>
                            {{-- <input type="hidden" name="packageID" value="{{ Request::segment(2) }}"> --}}
                        </tr>
                        <tr>
                            <td class="bookex"><strong>Total Price : </strong></td>
                            <td style="text-align: right"><strong>{{env('DEFAULT_PRICE_TYPE_ID').' '. number_format($total*Session::get('currentBooking')['pkg_qty'],2)}}</strong><br><span style="font-size: 11px; color:darkgrey;" >({{ $total  }} x {{ Session::get('currentBooking')['pkg_qty'] }})</span></td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </article>
          </div>
          <div class="row">
            <article class="TravelGo-category-listing fl-wrap">
              <div class="TravelGo-category-content fl-wrap title-sin_item">
                <div class="TravelGo-category-content-title fl-wrap NeedHelp">
                  <div class="TravelGo-category-content-title-item">
                    <h3 class="title-sin_map"><a href="hotel-detailed.html">Need Help?</a></h3>
                    <div class="TravelGo-category-location fl-wrap"></div>
                  </div>
                </div>
                <div class="NeedhelpSection">
                  <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                  <ul>
                    <li><span><i class="fas fa-phone-volume"></i></span> (+94) 779 779 574</li>
                    <li><span><i class="far fa-envelope"></i></span> contact@manakal.com</li>
                    {{-- <li><span><i class="fab fa-skype"></i> </span> TravelG@Skype</li> --}}
                  </ul>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="login-box Booking-box" style="max-width: 100%;">
                    <div class="login-top">
                      <h3>Your Personal Information</h3>
                    </div>
                    <form class="login-form"  data-cc-on-file="false" data-stripe-publishable-key="{{env('STRIPE_KEY')}}" action="/confirm-booking" method="POST">
                        @csrf
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                          <label>First Name</label>
                          <input type="text" name="first_name" placeholder="First Name" value="{{ Auth::user('web')->first_name }}">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                          <label>Last Name</label>
                          <input type="text" name="last_name" placeholder="Last Name" value="{{ Auth::user('web')->last_name }}">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                          <label>Email</label>
                          <input type="text" name="email" placeholder="Enter your email here" value="{{ Auth::user('web')->email }}">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 password">
                          <label>Phone Number</label>
                          <input type="text" name="contacts" placeholder="Enter Phone Number" value="{{ Auth::user('web')->contacts ?  Auth::user('web')->contacts[0] : '' }}">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 password">
                          <label>Country</label>
                          <input type="text" name="country" placeholder="Enter Country" value="{{ Auth::user('web')->country }}">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 password">
                          <label>State</label>
                          <input type="text" name="state" placeholder="Enter State" value="{{ Auth::user('web')->state }}">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3 email">
                            <label> <i class="fas fa-home"></i>Address</label>
                            <input type="text" name="address" placeholder="Address" value="{{ Auth::user('web')->address }}">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                          <label>Zip Code</label>
                          <input type="text" name="zip" placeholder="Zip Code" value="{{ Auth::user('web')->zip }}">
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                          <div class="chqbox">
                            <input type="checkbox" name="rememberme" id="rmme">
                            <label for="rmme"> I want to receive TravelGo promotional offers in the future</label>
                          </div>
                        </div>
                        <div class="login-top cardInfo">
                          <h3>Your Card Information</h3>
                          {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-lg-6 form-group">
                                <label>Name on Card</label>
                                <input class="form-control" size="4" type="text" value="cyasitha">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Number of Card</label>
                                <input autocomplete="off" class="form-control" size="20" type="text" name="card_no" value="4242424242424242">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label>CVC</label>
                                <input autocomplete="off" class="form-control" placeholder="ex. 311" size="3" type="text" value="123" name="cvv">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Expiration month</label>
                                <input class="form-control" placeholder="MM" size="2" type="text" name="expiry_month" value="05">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Expiration year</label>
                                <input class="form-control" placeholder="YYYY" size="4" type="text" name="expiry_year" value="2026">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                          <button class="Confirm" type="submit" name="button">Confirm Payment</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </section>

@endsection
