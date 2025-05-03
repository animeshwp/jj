<!-- statement start -->
<section class="bani-bottom">
    <div class="container">
        <div class="row">
            <div class="blog-top-bani">

                <p>&nbsp;</p>

            </div>
        </div>
    </div>
</section>
<!-- statement end -->
<!-- notive start -->
<section class="nutish">
    <div class="container">
        <div class="row">
            <div class="ticker-wrapper-h">
                <div class="heading">বিভাগের নোটিশ :</div>

                <ul class="news-ticker-h">
                    <li><?= get_notice(); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- notice end -->
<!-- footer start -->
<section class="footer">
    <p>সর্বস্বত্ব সংরক্ষিত ©<?= en2bnNumber(date('Y')); ?> জীবনজয়ী</p>

</section>
<!-- footer end -->


<script>
function toggleSearch() {
    let searchForm = document.querySelector(".serch-btn.unq");
    searchForm.classList.toggle("show");
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 5,
    spaceBetween: 5,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 5,
            spaceBetween: 5,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 5,
        },
        1024: {
            slidesPerView: 11,
            spaceBetween: 10,
        },
    },
});

document.getElementById("openModal").addEventListener("click", function() {
    document.getElementById("customModal").style.display = "flex";
});

document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("customModal").style.display = "none";
});

window.addEventListener("click", function(event) {
    if (event.target === document.getElementById("customModal")) {
        document.getElementById("customModal").style.display = "none";
    }
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#created_at').click(function() {
        $('#created_at').hide();
        $('#updated_at').show();
    });

    $('#updated_at').click(function() {
        $('#updated_at').hide();
        $('#created_at').show();
    });
});
</script>


</body>

</html>