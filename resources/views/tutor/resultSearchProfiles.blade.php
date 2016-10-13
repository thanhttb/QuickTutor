
@if(count($profiles))
    <section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Gia sư tìm thấy</h2>
                        <h3 class="section-subheading text-muted">Phù hợp với yêu cầu của bạn</h3>
                    </div>
                </div>
                <div class="row">
    				@foreach($profiles as $profile)
    					<div class="col-md-4 col-sm-6 portfolio-item">
    	                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
    	                        <div class="portfolio-hover">
    	                            <div class="portfolio-hover-content">
    	                                <i class="fa fa-plus fa-3x"></i>
    	                            </div>
    	                        </div>
    	                        <img src= {{$profile->linkAvatar}} class="img-responsive" alt="">
    	                    </a>
    	                    <div class="portfolio-caption">
    	                        <h4>{{$profile->name}}</h4>
    	                        <p class="text-muted">{{$year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $profile->birthDay)->year}} - {{$profile->price}}/h</p>
    	                    </div>
    	                </div>
    				@endforeach
                </div>
            </div>
    </section>
    {{$profiles->links()}}
@else
    <section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Không tìm thấy kết quả nào</h2>
                        <h3 class="section-subheading text-muted">Phù hợp với yêu cầu của bạn</h3>
                    </div>
                </div>
            </div>
    </section>
@endif
