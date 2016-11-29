@extends('layouts.app')
@section('header')
    <title>About | Tutor Online</title>
    <link href="/css/about.css" rel="stylesheet">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">About</h2>
                <h3 class="section-subheading text-muted">Welcome to our team</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            {{-- <img class="img-circle img-responsive" src="home/img/hong_profile.jpg" alt=""> --}}
                            <img class="img-circle img-responsive" src="https://blackrockdigital.github.io/startbootstrap-agency/img/about/1.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <br></br>
                                <br></br>
                                <h4 class="subheading">Nguyễn Hữu Hồng</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Sinh viên Khoa CNTT, ĐH Công nghệ-ĐHQGHN</p>
                                <p class="text-muted">Sở thích: Lập trình</p>
                                <p class="text-muted">Sở trường: Chơi game</p>
                                <p class="text-muted">Email: hongnguyenhuu96@gmail.com</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            {{-- <img class="img-circle img-responsive" src="home/img/thanh_profile.jpg" alt=""> --}}
                            <img class="img-circle img-responsive" src="https://blackrockdigital.github.io/startbootstrap-agency/img/about/2.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <br></br>
                                <h4 class="subheading">Trần Trịnh Bình Thành</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Sinh viên Khoa CNTT, ĐH Công nghệ-ĐHQGHN</p>
                                <p class="text-muted">Sở thích: Lập trình</p>
                                <p class="text-muted">Sở trường: Chơi game</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            {{-- <img class="img-circle img-responsive" src="home/img/thuat_profile.png" alt=""> --}}
                            <img class="img-circle img-responsive" src="https://blackrockdigital.github.io/startbootstrap-agency/img/about/3.jpg" alt="">

                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <br></br>
                                <h4 class="subheading">Trần Như Thuật</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Sinh viên Khoa CNTT, ĐH Công nghệ-ĐHQGHN</p>
                                <p class="text-muted">Sở thích: Lập trình</p>
                                <p class="text-muted">Sở trường: Chơi game</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            {{-- <img class="img-circle img-responsive" src="home/img/hong_profile.jpg" alt=""> --}}
                            <img class="img-circle img-responsive" src="https://blackrockdigital.github.io/startbootstrap-agency/img/about/4.jpg" alt="">

                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <br></br>
                                <h4 class="subheading">Trần Văn Liên</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Sinh viên Khoa CNTT, ĐH Công nghệ-ĐHQGHN</p>
                                <p class="text-muted">Sở thích: Lập trình</p>
                                <p class="text-muted">Sở trường: Chơi game</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Coding Project
                                <br>Building
                                <br>The Future</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop
