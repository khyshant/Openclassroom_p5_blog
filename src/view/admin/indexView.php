<!doctype html>
<html lang="fr">
<head>

    <title>test css</title>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
    <link rel="stylesheet" type="text/css" href="<?php echo htmlentities($basedir) ; ?>public/css/base.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav  id="myTopnav" class="topnav ">
    <a  href="<?php echo htmlentities($menu['lien1']); ?>"><?php echo htmlentities($menu['page1']); ?></a>
    <a  href="<?php echo htmlentities($menu['lien2']); ?>"><?php echo htmlentities($menu['page2']); ?></a>
    <a  href="<?php echo htmlentities($menu['lien3']); ?>"><?php echo htmlentities($menu['page3']); ?></a>
    <a  href="<?php echo htmlentities($menu['lien4']); ?>"><?php echo htmlentities($menu['page4']); ?></a>
    <a  href="<?php echo htmlentities($menu['lien5']); ?>"><?php echo htmlentities($menu['page5']); ?></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</nav>
<div id="pg" class=" personnal_grid">

    <div id="pg1" class="pg_item pg_item_bg_1">
    </div>
    <div id="pg2" class="pg_item pg_item_bg_2">
    </div>
    <a href="<?php echo htmlentities($menu['lien1']); ?>" id="pg3" class="pg_item pg_item_bg_3">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page1']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo htmlentities($menu['lien2']) ?>" id="pg4" class="pg_item pg_item_bg_4">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page2']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo htmlentities($menu['lien3']); ?>" id="pg5" class="pg_item pg_item_bg_5">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page3']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo $menu['lien4']; ?>" id="pg6" class="pg_item pg_item_bg_6">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page4']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo htmlentities($menu['lien5']); ?>" id="pg7" class="pg_item pg_item_bg_7">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page5']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
</div>
    <section class="col-md-6 offset-md-6">
        <h1 class="col-md-12 text-center"><?php echo htmlentities($title); ?></h1>
        <div id="scene" class="col-md-12"><?php echo htmlentities($title); ?></div>
        <article id="contenu" class="col-md-12">
            <?php echo htmlentities($title); ?>
            <?php echo htmlentities($menu['page1']); ?>
        </article>

        
    </section>
    <button id="openNav" class="d-block"><i class="fa fa-eye"></i></button>
    <button id="closeNav"  class="d-none"><i class="fa fa-eye-slash"></i></button>
    <script>
    $( document ).ready(function() {
        $("#openNav").click(function(){
            $("#openNav").removeClass("d-block");
            $("#openNav").addClass("d-none"); 
            openNav() ;
            $("#closeNav").addClass("d-block");
            $("#closeNav").removeClass("d-none");
        });
        $("#closeNav").click(function(){
            $("#closeNav").removeClass("d-block");
            $("#closeNav").addClass("d-none");
             closeNav() ;
            $("#openNav").addClass("d-block");
            $("#openNav").removeClass("d-none");
        });
    });  
    
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
  </script>
</body>
</html>