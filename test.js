(function($){
	'use strict';
	var locationHostArrayReverse = location.host.split('.').reverse();
	var locationHost = locationHostArrayReverse[1]+"."+locationHostArrayReverse[0];
	var sentence = $('.entry-content').text().replace(/girled/g, '');
	var params = {
		'sentence': sentence
	};
	$.fn.test = function() {
		var thisElem = $(this);
		$.ajax({
			url: 'http://'+locationHost+'/yahoo/keyphrase.php'
			,type: 'POST'
			,data: params
			,dataType: 'jsonp'
			,callback: 'callback'
			,timeout: 5000
		})
		.done(function(data, status) {
			$.each(data, function(i, val){
				thisElem.append('<div>'+i+' '+val+'</div>');
			});
		})
		.fail(function(XMLHttpRequest, textStatus, errorThrown) {
		})
		.always(function(XMLHttpRequest, textStatus) {
		})
		;
	}

})(jQuery);