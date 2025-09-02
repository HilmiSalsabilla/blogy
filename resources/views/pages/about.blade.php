@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="site-cover site-cover-sm same-height overlay single-page" 
        style="background-image: url('{{ asset('assets/images/hero_5.jpg') }}'); margin-top:-25px">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <div class="section sec-halfs mb-4">
        <div class="container">

            <div class="half-content d-lg-flex align-items-stretch mb-5">
                <div class="img" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}')" 
                     data-aos="fade-in" data-aos-delay="100"></div>
                <div class="text">
                    <h2 class="heading mb-3">Resources for makers and creatives</h2>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                    <p><a href="#" class="btn btn-outline-primary py-2">Read more</a></p>
                </div>
            </div>

            <div class="half-content d-lg-flex align-items-stretch">
                <div class="img order-md-2" style="background-image: url('{{ asset('assets/images/hero_2.jpg') }}')" 
                     data-aos="fade-in"></div>
                <div class="text">
                    <h2 class="heading mb-3">We are trusted by more than 5,000 clients</h2>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                    <p><a href="#" class="btn btn-outline-primary py-2">Read more</a></p>
                </div>
            </div>

        </div>
    </div>

    <!-- Features Section -->
    <div class="section sec-features">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature d-flex">
                        <span class="bi-bag-check-fill"></span>
                        <div>
                            <h3>Building your blog</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature d-flex">
                        <span class="bi-wallet-fill"></span>
                        <div>
                            <h3>Resources and insights</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <span class="bi-pie-chart-fill"></span>
                        <div>
                            <h3>Blog just for you</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="section">
        <div class="container">

            <!-- Heading -->
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                    <h2 class="heading">Our Team</h2>
                    <p>
                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.
                    </p>
                </div>
            </div>

            <!-- Team Members -->
            <div class="row">
                <!-- Member 1 -->
                <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="0">
                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                    <h5 class="text-black">James Griffin</h5>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>

                <!-- Member 2 -->
                <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                    <h5 class="text-black">Claire Smith</h5>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>

                <!-- Member 3 -->
                <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                    <h5 class="text-black">Jessica Wilson</h5>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>

                <!-- Member 4 -->
                <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="0">
                    <img src="{{ asset('assets/images/person_4.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                    <h5 class="text-black">William Anderson</h5>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>

                <!-- Member 5 -->
                <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/person_4.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                    <h5 class="text-black">Julie Harvey</h5>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>

                <!-- Member 6 -->
                <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('assets/images/person_4.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                    <h5 class="text-black">Shana Clarkson</h5>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Extra Section -->
    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/images/img_7_sq.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-lg-4 ps-lg-2">
                    <div class="mb-5">
                        <h2 class="text-black h4">Publishing platform for professional bloggers</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <span class="bi-wallet-fill me-4"></span>
                        <div>
                            <h3>Building your blog</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <span class="bi-pie-chart-fill me-4"></span>
                        <div>
                            <h3>Resources and insights</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <span class="bi-bag-check-fill me-4"></span>
                        <div>
                            <h3>Blog just for you</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
