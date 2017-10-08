<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Winsoft Garment International</title>

    <link href="<?=base_url()?>assets/common/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="<?=base_url()?>assets/common/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="<?=base_url()?>assets/common/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="<?=base_url()?>assets/common/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="<?=base_url()?>assets/common/img/favicon.png" rel="icon" type="image/png">
    <link href="<?=base_url()?>favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="<?=base_url()?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/cleanhtmlaudioplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendors/chartist/dist/chartist.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/common/css/source/main.css">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="<?=base_url()?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/tether/dist/js/tether.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/spin.js/spin.js"></script>
    <script src="<?=base_url()?>assets/vendors/ladda/dist/ladda.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
    <script src="<?=base_url()?>assets/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script>
    <script src="<?=base_url()?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/summernote/dist/summernote.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/nestable/jquery.nestable.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="<?=base_url()?>assets/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="<?=base_url()?>assets/vendors/d3/d3.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/c3/c3.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/chartist/dist/chartist.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="<?=base_url()?>assets/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="<?=base_url()?>assets/vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/hackertyper/hackertyper.js"></script>
    <script src="<?=base_url()?>assets/vendors/jquery-countTo/jquery.countTo.js"></script>

    <!-- Clean UI Scripts -->
    <script src="<?=base_url()?>assets/common/js/common.js"></script>
    <script src="<?=base_url()?>assets/common/js/demo.temp.js"></script>
</head>
<body class="theme-default">

<section class="page-content">
<div class="page-content-inner" style="background-image: url(assets/common/img/temp/login/4.jpg)">

    <!-- Login Page -->
    <div class="single-page-block-header">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="javascript: history.back();">
                        <img src="<?=base_url()?>assets/common/img/logo.png" alt="Clean UI Admin Template" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                
            </div>
        </div>
    </div>
    <div class="single-page-block">
        <div class="single-page-block-inner effect-3d-element">
            <div class="blur-placeholder"><!-- --></div>
            
            <div class="single-page-block-form">
                
                <h3 class="text-center">
                    <i class="icmn-enter margin-right-10"></i>
                    Login Form
                </h3>
                <br />
                <?php
                if(isset($notifmsg)){?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong><?=$notifmsg?></strong>
                </div>    
                <?php } ?>
                <form method="POST">
                    <div class="form-group">
                        <input id="validation-email"
                               class="form-control"
                               placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input id="validation-password"
                               class="form-control password"
                               name="password"
                               type="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary width-150" name="login" value="Sign In" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="single-page-block-footer text-center">
    </div>
    <!-- End Login Page -->

</div>

<!-- Page Scripts -->
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Add class to body for change layout settings
        $('body').addClass('single-page single-page-inverse');

        // Set Background Image for Form Block
        function setImage() {
            var imgUrl = $('.page-content-inner').css('background-image');

            $('.blur-placeholder').css('background-image', imgUrl);
        };

        function changeImgPositon() {
            var width = $(window).width(),
                    height = $(window).height(),
                    left = - (width - $('.single-page-block-inner').outerWidth()) / 2,
                    top = - (height - $('.single-page-block-inner').outerHeight()) / 2;


            $('.blur-placeholder').css({
                width: width,
                height: height,
                left: left,
                top: top
            });
        };

        setImage();
        changeImgPositon();

        $(window).on('resize', function(){
            changeImgPositon();
        });

        

        if (!cleanUI.hasTouch) {
            $('body').mousemove(rotation);
        }

    });
</script>
<!-- End Page Scripts -->
</section>

<div class="main-backdrop"><!-- --></div>

</body>
</html>