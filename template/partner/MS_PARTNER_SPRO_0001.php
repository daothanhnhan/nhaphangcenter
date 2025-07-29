<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<div class="box_partner" >
    <h2 class="title">LOGO ĐỐI TÁC</h2>
    <div class="cover_box_partner owl-carousel owl-theme"  id="partner" >
        <div class="item partner">
            <a href="">
                <img src="images/partner/1.jpg" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/2.jpg" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/3.jpg" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/5.jpg" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/6.jpg" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/7.jpg" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/8.png" alt="" class="imgp-responsive">
            </a>
        </div>
        <div class="item partner">
            <a href="">
                <img src="images/partner/9.jpg" alt=""class="imgp-responsive">
            </a>
        </div>
    </div>
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.cover_box_partner').owlCarousel({
            loop:true,
            margin:30,
            responsiveClass:true,
            nav:false,
            navText:[],
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:6
                }
            }
        });
    });
</script>
