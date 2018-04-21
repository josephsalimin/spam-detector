<?php
# Import
# phpinfo();

ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

# Read the file
function read_file($file) {
	$handle = fopen($file, "r");
	$key = array();
	if ($handle) {
		while(($line = fgets($handle)) != false) {
			$key[] = trim($line);
		}
	}
	return $key;
}

function get_tweets($url, $settings, $search_text) {
	$get_field = '?q=#' . $search_text . "&count=10";
	$req_method = 'GET';

	$twitter = new TwitterAPIExchange($settings);
	$response = $twitter->setGetfield($get_field)
    ->buildOauth($url, $req_method)
    ->performRequest();

    $resp_json = json_decode($response, true);
    $array = $resp_json['statuses'];

    $res = array();

    foreach ($array as $key => $value) {
    	# code...
    	$res[] = array(
    		'text' => $value['text'],
    		'profile_img' => $value['user']['profile_image_url']
    	);
    }

    $res = array(
    	'response' => $res
    );

    # Tambahin ini
    # print_r($res);
    return $res;
}

function get_filter_spam($texts, $spam_text, $filter_method) {
	# Encode to JSON
	$content = json_encode($texts);
	$url = "localhost:4040/tweepy";

	# Setup Curl
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
	
	$result = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	# echo $result;
	return $result;
	#echo json_encode($result);
}

# Get the data
$spam_text = isset($_GET['spam_text']) ? $_GET['spam_text'] : '';
$search_text = isset($_GET['search_text']) ? $_GET['search_text'] : '';
$filter_method = isset($_GET['filter_method']) ? $_GET['filter_method'] : '';

# Setting the key
$keys = read_file("key.txt");
# Set the url and settings
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$settings = array (
	'consumer_key' => (string) $keys[0],
	'consumer_secret' => (string) $keys[1],
	'oauth_access_token' => (string) $keys[2],
	'oauth_access_token_secret' => (string) $keys[3]
);

$res = get_tweets($url, $settings, $search_text);
# Add to res
$res['method'] = $filter_method;
$res['spam_text'] = $spam_text;

$final_results = get_filter_spam($res, $spam_text, $filter_method);

echo json_encode($final_results);
?>