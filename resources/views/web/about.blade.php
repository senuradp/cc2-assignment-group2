@extends('web.includes.layout')
@section('title', 'HelaView - Home')

@section('content')

    <!-- =======================
         Banner innerpage -->
    <div class="innerpage-banner left bg-overlay-dark-7 py-7"
        style="background:url(images/pic1.jpg) repeat; background-size:cover;">
        <div class="container">
            <div class="row all-text-white">
                <div class="col-md-12 align-self-center">
                    <h1 class="innerpage-title">About Us</h1>

                </div>
            </div>
        </div>
    </div>
    <!-- =======================
         Banner innerpage -->

    <div class="section section-padding">
        <div class="container">
            <div class="row">

                <!--About Image Start-->
                <div class="col-lg-6 col-12 mb-lg-0 mb-3">
                    <div class="about-image"><img src="images/pic2.jpg" alt=""></div>
                </div>
                <!--About Image End-->

                <!--About Content Start-->
                <div class="col-lg-6 col-12 align-self-center mt-lg-0 mt-3">
                    <div class="about-content">

                        <div class="about-heading">
                            <h4 class="sub">We are <span class="text-primary">Manakal</span></h4>
                            <h2 class="title h1">Jobs fill you pockets, adventures fill your soul!</h2>
                        </div>

                        <div class="desc">
                            <p>Are you awaiting the ideal moment to take that elusive fantasy vacation?
                                There is actually no time like the present. Action is the key to achieving
                                your goals! Why then wait? Get in touch with us, and we'll help you organize
                                 the trip of a lifetime!</p>
                        </div>
                    </div>
                </div>
                <!--About Content End-->

            </div>
        </div>
    </div>

    {{-- pics of developers --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card-group">
                        <div class="card">
                            <img src="images/yasitha.png" class="card-img-top" alt="image">
                            <div class="card-body">
                                <h5 class="card-title">Mr.Chamindu Yasitha</h5>
                                <p class="card-text">Work hard to archive new technology and
                                 learn from our mistakes to offer better services to customer!
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"></small>
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/moksha.png" class="card-img-top" alt="image">
                            <div class="card-body">
                                <h5 class="card-title">Mr.Moksha Kaushan</h5>
                                <p class="card-text">Work hard to archive new technology and
                                    learn from our mistakes to offer better services to customer!</p>
                                <p class="card-text">
                                    <small class="text-muted"></small>
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/senura.jpg" class="card-img-top" alt="image">
                            <div class="card-body">
                                <h5 class="card-title">Mr.Senura Perera</h5>
                                <p class="card-text">Work hard to archive new technology and
                                    learn from our mistakes to offer better services to customer!</p>
                                <p class="card-text">
                                    <small class="text-muted"></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <div class="section section-padding--sm bg-black">
        <div class="container">

            <!--CTA Content Start-->
            <div class="cta-content">
                <h2 class="title h1 text-white">Need to get in touch with us?</h2>
                <a href="contact-us" class="btn btn-light-outline btn-hover-primary">Contact Us</a>
            </div>
            <!--CTA Content End-->

        </div>
    </div>

    <!-- =======================
         newsletter -->
    <section class="bg-light pattern-overlay-1-dark">
        <div class="container">
            <div class="col-md-12 col-lg-9 mx-auto p-4 p-sm-5">

            </div>
        </div>
    </section>
    <!-- =======================
         newsletter -->

@endsection
