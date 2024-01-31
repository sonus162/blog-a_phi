@extends('Frontend/main')
@section('wrapper')
    <!-- SLIDE -->
    <section class="home-slide position-relative">
        <div class="slide-item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="title_slide text-uppercase"> The Mega2</div>
                        <div class="rating d-flex align-items-center">
                            <ul class="rating-star d-flex ">
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star-half'></i></li>
                            </ul>
                            <span class="rating-number ml-3 ">4.6</span>
                        </div>
                        <div class="desc_slide mt-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor distinctio adipisci eum,
                            minima unde laborum voluptatibus voluptate! Voluptates voluptatem suscipit, vel consequatur
                            libero, inventore est debitis unde aut fugit doloribus ipsam a. Doloribus porro beatae
                            itaque et assumenda tempora, placeat ex impedit voluptas debitis veritatis facere corporis
                            nobis error voluptatum.
                        </div>
                        <a href="#" class="btn-play mt-4 animate__animated animate__fadeInUp animate__delay-1.5s"><i
                                class='bx bx-play'></i> Play</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="title_slide text-uppercase"> The Shadow</div>
                        <div class="rating d-flex align-items-center">
                            <ul class="rating-star d-flex ">
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star'></i></li>
                                <li><i class='bx bxs-star-half'></i></li>
                            </ul>
                            <span class="rating-number ml-3 ">4.6</span>
                        </div>
                        <div class="desc_slide mt-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor distinctio adipisci eum,
                            minima unde laborum voluptatibus voluptate! Voluptates voluptatem suscipit, vel consequatur
                            libero, inventore est debitis unde aut fugit doloribus ipsam a. Doloribus porro beatae
                            itaque et assumenda tempora, placeat ex impedit voluptas debitis veritatis facere corporis
                            nobis error voluptatum.
                        </div>
                        <a href="#" class="btn-play mt-4 animate__animated animate__fadeInUp animate__delay-1.5s"><i
                                class='bx bx-play'></i> Play</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Phim hot -->
    <div class="second">
        <div class="container-fluid">
            <div class="latest mt-5 mb-4">
                <h1>Popular Movies</h1>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/1.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/2.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/3.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/4.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/5.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/6.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/7.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/8.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/9.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/10.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/11.jpg">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card-movies">
                        <div class="details">
                            <div class="left">
                                <p class="name">Gajaman</p>
                                <div class="date_quality">
                                    <p class="quality">HD</p>
                                    <p class="date">2023</p>
                                </div>
                                <div class="info">
                                    <div class="rate">
                                        <i class='bx bxs-star'></i>
                                        <p>9.2</p>
                                    </div>
                                    <div class="time">
                                        <i class='bx bx-time-five' ></i>
                                        <p>120min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="./img/film/12.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thể loại phim -->
    <div class="genre-movie">
        <div class="container-fluid">
            <div class="latest mt-5 mb-4">
                <h1>Popular Genre Movie</h1>
            </div>
            <div class="row">
                <div class="col-md-3 col-6 genre-item">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/3.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/4.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/5.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/6.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/7.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="genre-card position-relative">
                        <div class="img-box">
                            <img src="./img/genre/8.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="desc-box d-flex justify-content-center flex-column text-center">
                            <h6 class="genre-title"><a href="list-movie.html">Action</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- BLOG nổi bật -->
     <div class="second mb-4">
        <div class="container-fluid">
            <div class="latest mt-5 mb-4">
                <h1>Popular Blog</h1>
            </div>
            <div class="card-blogs">
                <div href="blog-detail.html" class="card-blog">
                    <div class="thumb">
                        <img src="/img/blog/1.jpg" alt="">
                    </div>
                    <div class="card-blog_content p-2">
                        <div class="title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, omnis.</div>
                        <p class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, culpa? Dolore facilis quod suscipit a nemo eveniet magnam modi, delectus culpa perspiciatis deserunt at aliquid optio autem? Sint repudiandae non nulla id obcaecati hic perspiciatis ex illo qui nam reiciendis ratione, minus dolores ducimus assumenda quae, velit et excepturi officiis!</p>
                    </div>
                </div>
                <a href="blog-detail.html"  class="card-blog">
                    <div class="thumb">
                        <img src="/img/blog/4.jpg" alt="">
                    </div>
                    <div class="card-blog_content p-2">
                        <div class="title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, omnis.</div>
                        <p class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, culpa? Dolore facilis quod suscipit a nemo eveniet magnam modi, delectus culpa perspiciatis deserunt at aliquid optio autem? Sint repudiandae non nulla id obcaecati hic perspiciatis ex illo qui nam reiciendis ratione, minus dolores ducimus assumenda quae, velit et excepturi officiis!</p>
                    </div>
                </a>
                <a href="blog-detail.html"  class="card-blog">
                    <div class="thumb">
                        <img src="/img/blog/2.jpg" alt="">
                    </div>
                    <div class="card-blog_content p-2">
                        <div class="title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, omnis.</div>
                        <p class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, culpa? Dolore facilis quod suscipit a nemo eveniet magnam modi, delectus culpa perspiciatis deserunt at aliquid optio autem? Sint repudiandae non nulla id obcaecati hic perspiciatis ex illo qui nam reiciendis ratione, minus dolores ducimus assumenda quae, velit et excepturi officiis!</p>
                    </div>
                </a>
                <a href="blog-detail.html"  class="card-blog">
                    <div class="thumb">
                        <img src="/img/blog/3.jpg" alt="">
                    </div>
                    <div class="card-blog_content p-2">
                        <div class="title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, omnis.</div>
                        <p class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, culpa? Dolore facilis quod suscipit a nemo eveniet magnam modi, delectus culpa perspiciatis deserunt at aliquid optio autem? Sint repudiandae non nulla id obcaecati hic perspiciatis ex illo qui nam reiciendis ratione, minus dolores ducimus assumenda quae, velit et excepturi officiis!</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('Frontend/js/home.js')}}"></script>
@endpush
