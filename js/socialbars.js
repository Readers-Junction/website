$(document).ready(function() {
	
	// ["Label" , "website link" , "bar color" , "bar image"]
	var social = [
	 ["aim", 		"http://www.aim.com/", 		"#ffd900", "images/socialbar/aim.png"],
//	 ["behance", 	"http://www.behance.net/", 	"#1769ff", "images/socialbar/behance.png"],
	 ["digg", 		"http://digg.com/", 		"#2e9fff", "images/socialbar/digg.png"],
//	 ["dribbble", 	"http://dribbble.com/", 	"#8aba56", "images/socialbar/dribbble.png"],
//	 ["ember", 		"#", 						"#3fc380", "images/socialbar/ember.png"],
	 ["evernote", 	"https://evernote.com/", 	"#5ba525", "images/socialbar/evernote.png"],
	 ["facebook", 	"http://fb.com", 			"#3B5998", "images/socialbar/facebook.png"],
	 ["flickr", 	"https://www.flickr.com/", 	"#0063dc", "images/socialbar/flickr.png"],
//	 ["forrst", 	"http://forrst.com/", 		"#5b9a68", "images/socialbar/forrst.png"],
	 ["google+", 	"http://google.com", 		"#dd4b39", "images/socialbar/google_plus.png"],
//	 ["github", 	"http://github.com", 		"#171515", "images/socialbar/github.png"],
//	 ["last-fm", 	"http://www.last.fm/",  	"#c3000d", "images/socialbar/last-fm.png"],
	 ["linkedin", 	"https://www.linkedin.com/","#0e76a8", "images/socialbar/linkedin.png"],
//	 ["paypal", 	"https://www.paypal.com", 	"#1e477a", "images/socialbar/paypal.png"],
//	 ["rss", 		"http://postrss.com/", 		"#ee802f", "images/socialbar/rss.png"],
	 ["sharethis", 	"http://www.sharethis.com/","#96bf48", "images/socialbar/sharethis.png"],
//	 ["skype", 		"http://www.skype.com", 	"#00aff0", "images/socialbar/skype.png"],
	 ["tumblr", 	"https://www.tumblr.com/", 	"#34526f", "images/socialbar/tumblr.png"],
	 ["twitter", 	"https://twitter.com/", 	"#55acee", "images/socialbar/twitter.png"],
//	 ["vimeo", 		"https://vimeo.com/", 		"#44bbff", "images/socialbar/vimeo.png"],
	 ["wordpress", 	"http://wordpress.com#", 	"#d54e21", "images/socialbar/wordpress.png"],
	 ["yahoo", 		"https://www.yahoo.com/", 	"#720e9e", "images/socialbar/yahoo.png"],
//	 ["youtube", 	"http://youtube.com", 		"#c4302b", "images/socialbar/youtube.png"],
//	 ["zerply", 	"http://zerply.com/", 		"#9dcc7a", "images/socialbar/zerply.png"]
	 ];

////////////////////////////////////////////////	
//// DO NOT EDIT ANYTHING BELOW THIS LINE! /////
////////////////////////////////////////////////
		
	$("#socialside").append('<ul class="mainul"></ul>');
	
	/// generating bars
	for(var i=0;i<social.length;i++){	
	 				$(".mainul").append('<li><ul class="scli" style="background-color:'+social[i][2]+'"><li><img src="'+social[i][3]+'" />'+social[i][0]+'</li></ul></li>');
	 				}
			
	/// bar click event
	$(".scli").click(function(){
		var link = $(this).text();		
		for(var i=0;i<social.length;i++){
			if(social[i][0] == link){
				window.open(social[i][1]);
			}
		}		
	});
	
	/// mouse hover event
	$(".scli").mouseenter(function() {	
		$(this).stop(true);	
		$(this).clearQueue();
			$(this).animate({
				left : "-140px"
			}, 300);
				
	});

	/// mouse out event
	$(".scli").mouseleave(function(){
		$(this).animate({
			left:"0px"
		},700,'easeOutBounce');
	});

});
