@extends('web.includes.layout');

@section('title', 'HelaView - Thank You')

@section('content')

    <section class="pt80 pb80 booking-section login-area thanksYou">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="login-box Booking-box" style="min-width: 100%;">
                                <div class="login-top">
                                    <h3>Thank You.</h3>
                                    <p>Your Booking Order is placed.</p>
                                </div>


                                <div class="login-top cardInfo">
                                    <h3>Booking Information</h3>
                                </div>


                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="bookex">Booking number</td>
                                            <td>{{ $booking->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bookex">First Name</td>
                                            <td>{{ $booking->tourist->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bookex">Last Name</td>
                                            <td>{{ $booking->tourist->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bookex">E-mail address</td>
                                            <td>{{ $booking->tourist->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bookex">Address</td>
                                            <td>{{ $booking->tourist->address }}</td>
                                        </tr>

                                        <tr>
                                            <td class="bookex">ZIP code</td>
                                            <td>{{ $booking->tourist->zip }}</td>
                                        </tr>

                                        <tr>
                                            <td class="bookex">Country</td>
                                            <td>{{ $booking->tourist->country }}</td>
                                        </tr>


                                    </tbody>
                                </table>

                                @if ($booking->payment)
                                    <div class="login-top cardInfo">
                                        <h3>Payment</h3>
                                        <p>Booking payment information</p>
                                    </div>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="bookex">Tr Id</td>
                                                <td>{{ $booking->payment->id }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bookex">Amount</td>
                                                <td>{{ $booking->payment->amount }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bookex">date</td>
                                                <td>{{ $booking->payment->date }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bookex">Card Last 4 digits</td>
                                                <td>{{ $booking->payment->card_last_four }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bookex">Card Type</td>
                                                <td>{{ $booking->payment->card_brand }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <div class="login-top cardInfo">
                                        <h3>Payment failed</h3>
                                        <p>Try the booking payment again</p>
                                    </div>
                                    <form class="login-form" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" action="/try-payment-booking"
                                        method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                            <input type="hidden" name="amount" value="{{$booking->total}}">
                                            <div class="row">
                                                <div class="col-lg-6 form-group">
                                                    <label>Name on Card</label>
                                                    <input class="form-control" size="4" type="text"
                                                        value="cyasitha">
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                    <label>Number of Card</label>
                                                    <input autocomplete="off" class="form-control" size="20"
                                                        type="text" name="card_no" value="4242424242424242">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 form-group">
                                                    <label>CVC</label>
                                                    <input autocomplete="off" class="form-control" placeholder="ex. 311"
                                                        size="3" type="text" value="123" name="cvv">
                                                </div>
                                                <div class="col-lg-4 form-group">
                                                    <label>Expiration month</label>
                                                    <input class="form-control" placeholder="MM" size="2"
                                                        type="text" name="expiry_month" value="05">
                                                </div>
                                                <div class="col-lg-4 form-group">
                                                    <label>Expiration year</label>
                                                    <input class="form-control" placeholder="YYYY" size="4"
                                                        type="text" name="expiry_year" value="2026">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="Confirm" type="submit" name="button">Pay Again</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="listing-item ">
                        <article class="TravelGo-category-listing fl-wrap">
                            <div class="TravelGo-category-img"> <a href="#"><img src="/images/hotels/room8.jpg"
                                        alt=""></a>
                                <div class="TravelGo-category-opt">
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <div class="rate-class-name">
                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                        <span>5.0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="TravelGo-category-content fl-wrap title-sin_item">
                                <div class="TravelGo-category-content-title fl-wrap">
                                    <div class="TravelGo-category-content-title-item">
                                        <h3 class="title-sin_map">{{ $booking->package->name }} by
                                            {{ $booking->package->profile->name }} </h3>
                                        <div class="TravelGo-category-location fl-wrap"><a href="#"
                                                class="map-item"><i class="fas fa-map-marker-alt"></i>
                                                {{ $booking->package->profile->address }} </div>
                                    </div>
                                </div>
                                <p>{{ Str::limit($booking->package->description, 130, $end = '...') }}</p>

                                <div class="TravelGo-category-footer fl-wrap">
                                    <a href="/package/{{ $booking->package->id }}">
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
                                @if ($booking->room)
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="bookex">{{ $booking->room->name }}</td>
                                                <td style="text-align: right">
                                                    {{ env('DEFAULT_PRICE_TYPE_ID') . ' ' . number_format($booking->room->price, 2) }}
                                                </td>
                                                @php
                                                    $total += $booking->room->price;
                                                @endphp
                                            </tr>
                                            <tr>
                                                <td class="bookex" style="font-size: 11px">Bathrooms</td>
                                                <td style="text-align: right; font-size: 11px">
                                                    {{ $booking->room->bathrooms_qty }} bathroom(s)</td>
                                            </tr>
                                            <tr>
                                                <td class="bookex" style="font-size: 11px">Beds</td>
                                                <td style="text-align: right; font-size: 11px">
                                                    {{ $booking->room->beds->count() }} bed(s) for
                                                    {{ $booking->room->beds->sum('pivot.capacity') }}</td>
                                                @php
                                                    $totalGuest += $room->beds->sum('pivot.capacity');
                                                @endphp
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="font-size: 11px">
                                                    @foreach ($booking->room->facilities as $facility)
                                                        <i class="fa fa-{{ $facility->icon }}" aria-hidden="true"></i>
                                                        {{ $facility->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                @else
                                    @foreach ($booking->package->rooms as $singleRoom)
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="bookex">{{ $singleRoom->name }}</td>
                                                    <td style="text-align: right">
                                                        {{ env('DEFAULT_PRICE_TYPE_ID') . ' ' . number_format($singleRoom->price, 2) }}
                                                    </td>
                                                    @php
                                                        $total += $singleRoom->price;
                                                        $totalGuest += $singleRoom->beds->sum('pivot.capacity');
                                                    @endphp
                                                </tr>
                                                <tr>
                                                    <td class="bookex" style="font-size: 11px">Bathrooms</td>
                                                    <td style="text-align: right; font-size: 11px">
                                                        {{ $singleRoom->bathrooms_qty }} bathroom(s)</td>
                                                </tr>
                                                <tr>
                                                    <td class="bookex" style="font-size: 11px">Beds</td>
                                                    <td style="text-align: right; font-size: 11px">
                                                        {{ $singleRoom->beds->count() }} bed(s) for
                                                        {{ $singleRoom->beds->sum('pivot.capacity') }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-size: 11px">
                                                        @foreach ($singleRoom->facilities as $facility)
                                                            <i class="fa fa-{{ $facility->icon }}"
                                                                aria-hidden="true"></i>
                                                            {{ $facility->name }} &nbsp;&nbsp;&nbsp;&nbsp;
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
                                            <td style="text-align: right"><strong>{{ $booking->start_date }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bookex"><strong>To : </strong></td>
                                            <td style="text-align: right"><strong>{{ $booking->end_date }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bookex"><strong>Package Price : </strong></td>
                                            <td style="text-align: right">
                                                <strong>{{ env('DEFAULT_PRICE_TYPE_ID') . ' ' . number_format($total, 2) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bookex"><strong>Number of days : </strong></td>
                                            <td style="text-align: right"><strong>{{ $booking->pkg_qty }}</strong></td>
                                            {{-- <input type="hidden" name="packageID" value="{{ Request::segment(2) }}"> --}}
                                        </tr>
                                        <tr>
                                            <td class="bookex"><strong>Total Price : </strong></td>
                                            <td style="text-align: right">
                                                <strong>{{ env('DEFAULT_PRICE_TYPE_ID') . ' ' . number_format($booking->total) }}</strong><br><span
                                                    style="font-size: 11px; color:darkgrey;">({{ $total }} x
                                                    {{ $booking->pkg_qty }})</span>
                                            </td>
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
                                    <p>We would be more than happy to help you. Our team advisor are 24/7 at your
                                        service to
                                        help you.</p>
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

            </div>
        </div>
    </section>

@endsection
