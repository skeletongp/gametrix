<div class="max-w-7xl mx-auto overflow-hidden ">
  <h1 class="text-xl md:text-2xl font-bold text-center text-white mb-3 uppercase">
    {{isset($title)?$title:'Elemento sin título'}}
  </h1>

  <div class="carousel ">
    <div class="slider ">
        <!-- CSS -->
        <!-- JavaScript -->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        {{ $slot }}
    </div>
</div>
</div>
@push('js')
    <script>
        (function($) {
            $(function() {
                var slider = $(".slider").flickity({
                    imagesLoaded: true,
                    percentPosition: false,
                    prevNextButtons: false, //true = enable buttons
                    initialIndex: 3,
                    pageDots: false, //true = enable dots
                    groupCells: 1,
                    selectedAttraction: 0.2,
                    friction: 0.8,
                    draggable: true
                });

                //this enables clicking on cards
                slider.on(
                    "staticClick.flickity",
                    function(event, pointer, cellElement, cellIndex) {
                        if (typeof cellIndex == "number") {
                            slider.flickity("selectCell", cellIndex);
                        }
                    }
                );

                //this resizes the cards and centers the carousel because it tends to move a few pixels to the right if .resize() and .reposition() aren't used
                var flkty = slider.data("flickity");
                flkty.selectedElement.classList.add("is-custom-selected");
                flkty.resize();
                flkty.reposition();
                let time = 0;

                function reposition() {
                    flkty.reposition();
                    if (time++ < 10) {
                        requestAnimationFrame(reposition);
                    } else {
                        $(".flickity-prev-next-button").css("pointer-events", "auto");
                    }
                }
                requestAnimationFrame(reposition);

                //this expands the cards when in focus
                flkty.on("settle", () => {
                    $(".card").removeClass("is-custom-selected");
                    $(".flickity-prev-next-button").css("pointer-events", "none");
                    flkty.selectedElement.classList.add("is-custom-selected");

                    let time = 0;

                    function reposition() {
                        flkty.reposition();
                        if (time++ < 10) {
                            requestAnimationFrame(reposition);
                        } else {
                            $(".flickity-prev-next-button").css("pointer-events", "auto");
                        }
                    }
                    requestAnimationFrame(reposition);
                });

                //this reveals the carousel
                $(".carousel").addClass("animation-reveal");
                $(".carousel").css("opacity", "0");
                flkty.resize();
                flkty.reposition();
                setTimeout(() => {
                    $(".carousel").removeClass("animation-reveal");
                    $(".carousel").css("opacity", "1");
                    flkty.resize();
                    flkty.reposition();
                    let time = 0;

                    function reposition() {
                        flkty.reposition();
                        if (time++ < 10) {
                            requestAnimationFrame(reposition);
                        }
                    }
                    requestAnimationFrame(reposition);
                }, 1000);
            });
        })(jQuery);
    </script>
@endpush
<style>
    
    * {
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
    }
    body{
     
    }
    .carousel {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
        opacity: 0;
    }

    .carousel.animation-reveal {
        animation: reveal 1s cubic-bezier(0.77, 0, 0.175, 1);
    }

    @keyframes reveal {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .card {
        margin: 0 1rem;
        overflow: hidden;
        box-shadow: 0 10px 20px 0 rgba(0, 0, 35, 0.25);
        border-radius: 8px;
        height: 200px;
        width: 200px;
        display: block;
        background-position: 50%;
        background-size: cover;
        cursor: pointer;
        transition: width 0.16s ease-in-out, height 0.16s ease-in-out;
    }

    .card.is-custom-selected {
        width: 250px;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-bg {
        height: 100%;
        width: 100%;
        background-position: center;
        background-size: cover;
    }

    .flickity-enabled {
        position: relative;
    }

    .flickity-enabled:focus {
        outline: none;
    }

    .flickity-viewport {
        position: relative;
        height: 100%;
    }

    .flickity-slider {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        width: 100%;
        height: 100%;
    }

</style>
