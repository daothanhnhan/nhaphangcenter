<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-slideshow">
    <div class="gb-slideshow-slide owl-carousel owl-theme">
        <?php
            $array = json_decode($rowConfig['slideshow_home'], true);
            foreach ($array as $key => $val) {
                $img = json_decode($val, true);
                if ($img != '') {
                    ?> 
        <div class="item">
            <img src="/images/<?= $img['image']?>" alt="slideshow" class="img-responsive">
        </div>
        <?php                            
              }
          }
        ?>   
    </div>
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-slideshow-slide').owlCarousel({
            loop:true,
            responsiveClass:true,
            autoplay:true,
            nav:false,
            navText:[],
            dots:true,
            responsive:{
                0:{
                    items:1
                }
            }
        });
    });
</script>