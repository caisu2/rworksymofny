$(document).ready(function(){

    $.getJSON('link.json', function(jd) {
        /*$('#stage').html('<p> Name: ' + jd.name + '</p>');
        $('#stage').append('<p>Age : ' + jd.age+ '</p>');
        $('#stage').append('<p> Sex: ' + jd.sex+ '</p>');*/

        var i,x = "";
        for (i = 0; i < jd.link.length; i++) {
            //x += myTemplate.link[i] + "<br>";

            x += "<li><a href='" + jd.link[i] + "'>" + jd.link[i] + "</a></li>";
        }
        $(".v-sidebar ul").html(x);

        $(".v-sidebar li a").click(function(vt){
            vt.preventDefault();
            $(".intro").hide();
            window.open($(this).attr("href"));
            /*$(".template-box").html("<iframe src='" + $(this).attr("href") + "' frameborder='0'></iframe>");

            $(".screen-set").show();
            $(".download-page-bt").show();
            $(".close-frame-bt").show();

            $(".download-page-bt").attr("href", $(this).attr("href"));

            $(".v-sidebar li").removeClass("active");
            $($(this).parent()).addClass("active");*/
        });

        $(".v-navbar h3").text(jd.projectName);
        $(".intro .text h1").text(jd.projectName);
        $(".intro .text p").text(jd.summary);
    });


    $(".screen-set, .download-page-bt, .close-frame-bt").hide();
    $(".burger").click(function(b){
        b.preventDefault();
        $(".v-sidebar").toggleClass("show");
        $(".v-master").toggleClass("sidebar-on");
    });

    $(".close-frame-bt").click(function(cfb){
        cfb.preventDefault();
        $(".v-master").toggleClass("frame-on");
        $($(this).children()).toggleClass("fa-times fa-caret-down");
        $(".v-sidebar").removeClass("show");
        $(".v-master").removeClass("sidebar-on");
    });

    $(".close-frame-bt").hide();
    $("#start").click(function(s){
        s.preventDefault();
        $(".v-master").addClass("frame-on sidebar-on");
        $(".v-sidebar").addClass("show");
    });

    

    $(".scr-size-selector li a").click(function(sss){
        sss.preventDefault();

        $(".scr-size-selector li a").removeClass("active");
        $(this).addClass("active");

        if($(".rotate-screen").hasClass("rotate")){
            
            $(".template-box").css({"width": $(".scr-size-selector li a.active").attr("data-height") , "height": $(".scr-size-selector li a.active").attr("data-width")});
        }else{
           
            $(".template-box").css({"width": $(".scr-size-selector li a.active").attr("data-width") , "height": $(".scr-size-selector li a.active").attr("data-height")});
        }

        if($(this).hasClass("default-view")){
            $(".template-box").removeClass("resized");    
        }else{
            $(".template-box").addClass("resized");
        }

        $(".scr-size-selector span").html($(this).text() + "<i class='fa fa-caret-down'>");
    });

    $(".rotate-screen").click(function(){
        
        if($(this).hasClass("rotate")){
            
            $(".template-box").css({"width": $(".scr-size-selector li a.active").attr("data-width") , "height": $(".scr-size-selector li a.active").attr("data-height")});
        }else{
           
            $(".template-box").css({"width": $(".scr-size-selector li a.active").attr("data-height") , "height": $(".scr-size-selector li a.active").attr("data-width")});
        }
        $(this).toggleClass("rotate");
    });

    
    

});