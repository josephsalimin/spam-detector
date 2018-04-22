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
                        <h2 style="font-size: 0.8em">Created by:</h2>
                        <p style="color: #00A9E6; font-size: 1em; font-weight: bold; margin: 0">Joseph Salimin</p>
                        <p style="color: grey; font-size: 0.85em">13516037</p>
                        <p style="color: #00A9E6; font-size: 1em; font-weight: bold; margin: 0">Ahmad Fahmi P</p>
                        <p style="color: grey; font-size: 0.85em">13516139</p>
                        <p style="color: #00A9E6; font-size: 1em; font-weight: bold; margin: 0">I Kadek Yuda</p>
                        <p style="color: grey; font-size: 0.85em">13516115</p>
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