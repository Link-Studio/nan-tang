<!doctype html>
<html>

<head>
    <?php include'_meta.php'; ?>
    <!--?php include'_schema.php'; ?-->
    <?php include'_gtag.php'; ?>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/will-show.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>

    </style>
</head>

<body>
    <!-- HTML -->
    <?php include'./inc/nav.html'; ?>
    <div class="container" style="margin-top:80px">
        <div class="row">
            <!-- <div class="card col-12 col-lg-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div> -->
        </div>

    </div>








    <!-- JS -->
    <script type="text/javascript" charset="utf-8" src="js/jquery-3.2.1.min.js"></script>
    <!--<script type="text/javascript" charset="utf-8" src="js/jquery.lazy.min.js"></script> -->
    <!--<script type="text/javascript" charset="utf-8" src="js/getUrlPara.js"></script> -->
    <script type="text/javascript" charset="utf-8" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/slick.min.js"></script>
    <!--<script type="text/javascript" charset="utf-8" src="js/AJAX-example.js"> </script>-->
    <!--<script type="text/javascript" charset="utf-8" src="js/form-check-function.js"></script>-->
    <script type="text/javascript" charset="utf-8" src="js/will-show.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/all.js"></script>


</body>
<script>
pageView('IG', 'instagram.php');



$(document).ready(function() {


    function getIGData(i) {
        $.getJSON("instagram.json", function(data) {
            // console.log(data);
            // console.log(data['instagram']);
            // console.log(data['instagram'].length);
            let omitscript=true;
            if(i==0){
                omitscript=false;
            }
            let apiUrl = 'https://api.instagram.com/oembed?url=https://www.instagram.com/p/' + data[
                'instagram'][i]['key']+'&omitscript='+omitscript;

            $.ajax({
                type: 'POST',
                data: {},
                url: apiUrl,
                dataType: 'json',
                async: false,
                beforeSend: function() {
                    // console.log('串接API中');
                },
                success: function(data) {
                    console.log(data);
                    // console.log('串接API成功');
                    console.log(data['html']);

                    $('.row').append(
                        '<div class="col-12 col-lg-3"></div><div class="col-12 col-lg-6">' +
                        data['html'] + '</div><div class="col-12 col-lg-3"></div> ');

                    // $('.row').append(
                    //     '<div class="card col-12 col-lg-3"> <img src="' + data[
                    //         'thumbnail_url'] +
                    //     '" class="card-img-top" alt="..."><div class="card-body"><p class="card-text">' +
                    //     data['title'] + '</p><a href="' + data['author_url'] +
                    //     '" class="btn btn-primary" target="_blank">到 Instagram 查看更多內容</a></div></div>'
                    // );
                },
                error: function() {
                    console.log('串接API失敗');
                },
                complete: function() {
                    //console.log('完成串接工作(不論失敗或成功)');
                }
            });
        });
    }

    for (i = 0; i < 4; i++) {
        getIGData(i);
    }


    // getIGData(0);
    // getIGData(1);


    // var j = 1;
    // $(window).scroll(function() {
    //     let SH = screen.height;
    //     let CH = document.body.clientHeight;
    //     let ST = document.documentElement.scrollTop;
    //     // console.log('screenHeight:'+ screen.height);
    //     // console.log('clientHeight:'+ document.body.clientHeight);
    //     // console.log('scrollTop:'+ document.documentElement.scrollTop);

    //     if (SH + ST >= CH) {
    //         j = j + 1;
    //         getIGData(j);
    //     }

    // });

});
</script>

</html>

