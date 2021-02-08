<style>
    .two-tittle{
        opacity: 0;
        transition: opacity 1s;
    }
    .two-btn-1{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.2s;
    }
    .two-btn-2{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
    .two-btn-3{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.6s;

    }
    .two-btn-4{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.8s;

    }
    .two-btn-5{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1s;

    }
    .two-btn-6{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1.2s;
    }
    .two-btn-7{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1.4s;

    }
</style>
<div class="section-two">
    <div class="container section-two-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-5 two-tittle">
                    <div class="col-md-12">
                        <h1 class="text-center section-content-header">Untuk Siapa Layanan Ini?</h1>
                    </div>
                </div>
                <div class="row mb-md-3 justify-content-center">
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-1" disabled>
                            Pemerintah Pusat
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-2" disabled>
                            Pemerintah Daerah
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-3" disabled>
                            BUMN
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-4" disabled>
                            BUMD
                        </button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-5" disabled>
                            BLU
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-6" disabled>
                            BLUD
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-7" disabled>
                            Penyedia
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
    const checkpoint = 500;
    let opacity = 0;

    window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll >= checkpoint && opacity < 1) {
        opacity = 1; 
    } 

    document.querySelector(".two-tittle").style.opacity = opacity;
    document.querySelector(".two-btn-1").style.opacity = opacity;
    document.querySelector(".two-btn-2").style.opacity = opacity;
    document.querySelector(".two-btn-3").style.opacity = opacity;
    document.querySelector(".two-btn-4").style.opacity = opacity;
    document.querySelector(".two-btn-5").style.opacity = opacity;
    document.querySelector(".two-btn-6").style.opacity = opacity;
    document.querySelector(".two-btn-7").style.opacity = opacity;
    });
</script>