let opacity = [0, 0, 0, 0, 0, 0];
var width = screen.width,
    height = screen.height;
console.log(width, height);
window.addEventListener("load", () => {
    document.querySelector(".h-sect1").style.opacity = 1;
    document.querySelector(".p-sect1").style.opacity = 1;
    document.querySelector(".h-sect1").style.left = 0;
    document.querySelector(".p-sect1").style.left = 0;
    document.querySelector(".sect1imgtag").style.top = "-175px";
    if (height > 720 && width > 1280) {
        document.querySelector(".sect1imgtag").style.height = "1050px";
        document.querySelector(".sect1imgtag").style.left = "-120px";
    } else {
        document.querySelector(".sect1imgtag").style.left = "-275px";
    }
    document.querySelector(".sect1imgtag").style.opacity = 1;
    document.querySelector(".right").style.opacity = 1;
});

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    console.log(currentScroll);
    if (currentScroll >= 400) {
        if (opacity[0] == 0) {
            opacity[0] = 1;
            document.querySelector(".two-tittle").style.opacity = 1;
            document.querySelector(".two-btn-1").style.opacity = 1;
            document.querySelector(".two-btn-2").style.opacity = 1;
            document.querySelector(".two-btn-3").style.opacity = 1;
            document.querySelector(".two-btn-4").style.opacity = 1;
            document.querySelector(".two-btn-5").style.opacity = 1;
            document.querySelector(".two-btn-6").style.opacity = 1;
            document.querySelector(".two-btn-7").style.opacity = 1;
            document.querySelector(".sect2imgtag").style.opacity = 1;
            document.querySelector(".sect2imgtag").style.right = 0;
        }
    }

    if (currentScroll >= 1050) {
        if (opacity[1] == 0) {
            opacity[1] = 1;
            document.querySelector(".three-img").style.opacity = 1;
            document.querySelector(".three-p-2").style.opacity = 1;
            document.querySelector(".three-p-1").style.opacity = 1;
        }
    }

    if (currentScroll >= 1900) {
        if (opacity[2] == 0) {
            opacity[2] = 1;
            document.querySelector(".four-tittle").style.opacity = 1;
            document.querySelector(".four-btn-1").style.opacity = 1;
            document.querySelector(".four-btn-2").style.opacity = 1;
            document.querySelector(".four-btn-3").style.opacity = 1;
            document.querySelector(".four-btn-4").style.opacity = 1;
            document.querySelector(".four-btn-5").style.opacity = 1;
            document.querySelector(".four-btn-6").style.opacity = 1;
            document.querySelector(".four-btn-7").style.opacity = 1;
            // document.querySelector(".radialImg1").style.opacity = 1;
        }
    }

    if (currentScroll >= 2400) {
        if (opacity[3] == 0) {
            opacity[3] = 1;
            document.querySelector(".five-tittle").style.opacity = 1;
            document.querySelector(".five-btn-1").style.opacity = 1;
            document.querySelector(".five-btn-2").style.opacity = 1;
            document.querySelector(".five-btn-3").style.opacity = 1;
            document.querySelector(".five-btn-4").style.opacity = 1;
            document.querySelector(".five-btn-5").style.opacity = 1;
        }
    }

    if (currentScroll >= 3200) {
        if (opacity[4] == 0) {
            opacity[4] = 1;
            document.querySelector(".six-tittle").style.opacity = 1;
            document.querySelector(".six-btn-1").style.opacity = 1;
            document.querySelector(".six-btn-2").style.opacity = 1;
            document.querySelector(".six-btn-3").style.opacity = 1;
            document.querySelector(".six-btn-1").style.left = 0;
            document.querySelector(".six-btn-2").style.left = 0;
            document.querySelector(".six-btn-3").style.left = 0;
            // document.querySelector(".radialImg2").style.opacity = 1;
        }
    }

    if (currentScroll >= 4200) {
        if (opacity[5] == 0) {
            opacity[5] = 1;
            // document.querySelector(".radialImg2").style.opacity = 1;
        }
    }
});
