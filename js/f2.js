$(function() {
    $(".mostPopular").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev"
    });
	
	$(".topRated").jCarouselLite({
        btnNext: ".next2",
        btnPrev: ".prev2"
    });
  $('a.tips').cluetip();

  $('#houdini').cluetip({
    splitTitle: '|', // use the invoking element's title attribute to populate the clueTip...
                     // ...and split the contents into separate divs where there is a "|"
    showTitle: false // hide the clueTip's heading
  });
});