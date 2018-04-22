<!DOCTYPE html>

<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
?>

<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Spam Detector</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid" id="main">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <div id="about-us">
                        <div class="row title">
                            <h1>Twitter Spam Detector</h1>
                            <p>Aplikasi ini akan menandai tweet yang menurut anda spam berdasarkan keyword yang diberikan. Happy spam-marking~</p>
                        </div>
                        <br>
                        <div class="row author">
                            <div class="col">
                                <h1>Joseph Salimin</h1>
                                <p>DRPL + laporan tubes enthusiast</p>
                                <a href="http://www.josephsalimin.com/">josephsalimin.com</a>
                            </div>
                            <hr>
                            <div class="col">
                                <h1>I Kadek Yuda BP</h1>
                                <p>Currently studying Computer Science at Institut Teknologi Bandung. </p>
                                <a href="https://github.com/KadekYuda">Link Github</a>
                            </div>
                            <hr>
                            <div class="col">
                                <h1>Ahmad Fahmi P</h1>
                                <p>Front End + UI/UX enthusiast</p>
                                <a href="http://www.ahmadfahmi.me/">ahmadfahmi.me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">
                <div class="col-md-3 sidebar" >
                    <div class="box-default sidebar-part">
                        <div class="sub-sidebar">
                            <h1>Type your keyword</h1>
                            <input type="text" id="spam-text" placeholder="Input keyword">
                        </div>

                        <div class="sub-sidebar">
                            <h1>Choose the algorithm</h1>
                            <form method="get">
                            <select name="algo-opt" id="select">
                                <option value=<?php echo "KMP"?>>KMP</option>
                                <option value=<?php echo "Booyer-Moore"?>>Booyer-Moore</option>
                                <option value=<?php echo "Regex"?>>Regex</option>
                            </select>
                            </form>
                        </div>
                    </div>

                    <div class="box-default sidebar-part">
                        <h1 style="font-size: 1.5em; font-weight: bold">Twitter Spam Detector</h1>
                        <hr>
                        <button class="btn-apply" id="myBtn">About Us</button>
                    </div>
                </div>

                <div class="col-md-9" id="tweet">

                    <div class="box-default container" id="search">
                        <input type="text" id="search-text" placeholder="Search tweet...">
                        <button type="submit" class="btn-apply" id="btn-search" name="submit" onclick="get_result()">Search</button>
                    </div>

                    <div class="box-default" id="tweet-list"></div>
                </div>
            </div>
        </div>
    </body>

    <script src="../style/index.js" type="text/javascript">  </script>

</html>