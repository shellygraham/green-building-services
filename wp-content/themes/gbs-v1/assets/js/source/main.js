
(function($) {

	// all Javascript code goes here
	$h = $('.stac').height()*($('.stac').length-1);
	//alert($h);

	if($('.quotes > div').length > 0) {
		$('.quotes').slick({
			arrows:false,
			autoplaySpeed: 12000,
			autoplay: true
		});
	}

	if($('.gallery').length>0) {
		$('.gallery').slick({
			arrows: false,
			dots: true
		});
	}
	if($('.wpcf7-form-control-wrap.inquiry').length>0) {
		$('.wpcf7-form-control-wrap.inquiry .wpcf7-list-item.first input[type=radio]').prop('checked',true);
	}

	if($('.page-services').length>0) {
		// $('.page-services .tuc').hide();
		// $('.page-services .bucket .trig').on('click',function() {
		// 	$(this).next().slideToggle();
		// });
	}

	$('.row.grid.default a.btn.trig').on('click',function(e) {
		e.preventDefault();
		$('.row.grid.default').removeClass('default');
	});

		$('#site-calendar').fullCalendar({

			// THIS KEY WON'T WORK IN PRODUCTION!!!
			// To make your own Google API key, follow the directions here:
			// http://fullcalendar.io/docs/google_calendar/
			googleCalendarApiKey: 'AIzaSyAKMY04MBDUEljUTqpMiFA5bF01BOdbj6E',//'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
			events: {
				googleCalendarId: 'gbsinc.pdx@gmail.com',
				className: 'gcal-events'
			}
			/*
			// US Holidays
			events: 'usa__en@holiday.calendar.google.com',
			
			eventClick: function(event) {
				// opens events in a popup window
				window.open(event.url, 'gcalevent', 'width=700,height=600');
				return false;
			},
			
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
			*/
		});

	if($('body.home').length>0) {
		var $tar = $('.stac'),
	//	$stge = $('#content, footer'),
		co = 0,
		proc = false;
	//	$('#home nav#main').show();
	//	$stge.hide();

		for(i=0;i<$tar.length;i++) {
			//alert($tar.eq(i).offset().top);
		}

		function adVnc() {
			//var $tar = $('.wrap');
			var $t = $tar.eq(co);
			//$t.css('background','green');
			//console.log('count is '+co);
			if($t.length>0) {
				$t = $t.offset().top;
				$c = 500;

				//alert($t);

		        $('html,body').stop(true,true).animate({ 	//.site-content .roll 
		          scrollTop: $t
		        }, $c);

	    	} else {
	    	//	$('.aro').fadeOut();
	    		/*clearInterval($james);
	    		
	    		$('.open-crawl').fadeOut(function() {
	    			$('.full-s.lead').hide();
	    			$('html,body').scrollTop(0);
	    			$('#desktop-bridge .logo').removeClass('light');
	    			$('#desktop-bridge .logo span.light').hide();
	    			$('nav#main li.menu-item-396,nav#main li.menu-item-385').addClass('current_page_item current-menu-item');


					//trigger_quotes();   			

					console.log( window.location.href );  // whatever your current location href is
					window.history.pushState( {} , 'strategy', '/strategy/' );
					console.log( window.location.href );  // oh, hey, it replaced the path with /foo


	    			$stge.fadeIn();
					trigger_quotes();
	    		});
	    		

	    		$(document).off();*/

	    	}
		}

		// I detect keystrokes, literally the down-press
		$(document).off().keydown(function(e) {
			// keys used to do things, now they don't
			e.preventDefault();
		// we connect the flip action to the key release
		}).keyup(function(e) {
			// increment global counter down, call adVnc()
			if(e.keyCode==38 || e.keyCode==37) {
				co --; 	adVnc(); 		}
			// increment global counter up, call adVnc()
			if(e.keyCode==40 || e.keyCode==32 || e.keyCode==13 || e.keyCode==39) {
				co ++; 	adVnc(); 		}
			// whatever key is pressed, pass the value to the console
			console.log('keyup called with '+e.keyCode);
		});/*.scroll( function(){ 
			
		});*/

		// on page click, increment global counter up, call adVnc()
		$tar.off().on('click',function() {
				co = $(this).index();
				co ++;
			//	clearInterval($james);
			if(proc==false) {
				adVnc();
			}
		});
	}


		$('.aro').on('click', function() {
			co++;
		//	alert(co);
			adVnc();
		});
		$('.menu-toggle').on('click',function() {
			$('.site-header').toggleClass('on');
		});
	
	var $dD = $('.service-categories select option');
	if($dD.length>0) {
		$dD.removeAttr( "selected" );
	}

	/*	$('#home section.layer.full-s.lead .logo>a').on('click', function(e) {
			e.preventDefault();
		});

		$('#home section.layer.full-s p + a').on('mouseenter', function() {
			proc = true;
			clearInterval($james);
		}); */

		//var $james = setInterval(function(){ co++; adVnc(); }, 3000);

})(jQuery);
