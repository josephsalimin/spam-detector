function get_result() {
	// Converting spaces in string into %20
	var search_text = $("#search-text").val();
	var search_text_list = search_text.split(" ");
	search_text = "";
	for (var i=0; i<search_text_list.length; i++) {
		search_text += search_text_list[i];
		if(i < search_text_list.length - 1) {
			search_text += "%20";
		}
	}

	var filter_method = $("#select").find(":selected").text();
	var spam_text = $("#spam-text").val();

	var url = "tweet_api.php?" + "search_text=" + search_text + "&filter_method=" + filter_method + "&spam_text=" + spam_text;

	$.get(url, function(data, status){
		show_tweets(data);
	});
}

function show_tweets(data_received) {
	var data = JSON.parse(data_received);
	var response = data["response"];

	$('#tweet-list').empty();

	for (var i=0; i<response.length; i++) {
		var tweet = response[i];
		var tweet_single = document.createElement("div");
		var spam_tag = document.createElement("div");
		var tweet_section = document.createElement("div");
		var tweet_content = document.createElement("div");
		var tweet_names = document.createElement("div");
		var tweet_uname = document.createElement("h2");
		var tweet_name = document.createElement("h1");

		// Create image
		var tweet_image = document.createElement("div");
		var image = document.createElement("img");
	    image.setAttribute("src", tweet["profile_img"]);
	    image.setAttribute("width", "50");
	    image.setAttribute("height", "50");
	    tweet_image.append(image);

		tweet_single.className = "tweet-single";
		tweet_section.className = "col-md-10 tweet-section";

		// Tweet usernames
		tweet_names.className = "tweet-names";
		tweet_name.className = "tweet-name";
		tweet_uname.className = "tweet-uname";
		tweet_name.innerHTML = tweet["name"];
		tweet_uname.innerHTML = "@" + tweet["screen_name"];
		tweet_names.append(tweet_name);
		tweet_names.append(tweet_uname);

		// Divs inside tweet-section
		tweet_content.className = "col-md-11 tweet-content";
		tweet_image.className = 'col-md-1 tweet-image';

		if (tweet["is_match"] === true) {
			spam_tag.className = "col-md-2 spam-tag spam-true";
			spam_tag.innerHTML = "Spam";
		} else {
			spam_tag.className = "col-md-2 spam-tag spam-false";
			spam_tag.innerHTML = "Not Spam";
		}
		
		var p = document.createElement("p");
		p.innerHTML = tweet["string"];
		tweet_content.append(tweet_names);
		tweet_content.append(p);
		tweet_section.append(tweet_image);
		tweet_section.append(tweet_content);
		tweet_single.append(spam_tag);
		tweet_single.append(tweet_section);
		$('#tweet-list').append(tweet_single);
	}

}