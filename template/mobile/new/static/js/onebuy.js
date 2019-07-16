$(function () {
    // 今日推荐
    var myNav = new Swiper('#nav', {
        spaceBetween: 10,
        slidesPerView: 5,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        on: {
            tap: function () {
                myPage.slideTo(myNav.clickedIndex)
            }
        }
    })
    var myPage = new Swiper('#page', {
        on: {
            slideChangeTransitionStart: function () {
                updateNavPosition()
            }
        }
    })
    function updateNavPosition() {
        $('#nav .active-nav').removeClass('active-nav');
        var activeNav = $('#nav .swiper-slide').eq(myPage.activeIndex).addClass('active-nav');
        if (!activeNav.hasClass('swiper-slide-visible')) {
            if (activeNav.index() > myNav.activeIndex) {
                var thumbsPerNav = Math.floor(myNav.width / activeNav.width()) - 1
                myNav.slideTo(activeNav.index() - thumbsPerNav)
            }
            else {
                myNav.slideTo(activeNav.index())
            }
        }
    }
    
    navbox(1)
    navbox(2)
    navbox(3)
    navbox(4)
    navbox(5)
    navbox(6)
    navbox(7)
    navbox(8)
    navbox(9)
    navbox(10)
    navbox(11)
    navbox(12)
    navbox(13)
    navbox(14)
    navbox(15)
    navbox(16)
    navbox(17)
    navbox(18)
    navbox(19)

    function navbox(id){
        var myNav= new Swiper('#nav'+id, {
            spaceBetween: 10,
            slidesPerView: 5,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            on: {
                tap: function () {
                    myPage.slideTo(myNav.clickedIndex)
                }
            }
        })
        var myPage = new Swiper('#page'+id, {
            on: {
                slideChangeTransitionStart: function () {
                    updateNavPosition()
                }
            }
        })
        function updateNavPosition() {
            $('#nav'+id+' .active-nav').removeClass('active-nav');
            var activeNav = $('#nav'+id+' .swiper-slide').eq(myPage.activeIndex).addClass('active-nav');
            if (!activeNav.hasClass('swiper-slide-visible')) {
                if (activeNav.index() > myNav.activeIndex) {
                    var thumbsPerNav = Math.floor(myNav.width / activeNav.width()) - 1
                    myNav.slideTo(activeNav.index() - thumbsPerNav)
                }
                else {
                    myNav.slideTo(activeNav.index())
                }
            }
        }
    
    }

    
  

})