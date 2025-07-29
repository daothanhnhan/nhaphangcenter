<div class="gb-banner">

</div>

<script>
    $(document).ready(function () {
        var hearHeight = $('').outerHeight();

        $('.slide-section').click(function () {
            var linkHref = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(linkHref).offset().top - hearHeight
            }, 1000);
            e.preventDefault();
        });
    });
</script>