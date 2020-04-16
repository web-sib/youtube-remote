<?php

function get_request($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}

$result = get_request("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&key=AIzaSyBPH1DgOhtHRm2bJ0EPZJ8AafCnVzLfymE&id=UCiSTTltVQUgT4ge3FOQ5F0g");

$title = $result["items"][0]["snippet"]["title"];
$thumbnails = $result["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
$subcribe = $result["items"][0]["statistics"]["subscriberCount"];

$result1 = get_request("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCiSTTltVQUgT4ge3FOQ5F0g&maxResults=1&order=date&key=AIzaSyBPH1DgOhtHRm2bJ0EPZJ8AafCnVzLfymE");

$video_last = $result1["items"][0]["id"]["videoId"];
$title_video = $result1["items"][0]["snippet"]["title"];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="assets/vendor/font/css/all.min.css" rel="stylesheet" type="text/css">


    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed pb-3 pt-3">
        <a class="navbar-brand" href="#">Youtube <i class="fab fa-youtube fa-lg"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home</a>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col">
                        <h1 class="display-4">Hello, <?= $title; ?>!</h1>
                        <p class="lead">WEBSITE REMOTE YOUTUBE untuk memantau akun youtube anda.</p>
                    </div>
                </div>
                <div class="row border border-dark pb-2 pt-2 bg-dark text-white rounded">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="https://youtube.com/channel/UCiSTTltVQUgT4ge3FOQ5F0g" target="_blank">
                                    <img src="<?= $thumbnails; ?>" class="rounded-circle img-thumbnail" style="height: 80px; width: 80px;">
                                </a>
                            </div>
                            <div class="col-md-9 pl-0">
                                <div class="row">
                                    <div class="col">
                                        <h5> <?= $title; ?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="g-ytsubscribe" data-channelid="UCiSTTltVQUgT4ge3FOQ5F0g" data-layout="default" data-count="hidden"></div>
                                    </div>
                                    <div class="col-md-9">
                                        <p><?= $subcribe; ?> Subscribers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h5>VIDEO TERAKHIR YANG DIUPLOAD</h5>
                <div class="conainer mb-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://youtube.com/embed/<?= $video_last; ?>?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <h6><?= $title_video; ?></h6>
            </div>
        </div>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>