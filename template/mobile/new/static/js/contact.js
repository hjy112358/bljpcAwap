$(function(){
    $(".contractCus").on("click",function(){
        $(".contact").removeClass("hidden");
    })

    $(".closeimg").on("click",function(){
        $(".contact").addClass("hidden");
    })


    $(document).on("click", ".battle", function () {
        $(".mark").removeClass("hidden")
    })

})