@extends('web.includes.layout')
@section('title', 'Home')

@section('content')

<!-- =======================
	Main Banner -->
    <section class="p-0 height-700 parallax-bg tourBanner" style="background:url(images/banner/14.jpg) no-repeat 65% 0%; background-size:cover;">
        <div class="container h-100">
          <div class="row justify-content-between align-items-center h-100" >
            <div class="col-md-8 mb-7 banner-title">
              <h4>Welcome to manakal.com - beauty of Sri Lanka</h4>
              <h1 class="display-4 font-weight-bold">Sri Lanka's No.1 Hotel Booking Platform</h1>
               </div>
          </div>
        </div>
      </section>
      <!-- =======================
          Main banner -->

      <section class="mt-lg-n9 mt-sm-0 pb-0 z-index-9 booking-search">
        <div class="container ">
          <div class="row shadow border-radius-3">
            <div class="col-md-12 np">
              <div class="feature-box h-100">
                <div class="tab_container">
                  <input id="tab1" type="radio" name="tabs" checked>

                  <input id="tab2" type="radio" name="tabs">

                  <input id="tab3" type="radio" name="tabs">

                  <input id="tab4" type="radio" name="tabs">

                  <input id="tab5" type="radio" name="tabs">

                  <section id="content1" class="tab-content">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="City or Point of Interest, Ex: Hikkaduwa">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker" autocomplete="off" placeholder="Check-in date">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-out" autocomplete="off" placeholder="Check-out date">
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <select class="custom-select select-big">
                            <option selected="">Rooms</option>
                            <option value="location1">01</option>
                            <option value="location2">02</option>
                            <option value="location3">03</option>
                            <option value="location4">04</option>
                            <option value="location5">05</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <select class="custom-select select-big">
                            <option selected="">Guests</option>
                            <option value="location1">01</option>
                            <option value="location2">02</option>
                            <option value="location3">03</option>
                            <option value="location4">04</option>
                            <option value="location5">05</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <button class="btn btn-primary btn-lg btn-grad" type="submit">Search</button>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section id="content2" class="tab-content">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="From : City, Airport, U.S. Zip">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="To : City, Airport, U.S. Zip">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-1" autocomplete="off" placeholder="Departing">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-2" autocomplete="off" placeholder="Returning">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <button class="btn btn-primary btn-lg btn-grad" type="submit">Search</button>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section id="content3" class="tab-content">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="Pick-up Location">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="Drop-off Location">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-3" autocomplete="off" placeholder="Pick-up Date">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-4" autocomplete="off" placeholder="Drop-ff Date">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <button class="btn btn-primary btn-lg btn-grad" type="submit">Search</button>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section id="content4" class="tab-content">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="enter a destination or hotel name">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-5" autocomplete="off" placeholder="Departure Date">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <select class="custom-select select-big">
                            <option selected="">Cruise Length</option>
                            <option value="location1">1-2 Night</option>
                            <option value="location2">2-3 Night</option>
                            <option value="location3">3-4 Night</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <select class="custom-select select-big">
                            <option selected="">Cruise Line</option>
                            <option value="location1">Azamara Club Cruises</option>
                            <option value="location2">Celebrity Cruises</option>
                            <option value="location3">Cruise & Maritime</option>
                            <option value="location4">Oceania Cruises</option>
                            <option value="location5">Peter Deilmann Cruises</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <button class="btn btn-primary btn-lg btn-grad" type="submit">Search</button>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section id="content5" class="tab-content">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="From : City, Airport, U.S. Zip">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="fas fa-map-marker-alt"></span>
                          <input class="form-control" type="text" placeholder="To : City, Airport, U.S. Zip">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-6" autocomplete="off" placeholder="Departing">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group"> <span class="far fa-calendar-alt"></span>
                          <input class="form-control" type="text" id="datepicker-7" autocomplete="off" placeholder="Returning">
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 padding8">
                        <div class="form-group">
                          <button class="btn btn-primary btn-lg btn-grad" type="submit">Search</button>
                        </div>
                      </div>
                    </div>
                    </p>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="Categories pt80 pb60 Categories-home-list">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-8">
              <p class="subtitle text-secondary nopadding">Stay and eat like a local</p>
              <h1 class="paddtop1 font-weight lspace-sm">Popular Destinations</h1>
            </div>
            <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a href="#" class="blist text-sm ml-2"> See all Categories<i class="fas fa-angle-double-right ml-2"></i></a></div>
          </div>
          <div class="row">
            <div class="swiper-container guides-slider">
              <!-- Additional required wrapper-->
              <div class="swiper-wrapper">
                <!-- Slides-->
                <div class="swiper-slide h-auto px-2">
                  <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="#" class="tile-link"></a><img src="images/home1.jpg" alt="Card image" class="bg-image">
                    <div class="card-body overlay-content">
                      <h6 class="card-title text-shadow text-uppercase">Sigiriya</h6>
                      <p class="card-text text-sm">Ancient rock fortress</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide h-auto px-2">
                  <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="#" class="tile-link"></a><img src="images/home2.jpg" alt="Card image" class="bg-image">
                    <div class="card-body overlay-content">
                      <h6 class="card-title text-shadow text-uppercase">Horton Plains</h6>
                      <p class="card-text text-sm">Bambarakanda Falls</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide h-auto px-2">
                  <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="#" class="tile-link"></a><img src="images/home3.jpg" alt="Card image" class="bg-image">
                    <div class="card-body overlay-content">
                      <h6 class="card-title text-shadow text-uppercase">Ella</h6>
                      <p class="card-text text-sm"> Kandy to ella train</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide h-auto px-2">
                  <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="#" class="tile-link"></a><img src="images/home4.jpg" alt="Card image" class="bg-image">
                    <div class="card-body overlay-content">
                      <h6 class="card-title text-shadow text-uppercase">Galle</h6>
                      <p class="card-text text-sm">Galle light house</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide h-auto px-2">
                  <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="#" class="tile-link"></a><img src="images/home5.jpg" alt="Card image" class="bg-image">
                    <div class="card-body overlay-content">
                      <h6 class="card-title text-shadow text-uppercase">Mirissa</h6>
                      <p class="card-text text-sm">Mirissa is a small town on the south coast of Sri Lanka</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide h-auto px-2">
                  <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="#" class="tile-link"></a><img src="images/home6.jpg" alt="Card image" class="bg-image">
                    <div class="card-body overlay-content">
                      <h6 class="card-title text-shadow text-uppercase">Kandalama Srilanka</h6>
                      <p class="card-text text-sm">kandalama, Dambulla, Srilanka</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination d-md-none"> </div>
            </div>
          </div>
        </div>
      </section>
      <section class="Categories pt80 pb60 ">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-8">
              <p class="subtitle text-secondary nopadding">Stay and eat like a local</p>
              <h1 class="paddtop1 font-weight lspace-sm">Popular Hotels</h1>
            </div>
            <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a href="#" class="blist text-sm ml-2"> See all Hotels<i class="fas fa-angle-double-right ml-2"></i></a></div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="listroBox">
                <figure> <a href="hotel-detailed.blade.php" class="wishlist_bt"></a> <a href="hotel-detailed.blade.php"><img src="images/hotels/room5.jpg" class="img-fluid" alt="" >
                  <div class="read_more"><span>Read more</span></div>
                  </a> </figure>
                <div class="listroBoxmain">
                  <h3><a href="hotel-detailed.blade.php">Modern, Well-Appointed Room</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                  <a class="address" href="#">Get directions</a> </div>
                <ul>
                  <li>
                    <p class="card-text text-muted"><span class="h4 text-primary">LKR 800</span> / night</p>
                  </li>
                  <li>
                    <div class="R_retings">
                      <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="listroBox">
                <figure> <a href="hotel-detailed.blade.php" class="wishlist_bt"></a> <a href="hotel-detailed.blade.php"><img src="images/hotels/room1.jpg" class="img-fluid" alt="" >
                  <div class="read_more"><span>Read more</span></div>
                  </a> </figure>
                <div class="listroBoxmain">
                  <h3><a href="hotel-detailed.blade.php">Modern, Well-Appointed Room</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                  <a class="address" href="#">Get directions</a> </div>
                <ul>
                  <li>
                    <p class="card-text text-muted"><span class="h4 text-primary">LKR 800</span> / night</p>
                  </li>
                  <li>
                    <div class="R_retings">
                      <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="listroBox">
                <figure> <a href="hotel-detailed.blade.php" class="wishlist_bt"></a> <a href="hotel-detailed.blade.php"><img src="images/hotels/room2.jpg" class="img-fluid" alt="" >
                  <div class="read_more"><span>Read more</span></div>
                  </a> </figure>
                <div class="listroBoxmain">
                  <h3><a href="hotel-detailed.blade.php">Modern, Well-Appointed Room</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                  <a class="address" href="#">Get directions</a> </div>
                <ul>
                  <li>
                    <p class="card-text text-muted"><span class="h4 text-primary">LKR 800</span> / night</p>
                  </li>
                  <li>
                    <div class="R_retings">
                      <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="listroBox">
                <figure> <a href="hotel-detailed.blade.php" class="wishlist_bt"></a> <a href="hotel-detailed.blade.php"><img src="images/hotels/room7.jpg" class="img-fluid" alt="" >
                  <div class="read_more"><span>Read more</span></div>
                  </a> </figure>
                <div class="listroBoxmain">
                  <h3><a href="hotel-detailed.blade.php">Modern, Well-Appointed Room</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                  <a class="address" href="#">Get directions</a> </div>
                <ul>
                  <li>
                    <p class="card-text text-muted"><span class="h4 text-primary">LKR 800</span> / night</p>
                  </li>
                  <li>
                    <div class="R_retings">
                      <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="listroBox">
                <figure> <a href="hotel-detailed.blade.php" class="wishlist_bt"></a> <a href="hotel-detailed.blade.php"><img src="images/hotels/room8.jpg" class="img-fluid" alt="" >
                  <div class="read_more"><span>Read more</span></div>
                  </a> </figure>
                <div class="listroBoxmain">
                  <h3><a href="hotel-detailed.blade.php">Modern, Well-Appointed Room</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                  <a class="address" href="#">Get directions</a> </div>
                <ul>
                  <li>
                    <p class="card-text text-muted"><span class="h4 text-primary">LKR 800</span> / night</p>
                  </li>
                  <li>
                    <div class="R_retings">
                      <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <div class="listroBox">
                <figure> <a href="hotel-detailed.blade.php" class="wishlist_bt"></a> <a href="hotel-detailed.blade.php"><img src="images/hotels/room6.jpg" class="img-fluid" alt="" >
                  <div class="read_more"><span>Read more</span></div>
                  </a> </figure>
                <div class="listroBoxmain">
                  <h3><a href="hotel-detailed.blade.php">Modern, Well-Appointed Room</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                  <a class="address" href="#">Get directions</a> </div>
                <ul>
                  <li>
                    <p class="card-text text-muted"><span class="h4 text-primary">LKR 800</span> / night</p>
                  </li>
                  <li>
                    <div class="R_retings">
                      <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="bg-light pattern-overlay-1-dark">
        <div class="container">
          <div class="col-md-12 col-lg-9 mx-auto p-4 p-sm-5">
            <div class="text-center px-0 px-sm-5">
              <p class="mb-3 lead">21,215+ Hotel and Resorts Available!</p>
              <form>
                <div class="input-group px-0 px-md-5">
                  <input class="form-control border-radius-right-0 border-right-0 bg-transparent" type="text" name="search" placeholder="Enter destination">
                  <button type="button" class="btn btn-grad mb-0 border-radius-left-0"> <span class=" d-md-block">Search now</span> <span class="d-md-none"><i class="fab fa-paper-plane-o m-0"></i></span> </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>



@endsection
