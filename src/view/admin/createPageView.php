<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>test css</title>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
<link rel="stylesheet" type="text/css" href="<?php echo htmlentities($basedir) ; ?>public/css/base.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



  <title>Titre de la page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<nav  id="myTopnav" class="topnav ">
    <a  href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien1']); ?>"><?php echo htmlentities($menu['page1']); ?></a>
    <a  href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien2']); ?>"><?php echo htmlentities($menu['page2']); ?></a>
    <a  href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien3']); ?>"><?php echo htmlentities($menu['page3']); ?></a>
    <a  href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien4']); ?>"><?php echo htmlentities($menu['page4']); ?></a>
    <a  href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien5']); ?>"><?php echo htmlentities($menu['page5']); ?></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</nav>
<div id="pg" class=" personnal_grid">

    <div id="pg1" class="pg_item pg_item_bg_1">
    </div>
    <div id="pg2" class="pg_item pg_item_bg_2">
    </div>
    <a href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien1']); ?>" id="pg3" class="pg_item pg_item_bg_3">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page1']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien2']) ?>" id="pg4" class="pg_item pg_item_bg_4">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page2']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien3']); ?>" id="pg5" class="pg_item pg_item_bg_5">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page3']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo $basedir.'/admin/'.$menu['lien4']; ?>" id="pg6" class="pg_item pg_item_bg_6">
        <div class="pg_mask">
            <div href="#" class="inner-wrap">
                <div class="pg_item-content pg_item-inner">
                    <h4> <?php echo htmlentities($menu['page4']); ?></h4>
                    <span></span>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo htmlentities($basedir.'/admin/'.$menu['lien5']); ?>" id="pg7" class="pg_item pg_item_bg_7">
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
        <h1 class="col-md-12 text-center"><?php echo $title; ?></h1>
        <article id="contenu" class="col-md-12">
            <h2 class="titre_article"> </h2>
                <?php
                if(isset($add_a_page))
                {
                    ?>
                    <form id="test" method="post" action="addPage">
                    <?php
                    ;}
                ?>
                <?php
                if(isset($add_a_post))
                {
                    ?>
                        <form id="test" method="post" action="addPost">
                    <?php
                    ;}
                ?>
                    <div class="form-group">
                        <label for="lastname">title</label>
                        <input type="text" class="form-control required" id="title" name="title" placeholder="titre">
                    </div>
                <?php
                if(isset($add_a_page))
                    {
                ?>
                    <div class="form-group">
                        <label for="function">function</label>
                        <select name="function" id="function" class="form-control required">
                            <option value="" selected> </option>
                            <option value="showHome">Accueil</option>
                            <option value="seeBlog">Blog</option>
                            <option value="seeCompetence">Compétences</option>
                            <option value="seePortfolio">Portfolio</option>
                            <option value="seeMe">Présentation</option>
                            <option value="mention">Mentions légales</option>
                        </select>
                    </div>
                <?php
                    ;}
                ?>
                    <div class="form-group">
                        <label for="chapo">chapo</label>
                        <textarea class="form-control required" id="chapo" name="chapo" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">content</label>
                        <textarea class="form-control required" id="content" name="content" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">meta_title</label>
                        <textarea class="form-control required" id="meta_title" name="meta_title" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">meta_description</label>
                        <textarea class="form-control required" id="meta_description" name="meta_description" placeholder=""></textarea>
                    </div>
                    <?php
                    if(isset($add_a_post))
                    {
                    ?>
                        <div class="form-group">
                            <label for="comment_auth">comment_auth</label>
                            <input type="checkbox"  id="comment_auth" name="comment_auth" >
                        </div>
                    <?php
                        ;}
                    ?>

                    <div class="form-group">
                        <label for="activate">Actif</label>
                        <input type="checkbox"  id="activate" name="activate" >
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Lc5a40UAAAAALZnQK1jAgrQXZkQmmuUO-dmqf5W"></div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary" >Enregistrez vous</button>
                </form>



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

        $('#title').summernote(
            {
                enterHtml: 'Saisissez ici votre chapo et mettez le en page',
            }
        );
        $('#content').summernote(
            {
                placeholder: 'Saisissez ici votre contenu et mettez le en page Pas d\'image',
            }
        );
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