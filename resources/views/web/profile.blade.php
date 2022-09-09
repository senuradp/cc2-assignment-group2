@extends('web.includes.layout')
@section('title', 'HelaView - Hotels')

@section('content')


    <div class="mt-5 col-sm-12 col-md-12">
        <ul class="nav nav-tabs tab-with-center-icon justify-content-center nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-8-1"> <i class="fas fa-user"></i> Personal
                    Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-8-2"> <i class="fas fa-suitcase"></i> My Bookings </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-8-3"> <i class="fas fa-comment"></i> My Reviews </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="tab-8-1">
                <section class="pt80 pb80 booking-section login-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="login-box Booking-box">
                                            <div class="login-top">
                                                <h3> Personal Information</h3>
                                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
                                            </div>
                                            <form class="login-form" action="/profile" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                                                        <label> <i class="fas fa-user"></i> First Name</label>
                                                        <input type="text" name="first_name" value="{{ Auth::user('web')->first_name }}" placeholder="First Name" required>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 email">
                                                        <label> <i class="fas fa-user"></i> Last Name</label>
                                                        <input type="text" name="last_name" placeholder="Last Name" value="{{ Auth::user('web')->last_name }}" required>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-envelope"></i> Email</label>
                                                        <input type="text" name="email" placeholder="Email" value="{{ Auth::user('web')->email }}"  readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-phone"></i> Phone Number</label>
                                                        <input type="text" name="contacts" placeholder="Phone Number" value="{{ Auth::user('web')->contacts ?  Auth::user('web')->contacts[0] : '' }}"  required>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-calendar"></i> Date of Birth</label>
                                                        <input type="date" name="dob" placeholder="Date of Birth" value="{{ Auth::user('web')->dob }}" required>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-globe"></i>Country</label>
                                                        <input type="text" name="country" placeholder="Country" value="{{ Auth::user('web')->country }}" required>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-map-marker"></i>Zip Code</label>
                                                        <input type="number" name="zip" placeholder="Zip Code" value="{{ Auth::user('web')->zip }}">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-home"></i>State</label>
                                                        <input type="text" name="state" placeholder="State" value="{{ Auth::user('web')->state }}">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 email">
                                                        <label> <i class="fas fa-home"></i>Address</label>
                                                        <input type="text" name="address" placeholder="Address" value="{{ Auth::user('web')->address }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" name="button">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                          <a href="/logout"><button class="btn btn-danger mt-4" type="submit" name="button">Logout</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane" id="tab-8-2">
                <section class="pt80 pb80 cruise-grid-view">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 Filter-left">
                          <form action="#" autocomplete="off" >
                            <div class="mb-left">
                              <label for="form_dates" class="form-label">Start Date</label>
                              <div class="form-group">
                                <input class="form-control" type="text" id="datepicker" autocomplete="off" placeholder="Choose your dates">
                              </div>
                            </div>
                            <div class="mb-left">
                              <label for="form_dates" class="form-label">End Date</label>
                              <div class="form-group">
                                <input class="form-control" type="text" id="datepicker" autocomplete="off" placeholder="Choose your dates">
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                          <div class="row">
                            @foreach(Auth::user('web')->bookings as $booking)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="listing-item ">
                                <article class="TravelGo-category-listing fl-wrap">
                                  <div class="TravelGo-category-img"> <a href="package/{{ $booking->package->id }}"><img src="images/cruises/1.jpg" alt=""></a>
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
                                        <h3 class="title-sin_map">{{ $booking->package->name }} by
                                          {{ $booking->package->profile->name }}</h3>
                                        <div class="TravelGo-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> {{ $booking->package->profile->address }}</a> <span>{{ env('DEFAULT_PRICE_TYPE_ID') . ' ' . number_format($booking->total) }}</span> </div>
                                        <div class="TravelGo-category-date fl-wrap"><p class="map-item"><i class="fas fa-calendar"></i> From {{ $booking->start_date }} to {{ $booking->end_date }}</p></div>
                                        <div class="TravelGo-category-duration fl-wrap"><p class="map-item"><i class="fas fa-clock mr-2"></i>No. of days{{ $booking->pkg_qty }}</p></div>
                                      </div>
                                    </div>
                                    <p>{{ Str::limit($booking->package->description, 130, $end = '...') }}</p>
                                  
                                    <div class="TravelGo-category-footer fl-wrap">
                                      <a href="package/{{ $booking->package->id }}"><div class="TravelGo-category-price btn-grad"><span>Book Again</span></div></a>
                                      <div class="TravelGo-opt-list"> <a href="#" class="single-map-item"><i class="fas fa-map-marker-alt"></i><span class="TravelGo-opt-tooltip">On the map</span></a> <a href="#" class="TravelGo-js-favorite"><i class="fas fa-heart"></i><span class="TravelGo-opt-tooltip">Save</span></a> <a href="#" class="TravelGo-js-booking"><i class="fas fa-retweet"></i><span class="TravelGo-opt-tooltip">Find Directions</span></a> </div>
                                    </div>
                                  </div>
                                </article>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

            </div>
            <div class="tab-pane" id="tab-8-3">
                <section class="Blog-list pt80 pb80">
                    <div class="container">
                      <div class="row">
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b1.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Autumn fashion tips and tricks </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">Pellentesque habitant morbi tristique senectus. Vestibulum tortor quam, feugiat vitae, ultricies ege...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b2.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Newest photo apps </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibu...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b3.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Best books about Photography </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.  Mauris placerat eleif...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>

                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b1.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Autumn fashion tips and tricks </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">Pellentesque habitant morbi tristique senectus. Vestibulum tortor quam, feugiat vitae, ultricies ege...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b2.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Newest photo apps </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibu...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b3.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Best books about Photography </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.  Mauris placerat eleif...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>

                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b1.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Autumn fashion tips and tricks </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">Pellentesque habitant morbi tristique senectus. Vestibulum tortor quam, feugiat vitae, ultricies ege...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b2.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Newest photo apps </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibu...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                        <!-- blog item-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                          <div class="card shadow border-0 h-100"><a href="post.html"><img src="images/b3.jpg" alt="..." class="img-fluid card-img-top"></a>
                            <div class="card-body">
                              <h5 class="my-2"><a href="post.html" class="text-dark">Best books about Photography </a></h5>
                              <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2019</p>
                              <p class="my-2 text-muted text-sm">Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.  Mauris placerat eleif...</p>
                              <a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a> </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>


@endsection
