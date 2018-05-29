<?php

$session = SSession::getInstance();
if (isset($session->role)) {
    if ($session->role === "adm") {
        header('location:?');
    } else {
        include_once 'public/header_usr.php';
    }
} else {
    include_once 'public/header.php';
}
?>
<script>
    (function () {
        var element = document.getElementById("menu-destination-detail");
        element.classList.add("active");
    })();
</script>

<div class="detail-wrapper">
    <div class="container">
        <div class="detail-header">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="detail-category color-grey-3">2 Place de la Sans Défense, Puteaux, Paris, France.</div>
                    <h2 class="detail-title color-dark-2">paris International Hotel</h2>
                    <div class="detail-rate rate-wrap clearfix">
                        <div class="rate">
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                        </div>
                        <i>485 Rewies</i> 
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="detail-price color-dark-2">price from  <span class="color-dr-blue"> $200</span> /person</div>
                </div>
            </div>
       	</div>
       	<div class="row padd-90">
            <div class="col-xs-12 col-md-8">
                <div class="detail-content color-1">
                    <div class="detail-top slider-wth-thumbs style-2">
                        <div class="swiper-container thumbnails-preview" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide active" data-val="0">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_1.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="1">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_2.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="2">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_3.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="3">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_4.jpg" alt="">		 
                                </div>
                                <div class="swiper-slide" data-val="4">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_5.jpg" alt="">           		 
                                </div>
                            </div>
                            <div class="pagination pagination-hidden"></div>
                        </div>
                        <div class="swiper-container thumbnails" data-autoplay="0" 
                             data-loop="0" data-speed="500" data-center="0" 
                             data-slides-per-view="responsive" data-xs-slides="3" 
                             data-sm-slides="5" data-md-slides="5" data-lg-slides="5" 
                             data-add-slides="5">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide current active" data-val="0">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_1s.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="1">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_2s.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="2">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_3s.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="3">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_4s.jpg" alt="">
                                </div>
                                <div class="swiper-slide" data-val="4">
                                    <img class="img-responsive img-full" src="img/detail/m_slide_5s.jpg" alt="">
                                </div>
                            </div>
                            <div class="pagination hidden"></div>
                        </div>
                    </div>

                    <div class="detail-content-block">
                        <h3>General Information About tour</h3>
                        <p>Pellentesque ac turpis egestas, varius justo et, condimentum augue. Praesent aliquam, nisl feugiat vehicula condimentum, justo tellus scelerisque metus. Pellentesque ac turpis egestas, varius justo et, condimentum augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                        <h5>interesting for you</h5>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY?controls=0" ></iframe>
                        </div>
                    </div>
                    <div class="detail-content-block">
                        <div class="accordion style-2">
                            <div class="acc-panel">
                                <div class="acc-title"><span class="acc-icon"></span>Facilidades</div>
                                <div class="acc-body">
                                    <h5>metus Aenean eget massa</h5>
                                    <p>Mauris posuere diam at enim malesuada, ac malesuada erat auctor. Ut porta mattis tellus eu sagittis. Nunc maximus ipsum a mattis dignissim. Suspendisse id pharetra lacus, et hendrerit mi. Praesent at vestibulum tortor. Ut porta mattis tellus eu sagittis. Nunc maximus ipsum a mattis dignissim.</p>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <ul>
                                                <li>Shopping history</li>
                                                <li>Hot offers according your settings</li>
                                                <li>Multi-product search</li>
                                                <li>Opportunity to share with friends</li>
                                                <li>User-friendly interface</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <ul>
                                                <li>Shopping history</li>
                                                <li>Hot offers according your settings</li>
                                                <li>Multi-product search</li>
                                                <li>Opportunity to share with friends</li>
                                                <li>User-friendly interface</li>
                                            </ul>									
                                        </div>
                                    </div>
                                </div>
                            </div>                                                                                                                  
                        </div>											
                    </div>										
                </div>       			
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="right-sidebar">
                    <div class="detail-block bg-dr-blue">
                        <h4 class="color-white">details</h4>
                        <div class="details-desc">
                            <p class="color-grey-9">Category:  <span class="color-white">hotels</span></p>
                            <p class="color-grey-9">price: <span class="color-white">$500 / person</span></p>
                            <p class="color-grey-9">location: <span class="color-white">paris, france</span></p>
                            <p class="color-grey-9">date: <span class="color-white">july 19th to july 29th</span></p>
                            <p class="color-grey-9">rate: <span class="fa fa-star color-yellow"></span><span class="fa fa-star color-yellow"></span><span class="fa fa-star color-yellow"></span><span class="fa fa-star color-yellow"></span><span class="fa fa-star color-yellow"></span></p>
                            <p class="color-grey-9">number of people: <span class="color-white">2 adult</span></p>
                            <p class="color-grey-9">hotel class: <span class="color-white">4 <span class="fa fa-star color-yellow"></span></span></p>
                            <p class="color-grey-9">Bed Type: <span class="color-white">Queen Size</span></p>
                            <p class="color-grey-9">Cable TV: <span class="color-white">FREE</span></p>
                            <p class="color-grey-9">Telephone: <span class="color-white">YES</span></p>
                            <p class="color-grey-9">Room Service: <span class="color-white">Included</span></p>
                            <p class="color-grey-9">Wireless: <span class="color-white">YES</span></p>
                            <p class="color-grey-9">Minibar: <span class="color-white">FREE</span></p>
                            <p class="color-grey-9">CANCELLATION: <span class="color-white">STRICT</span></p>
                        </div>
                        <div class="details-btn">
                            <a href="#" class="c-button b-40 bg-tr-1 hv-white"><span>view on map</span></a>
                            <a href="#" class="c-button b-40 bg-white hv-transparent"><span>book now</span></a>
                        </div>
                    </div>										      				
                </div>       			
            </div>
       	</div>
    </div>
</div>



<?php

include_once 'public/footer.php';
