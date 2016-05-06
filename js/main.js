$(function() {
    $('.articles_menu').slicknav();
});


function go_to_url_onclick(str) {
   $.ajax({
        type: "POST",
        
        url: str.getAttribute("href")
   }).done(function() {
        // What ever following the link does
            window.location.href=str.getAttribute("href")

   });
}

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

function check_url()
{
    var url = window.location.href;

    //check if  hash exists in url
    var res = url.match("pagina=[0-9]+");

    //if yes,get number from hash
    if(res)
    {
        var hash = window.location.hash;
        var has_nr=hash.match("[0-9]+");
        return has_nr;
    }
    else
    {
        return 1;
    }
}

function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}

function current_front_articles()
{
    var result= check_url();

    if(result!="" || result!='undefined' || typeof(result)!='undefined')
    {
        //result= parseInt(result);
        var prev_item =  result;
    }
    else
    {
        var prev_item  = 1;
    }

    if (prev_item > 0)
    {
        pagination_front_articles(prev_item);
    }


}

function pagination_front_articles(page_id)
{
    var url = window.location.href;

    //console.log(url);
    //console.log(window.location.hash);
    if (page_id)
    {
        //window.location.hash='pagina='+$("#"+page_id).attr('id');
        window.location.hash='pagina='+page_id;

    }
    //get all filter parameters
    var s_title = getUrlParameter('s_title');
    var s_short_title = getUrlParameter('s_short_title');
    var s_date_start = getUrlParameter('s_date_start');
    var s_date_end = getUrlParameter('s_date_end');
    var s_id = getUrlParameter('s_id');
    var s_category_id = getUrlParameter('s_category_id');
    var sort = getUrlParameter('sort');
    var filter = getUrlParameter('filter');

    if(filter=='undefined'){
        filter='article_id';
    }
    //console.log(window.location.hash);
    // return false;
    $("#loading").show();
    $("#list_results").hide();
    $.ajax({
        type: 'POST',
        url: '/ajax/show-articles.php',
        data: 'pageId='+ page_id        
        ,
        success: function(response)
        {
            $("#list_results").html(response);
            $(".list_pagination li a").removeClass("curent_item").addClass("pagination_item");
            $(".list_pagination li").removeClass("curent_item");
            $("#"+page_id).removeClass("pagination_item").addClass("curent_item");
            $("#"+page_id+"botom").removeClass("pagination_item").addClass("curent_item");

            $("#loading").hide();
            $("#list_results").show();

        }
    });
}




function prev_front_articles()
{
    var result= check_url();

    if(result!="" || result!='undefined' || typeof(result)!='undefined')
    {
        //result= parseInt(result);
        var prev_item =  result-1;
    }
    else
    {
        var prev_item  = 0;
    }

    if (prev_item >= 0)
    {
        pagination_front_articles(prev_item);
    }


}


function next_front_articles()
{
    var result= check_url();

    if(result!="" || result!='undefined' || typeof(result)!='undefined')
    {
        result=parseInt(result);
        var next_item =result+1;
        var last_page= $('.last_item').html();
        last_page=parseInt(last_page);

        if(next_item>last_page)
        {
            next_item=last_page;

        }
    }
    else
    {
        var next_item  = 0;
    }
    if (result <= last_page ) {
        pagination_front_articles(next_item);
    }


}

	jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});