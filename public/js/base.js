function openNav() {
    //    $("#pg1").slideDown("slow", function(){
    //        $("#pg2").slideDown("slow", function(){
    $("#pg3").slideDown("slow", function(){
        $("#pg4").slideDown("slow", function(){
            $("#pg5").slideDown("slow", function(){
                $("#pg6").slideDown("slow", function(){
                    $("#pg7").slideDown("slow", function(){
                        $("#pg8").slideDown("slow", function(){
                        })
                    })
                })
            })
        })
    })
    //        })
    //    })
}
function closeNav() {
    //    $("#pg1").slideUp("slow", function(){
    //        $("#pg2").slideUp("slow", function(){
    $("#pg3").slideUp("slow", function(){
        $("#pg4").slideUp("slow", function(){
            $("#pg5").slideUp("slow", function(){
                $("#pg6").slideUp("slow", function(){
                    $("#pg7").slideUp("slow", function(){
                        $("#pg8").slideUp("slow", function(){
                        })
                    })
                })
            })
        })
    })
    //        })
    //    })
}
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function verifName(){
    var valid = false;
    var elem = $("#firstname").val;
    if(elem.length > 0 ){
        console.log('ok');
        $("#firstname").addClass("success");
    }

}