<!doctype html>
<html lang="fr">
<head>

    <title>test css</title>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
    <link rel="stylesheet" type="text/css" href="<?php echo $basedir ; ?>public/css/base.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://www.google.com/recaptcha/api.js?render=6LfJw4kUAAAAAEvPggQ8_9AfPXia3_vj1js_vjbv'></script>
</head>
<body>
<nav  id="myTopnav" class="topnav ">
    <a  href="<?php echo $basedir.$menu['lien1']; ?>"><?php echo $menu['page1']; ?></a>
    <a  href="<?php echo $basedir.$menu['lien2']; ?>"><?php echo $menu['page2']; ?></a>
    <a  href="<?php echo $basedir.$menu['lien3']; ?>"><?php echo $menu['page3']; ?></a>
    <a  href="<?php echo $basedir.$menu['lien4']; ?>"><?php echo $menu['page4']; ?></a>
    <a  href="<?php echo $basedir.$menu['lien5']; ?>"><?php echo $menu['page5']; ?></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</nav>
<div id="pg" class=" personnal_grid">

    <div id="pg1" class="pg_item pg_item_bg_1">
    </div>
    <div id="pg2" class="pg_item pg_item_bg_2">
    </div>
    <a href="<?php echo $basedir.$menu['lien1']; ?>" id="pg3" class="pg_item pg_item_bg_3">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo $menu['page1']; ?></h4>
                    <span>accroche</span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo $basedir.$menu['lien2'] ?>" id="pg4" class="pg_item pg_item_bg_4">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo $menu['page2']; ?></h4>
                    <span>accroche</span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo $basedir.$menu['lien3']; ?>" id="pg5" class="pg_item pg_item_bg_5">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo $menu['page3']; ?></h4>
                    <span>accroche</span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo $basedir.$menu['lien4']; ?>" id="pg6" class="pg_item pg_item_bg_6">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo $menu['page4']; ?></h4>
                    <span>accroche</span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo $basedir.$menu['lien5']; ?>" id="pg7" class="pg_item pg_item_bg_7">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo $menu['page5']; ?></h4>
                    <span>accroche</span>
                </div>
            </div>
        </div>
    </a>
</div>
    <section class="col-md-6 offset-md-6">
        <h1 class="col-md-12 text-center"><?php echo $title; ?></h1>
        <article id="contenu" class="col-md-12">
            <h2 class="titre_article">
                <?php echo $contenu['title']; ?>
            </h2>
            <div class="scene">
                <?php echo $contenu['media']; ?>
            </div>
            <p class="chapo">
                <?php echo $contenu['chapo']; ?>
            </p>
            <p class="content">
                <?php echo $contenu['content']; ?>
            </p>
            <span class="autor">
                <?php echo $contenu['author']; ?>
            </span>
            <span class="date">
                <?php echo $contenu['date_upd']; ?>
            </span>
        </article>
        <div class="col-12">
        <?php
        foreach($commentaires as $commentaire){
            echo '<div class="commentaire"><p>'.$commentaire['comment'].'</p><span class="add_info">Par : '.$commentaire['author'].' le '.$commentaire['date_add'].' </span></div>';

        }
        ?>
        </div>
        <?php
            if(!empty($_SESSION['username']) && !empty($_SESSION['adminId'])){
                ?>
                <form id="test" method="post" action="../createComment">
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <textarea class="form-control required" id="comment" name="comment" placeholder=""></textarea>
                    </div>
                    <input type="hidden" id="idc" name="idc" value="<?php echo $contenu['id']; ?>"/>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary" >Commenter</button>
                </form>
                <?php
            }
            else{
                ?>
                <form id="test" method="post" action="../controlAccess">

                    <div class="form-group">
                        <label for="login">Email</label>
                        <input type="text" class="form-control required" id="login" name="login" placeholder="Email" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="text" class="form-control required" id="password" name="password" placeholder="pass" value="">
                    </div>
                    <input type="hidden" id="idc" name="idc" value="<?php echo $contenu['id']; ?>"/>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary" >Connectez vous pour poster un commentaire</button>
                </form>
                <div><a href="../userAccount" title="Créer un compte">Créer un compte</a></div>
                <?php

            }
        ?>

       
        
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
        const x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
  </script>
</body>
</html>