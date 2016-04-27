

jQuery(document).ready(function(){
	$(function(){
		$(".image-big img:eq(0)").nextAll().hide();
		$(".image-thumb img:eq(0)").addClass('selected');
		$(".image-thumb  img").click(function(e){
		      var index = $(this).index();
		      	$(".image-big img").eq(index).show().siblings().hide();
		      	$(this).addClass('selected').siblings().removeClass('selected');
				});
	});

	$('.dark-layer').hover(
       function(){ $(this).removeClass('sprite-shadow-box') },
       function(){ $(this).addClass('sprite-shadow-box') }
	)
	// Initiate BxSlider
	jQuery('.bxslider').bxSlider();

	// Initiate SlickNav
  	jQuery('#menu').slicknav();
  	
	// Initiate SlickNav for admin
  	

  	jQuery('#admin_top_menu').slicknav();
  	



   // Define Toggle Function on clicking
   $.fn.clickToggle = function(func1, func2) {
        var funcs = [func1, func2];
        this.data('toggleclicked', 0);
        this.click(function() {
            var data = $(this).data();
            var tc = data.toggleclicked;
            $.proxy(funcs[tc], this)();
            data.toggleclicked = (tc + 1) % 2;
        });
        return this;
    };



    //Small Resolution Slider at the Bottom of the Homepage
	jQuery('.next_small_res').click(
		next
	);
	jQuery('.prev_small_res').click(
		prev
	);
	function next() {
		var left_value = jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left');
		if( left_value != 0 ) {
			jQuery('.opportunities_row .width_full_small_res').css('left', '-190px');
			jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left', '0');
		}
		if( left_value == '0px' ) {
			jQuery('.opportunities_row .width_full_small_res').css('left', '0');
			jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left', '190px');
		}
	}
	function prev() {
		var left_value = jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left');
		if( left_value != 0 ) {
			jQuery('.opportunities_row .width_full_small_res').css('left', '-190px');
			jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left', '0');
		}
		if( left_value == '0px' ) {
			jQuery('.opportunities_row .width_full_small_res').css('left', '0');
			jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left', '190px');
		}
	}




	// Mobile Menu SELECT (Courses) clicking
	jQuery('.select_courses.small_res').clickToggle(show_select_content, hide_select_content);
	function show_select_content() {
		jQuery(this).parent().next().hide();
		jQuery(this).css({
			'background-color': '#116eb7',
			'background-position': '4% -34px'
		});
		jQuery(this).next().show();
	}
	function hide_select_content() {
		jQuery(this).parent().next().show();
		jQuery(this).css({
			'background-color': '#092c74',
			'background-position': '220px 0'
		});
		jQuery(this).next().hide();
	}


	// Mobile Menu Item Clicking
	jQuery('.slicknav_nav .menu_items > li > a').clickToggle(show_content, hide_content);
	function show_content() {
		jQuery(this).css('background-position', '15px -34px');
		jQuery(this).parent().siblings().hide();
		jQuery(this).parent().parent().prev().find('.select_courses.small_res').hide();
	}
	function hide_content() {
		jQuery(this).css('background-position', '220px 0');
		jQuery(this).parent().siblings().show();
		jQuery(this).parent().parent().prev().find('.select_courses.small_res').show();
	}


	// Scale dimensions on load
	jQuery(window).on('load', function() {
		// About processes page
		var process_pic_width = jQuery('.process_sprites .process_strategy_sprite').width();
		jQuery('.process_sprites .process_strategy_sprite').css('height', process_pic_width+20+'px');
		// About Strategy page
		var strategy_pic_width = jQuery('.pos_strategy').width();
		jQuery('.pos_strategy').css('height', strategy_pic_width+'px');
			// Markets Main page
		var markets_main_container_width = jQuery('.col-md-4 .markets_main_container .markets_sprite').width();
		jQuery('.col-md-4 .markets_main_container .markets_sprite').css('height', markets_main_container_width+'px');
			// Markets Top image
		var markets_main_container_width = jQuery('.markets_top_pos').width();
		jQuery('.markets_top_pos').css('height', markets_main_container_width/3.1+'px');
			// Markets Emblemmas
		var markets_main_container_width = jQuery('.energy_emblemma, .gov_reg_emblemma, .priv_comm_emblemma').width();
		jQuery('.energy_emblemma, .gov_reg_emblemma, .priv_comm_emblemma').css('height', markets_main_container_width+'px');
			// Relationships Top image
		var markets_main_container_width = jQuery('.relationships_top_pos').width();
		jQuery('.relationships_top_pos').css('height', markets_main_container_width/3.1+'px');
			// Relationships Main Links
		var markets_main_container_width = jQuery('.row.relationships_main .relationships_main_container .relationships_sprite').width();
		jQuery('.row.relationships_main .relationships_main_container .relationships_sprite').css('height', markets_main_container_width+'px');
			// Relationships Federal-State-International Sprites
		var markets_main_container_width = jQuery('.fed_state_int_row .relationships_sprite').width();
		jQuery('.fed_state_int_row .relationships_sprite').css('height', markets_main_container_width+'px');
			// Resources Tab Picture Width
		var resources_tab_pic_width = jQuery('.resources_pic_training').width();
		jQuery('.resources_pic_training, .resources_pic_consulting').css('height', resources_tab_pic_width+'px');

	});


	jQuery(window).on('resize', function() {

		// Go back to default settings on resize
			//Home page Opportunities
		if( jQuery(window).width() > 580 ) {
			jQuery('.opportunities_row .width_full_small_res').css('left', '0');
		}
		if( jQuery(window).width() <= 580 ) {
			jQuery('.opportunities_row .width_full_small_res+.width_full_small_res').css('left', '190px');
		}

		// Scale dimensions on Resize
			// About processes page
		var process_pic_width = jQuery('.process_sprites .process_strategy_sprite').width();
		jQuery('.process_sprites .process_strategy_sprite').css('height', process_pic_width+20+'px');
			// About Strategy page
		var strategy_pic_width = jQuery('.pos_strategy').width();
		jQuery('.pos_strategy').css('height', strategy_pic_width+'px');
			// Markets Main page
		var markets_main_container_width = jQuery('.col-md-4 .markets_main_container .markets_sprite').width();
		jQuery('.col-md-4 .markets_main_container .markets_sprite').css('height', markets_main_container_width+'px');
			// Markets Top image
		var markets_main_container_width = jQuery('.markets_top_pos').width();
		jQuery('.markets_top_pos').css('height', markets_main_container_width/3.1+'px');
			// Markets Emblemmas
		var markets_main_container_width = jQuery('.energy_emblemma, .gov_reg_emblemma, .priv_comm_emblemma').width();
		jQuery('.energy_emblemma, .gov_reg_emblemma, .priv_comm_emblemma').css('height', markets_main_container_width+'px');
			// Relationships Top image
		var markets_main_container_width = jQuery('.relationships_top_pos').width();
		jQuery('.relationships_top_pos').css('height', markets_main_container_width/3.1+'px');
			// Relationships Main Links
		var markets_main_container_width = jQuery('.row.relationships_main .relationships_main_container .relationships_sprite').width();
		jQuery('.row.relationships_main .relationships_main_container .relationships_sprite').css('height', markets_main_container_width+'px');
			// Relationships Federal-State-International Sprites
		var markets_main_container_width = jQuery('.fed_state_int_row .relationships_sprite').width();
		jQuery('.fed_state_int_row .relationships_sprite').css('height', markets_main_container_width+'px');
			// Resources Tab Picture Width
		var resources_tab_pic_width = jQuery('.resources_pic_training').width();
		jQuery('.resources_pic_training, .resources_pic_consulting').css('height', resources_tab_pic_width+'px');

	});


	// TABS Functionality
	jQuery(document).ready(function() {
	    jQuery('.tabs .tab-links a').on('click', function(e)  {
	        var currentAttrValue = jQuery(this).attr('href');

	        // Show/Hide Tabs
	        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

	        // Change/remove current tab to active
	        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

	        e.preventDefault();
	    });
	});



	// Courses Selection
	jQuery('.courses_option a').on('click', function() {
		if( jQuery('body').hasClass('courses_page') ) {

			var id_val = jQuery(this).attr('href').split('#');
			var current_tab = jQuery('.tabs ' + '#' + id_val[1]);

			jQuery(document).find('.tab-links ' + 'a[href="#' + id_val[1] + '"]').trigger('click');
			jQuery(document).find('.slicknav_btn.slicknav_open').trigger('click');
		}
	});

	jQuery('.select_courses option').on('click', function() {
		var url_append = jQuery(this).val();

		window.location.replace(url_append);

		var target = jQuery(this).val().split('#');
		jQuery(document).find('.tab-links ' + 'a[href="#' + target[1] + '"]').trigger('click');
		jQuery(this).siblings().attr('selected', '');
		// jQuery(document).find('.first_choice_text').attr('selected', 'selected');

	});

	jQuery(window).on('load', function() {
		var url = window.location.href.split('#');
		var current_tab = jQuery('.tabs ' + '#' + url[1]);

		jQuery(document).find('.tab-links ' + 'a[href="#' + url[1] + '"]').trigger('click');
	});


});
