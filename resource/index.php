<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Spam Detector</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container-fluid" id="main">
            <div class="container" id="content">
                <div class="box-default col-md-3" id="sidebar">
                    <div class="sub-sidebar">
                        <h1>Type your keyword</h1>
                        <input type="text" placeholder="Input keyword">
                    </div>
                    <div class="sub-sidebar">
                        <h1>Choose the algorithm</h1>
                        <select name="algo-opt" id="select">
                            <option value="kmp">KMP</option>
                            <option value="boyer">Boyer-Moore</option>
                            <option value="regex">Regex</option>
                        </select>
                    </div>
                    <div class="sub-sidebar">
                        <button class="btn-apply" id="btn-algo">Apply Changes</button>
                    </div>
                </div>
                <div class="col-md-9" id="tweet">
                    <div class="box-default container" id="search">
                        <input type="text" placeholder="Search tweet...">
                        <button class="btn-apply" id="btn-search">Search</button>
                    </div>
                    <div class="box-default" id="tweet-list">
                        <div class="tweet-single">
                            <div class="spam-tag">
                                spam
                            </div>
                            <div class="tweet-content">
                                <div>

                                </div>
                            </div>
                        </div>
                        <div class="tweet-single">
                            <div class="spam-tag">
                                spam
                            </div>
                            <div class="tweet-content">
                                <div class="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="index.js" type="text/javascript">
        
    </script>
</html>