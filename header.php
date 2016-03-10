<!doctype html>
<head <?php language_attributes(); ?>>

    <!-- Meta Tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="//www.google-analytics.com" rel="dns-prefetch">

    <?php $maha_options = get_option('curated'); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" media="screen and (min-width: 992px)"  href="http://myntra.myntassets.com/myx/stylesheets/headerfooter.min.b43cbd3442d2b0ae64968ebba7cccfa424308047.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php
    if ($maha_options['thefavicon'] != "" and is_array($maha_options['thefavicon'])) {
        echo "<link rel='icon' id='favicon' type='image/png' href='http://myntra.myntassets.com/skin1/icons/favicon.ico'>";
    }
    ?>

    <title>Look Good Digest</title>

    <!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<?php wp_head();?>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js?ver=1.11.2'></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-1752831-1']);
    _gaq.push(['_setDomainName', '.myntra.com']);

    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

<style type="text/css">
.menuOverlay {
    position: fixed;
    z-index: 0;
    height: 100%;
    width: 100%;
    background-color: hsla(0,0%,0%,0.5);
}

.menuOverlay.open {
    z-index: 9998;
}

.menu {
    position: fixed;
    left: -200px;
    width: 200px;
    /*height: 100%;*/
    z-index: 9999;
    background: white;
    padding-bottom: 10px;
    -webkit-transition: all 500ms ease-out;
    -moz-transition: all 500ms ease-out;
    -o-transition: all 500ms ease-out;
    transition: all 500ms ease-out;
}

.menu hr {
    margin: 0;
    width: 75%;
    border-color: #595858;
}

.menu.open {
    -webkit-transform: translateX(200px);
  -moz-transform:    translateX(200px);
  -ms-transform:     translateX(200px);
  -o-transform:      translateX(200px);
  transform:         translateX(200px);
}

.menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu ul li a {
    display: block;
    padding: 10px;
    padding-left: 30px;
    font-weight: 600;
}

.menuBtn {
    cursor: pointer;
    width: 15%;
    max-width: 75px;
    height: 40px;
    float: left;
    background: #E23129;
    padding: 7px;
    color: white;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    text-align: center;
}

#searchform input[type="text"] {
    width: 69%;
    height: 40px;
    float: left;
}

#searchform .search-button {
    width: 15%;
    max-width: 100px;
    height: 40px;
    padding: 6px;
    background: #e23129;
    color: white;
    float: left;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

.main-logo-ads-wrap {
    -webkit-box-shadow: none;
    box-shadow: none;
}

.lg-logo {
    display: block;
    text-align: center;
}

.burger-icon {
    width: 20px;
}

.up-up-child .post-box-big {
    background-color: #FFFFFF;
    padding-bottom: 10px;
    border-radius: 2px;
    padding-bottom: 1px;
    margin-bottom: 5px;
}

.feed-wrapper {
    padding-top: 5px;
    background-color: hsla(0,0%,0%,1);
}

</style>

</head>

<body <?php body_class(); ?>>

    <div id="body-maha" class="body-maha">

        <div class="menu">
            <ul>
                <li><a href="http://www.myntra.com/lookgood">Home<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/style-tips">Style Tips<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/trends">Trends<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/celeb-style">Celeb Styel<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/quizzes">Quiz<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/makeover">Makeover<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/vocab">Vocab<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/shoefie">Footwear Diaries<hr/></a></li>
                <li><a href="http://www.myntra.com/lookgood/street-style">Street Style<hr/></a></li>
            </ul>
        </div>

        <div class="menuOverlay"></div>

        <!-- START BODY BACKGROUND -->
        <div id='body-background'>

        <div id="off-canvas-body" class="off-canvas-body <?php echo $animati_on; ?>">

            <!-- START MAIN BAR -->
            <div class="main-topbar-wrapper">

            <div class="main-logo-ads-wrap">
                <a class="lg-logo" href="http://www.myntra.com/lookgood">
                    <img src="http://assets.myntassets.com/v1456213395/Lookgood/common/myntra-LG-logo.jpg" class="alignnone wp-image-80590" width="360" height="61">
                </a>
                <div class="main-logo-ads">

                    <!-- start container -->
                    <div class="container">
                        <div class="row <?php if ($maha_options['header_alignment'] == 'center') echo 'main-logo-center';?>">
                            <div class="col-sm-12">
                                <div id="main-ads" class="<?php if ($maha_options['header_alignment'] == 'center') echo 'main-ads-center';?>">


                                    <form action="<?php echo home_url(); ?>/" id="searchform" class="searchform" method="get">
                                        <div class="menuBtn"><img src="http://assets.myntassets.com/v1456213395/Lookgood/common/burger-icon.png" class="alignnone wp-image-80589 burger-icon" width="43" height="40"></div>
                                        <input type="text" id="s" name="s" placeholder="Search" autocomplete="off" />
                                        <button class="search-button"><i class="icon-search"></i></button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container -->

                </div>
            </div>
</div>

            <!-- START PAGE WRAPPER -->
            <div class="page-wrapper">
                