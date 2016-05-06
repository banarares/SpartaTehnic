//fix CKEditor in a Bootstrap Modal? 
if(typeof $.fn.modal != 'undefined') {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
        modal_this = this
        $(document).on('focusin.modal', function (e) {
            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                // add whatever conditions you need here:
                &&
                !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus()
            }
        })
    };
}

$(document).ready(function()
{   

    // Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}

    $("#filter").submit(function(event) { 

      /* stop form from submitting normally */
      event.preventDefault();

      /* get some values from elements on the page: */
       var $form = $( this ), url = $form.attr( 's_name' );

      // Send the data using post
        var page_id = 1;
        var s_name = $('input[name=s_name]').val();
        var s_email = $('input[name=s_email]').val();
        var s_ip = $('input[name=s_ip]').val();
        var s_date_start = $('input[name=s_date_start]').val();
        var s_date_end = $('input[name=s_date_end]').val();
        var s_user_id = $('input[name=s_user_id]').val();
        var s_usergroup = $('select[name=s_usergroup]').val();
        var filter = $('input[name=filter]').val(); 
        var sort = $('input[name=sort]').val();
        var type = $('input[name=type]').val();
        
      var posting = $.post( url, { s_name: $('input[name=s_name]').val(), s_email: $('input[name=s_email]').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
 
                if(s_date_start == "" || s_date_end == ""  || (s_date_end !=="" && s_date_start !=="" && s_date_start <= s_date_end))
                {
                
                     window.location.href = '?action=admin-users&'
                     +'pageId='+ page_id                
                    +"&s_user_id="+s_user_id
                    +"&type="+type
                    +"&sort="+sort
                    +"&filter="+filter
                    +"&s_name="+s_name
                    +"&s_ip="+s_ip
                    +"&s_email="+s_email
                    +"&s_date_start="+s_date_start
                    +"&s_date_end="+s_date_end                
                    +"&s_usergroup="+s_usergroup; // admin or regular_user 
                
                }
                else
                {
                    alert('The start date must be less or equal with the end date. Please check the start date and the end date. Thank you');                
                }          
            
            
        
        });
    });


    //pagination_usergroups(1);
    

    $("#filter_usergroup").submit(function(event) {
       
      /* stop form from submitting normally */
      event.preventDefault();
 
      /* get some values from elements on the page: */
      var $form = $( this ), url = $form.attr( 's_name' );

        // Send the data using GET
        var page_id = 1;
        var s_id = $('input.search_user_id').val();
        var s_name = $('input[name=s_name]').val();
        var s_date_start = $('input[name=s_date_start]').val();
        var s_date_end = $('input[name=s_date_end]').val();
        var s_usergroup = $('select[name=s_usergroup]').val();
        var s_description = $('input[name=s_description]').val();
        var filter = $('input[name=filter]').val(); 
        var sort = $('input[name=sort]').val();

       
      var posting = $.get( url, { s_name: s_name } );

      /* Alerts the results */
      posting.done(function( data ) {

        $(s_id).val(s_id);
        $(s_name).val(s_name);
        $(s_description).val(s_description);
        $(sort).val(sort);
        $(filter).val(filter);      
    


        if(s_date_start == "" || s_date_end == ""  || (s_date_end !=="" && s_date_start !=="" && s_date_start <= s_date_end))
        {

            window.location.href = '?action=admin-usergroup'
            +'&pageId='+ page_id
            +'&s_id='+ s_id
            +"&s_name="+s_name                       
            +"&s_description="+s_description // admin or regular_user
            +"&sort="+sort
            +"&filter="+filter
            +"&s_date_start="+s_date_start
            +"&s_date_end="+s_date_end;
             
        }else{
            alert('The start date must be less or equal with the end date. Please check the start date and the end date. Thank you');
        }

        });
    });

    $("#filter_articles").submit(function(event) {
       
      /* stop form from submitting normally */
      event.preventDefault();
 
      /* get some values from elements on the page: */
      var $form = $( this ), url = $form.attr( 's_name' );

        // Send the data using GET
        var page_id = 1;
        var s_id = $('input[name=s_id]').val();
        var s_title = $('input[name=s_title]').val(); 
        var s_short_title = $('input[name=s_short_title]').val();
        var s_category_id = $('select[name=s_category_id]').val();
        var s_date_start = $('input[name=s_date_start]').val();
        var s_date_end = $('input[name=s_date_end]').val();
        var s_status = $('select[name=s_status]').val();
        var filter = getUrlParameter('filter');
        


        var sort = getUrlParameter('sort');
       
      var posting = $.get( url, { s_title: s_title, filter: filter } );

      /* Alerts the results */
      posting.done(function( data ) {

        $(s_id).val(s_id);
        $(s_title).val(s_title);
        $(s_short_title).val(s_short_title);
        $(s_category_id).val(s_category_id);
        $(sort).val(sort);
        $(filter).val(filter);
        $(s_status).val(s_status);

        if(s_date_start == "" || s_date_end == ""  || (s_date_end !=="" && s_date_start !=="" && s_date_start <= s_date_end))
        {
            if(filter == 'undefined' || filter == ''){
                filter = 'article_id';
            }
            if(s_status == 'undefined' || s_status == ''){
                s_status = '';
            }          

            window.location.href = '?action=admin-articles'
            +'&pageId='+ page_id
            +'&s_id='+ s_id
            +"&s_title="+s_title                       
            +"&s_short_title="+s_short_title           
            +"&s_category_id="+s_category_id           
            +"&sort="+sort           
            +"&filter="+filter           
            +"&s_date_start="+s_date_start
            +"&s_date_end="+s_date_end
            +"&s_status="+s_status;
             
        }else{
            alert('The start date must be less or equal with the end date. Please check the start date and the end date. Thank you');
        }

        });
    });

    $("#filter_categories").submit(function(event) {
       
      /* stop form from submitting normally */
      event.preventDefault();
 
      /* get some values from elements on the page: */
      var $form = $( this ), url = $form.attr( 's_name' );

        // Send the data using GET
        var page_id = 1;
        var s_id = $('input[name=s_id]').val();
        var s_name = $('input[name=s_name]').val();
        var status = $('select[name=status]').val();
        var s_date_start = $('input[name=s_date_start]').val();
        var s_date_end = $('input[name=s_date_end]').val();
        
        var filter = getUrlParameter('filter');
        var sort = getUrlParameter('sort');
       
      var posting = $.get( url, { s_name: s_name } );

      /* Alerts the results */
      posting.done(function( data ) {

        $(s_id).val(s_id);
        $(s_name).val(s_name);
        $(sort).val(sort);
        $(filter).val(filter);      

 
        if(s_date_start == "" || s_date_end == ""  || (s_date_end !=="" && s_date_start !=="" && s_date_start <= s_date_end))
        {

            window.location.href = '?action=admin-categories'
            +'&pageId='+ page_id
            +'&s_id='+ s_id
            +"&s_name="+s_name                       
            +"&status="+status           
            +"&sort="+sort           
            +"&filter="+filter           
            +"&s_date_start="+s_date_start
            +"&s_date_end="+s_date_end;
             
        }else{
            alert('The start date must be less or equal with the end date. Please check the start date and the end date. Thank you');
        }

        });
    });

    $("#filter_assets").submit(function(event) {
       
      /* stop form from submitting normally */
      event.preventDefault();
 
      /* get some values from elements on the page: */
      var $form = $( this ), url = $form.attr( 's_name' );

        // Send the data using GET
        var page_id = 1;
        var s_asset_id = $('input[name=s_asset_id]').val();
        var s_name = $('input[name=s_name]').val();
        var s_description = $('input[name=s_description]').val();
        var s_date_start = $('input[name=s_date_start]').val();
        var s_date_end = $('input[name=s_date_end]').val();
        var s_file_type = $('select[name=s_file_type]').val();
        var s_description = $('input[name=s_description]').val();
        
        var filter = $('input[name=filter]').val(); 
        var sort = $('input[name=sort]').val();
       
      var posting = $.get( url, { s_name: s_name, s_description: s_description } );

      /* Alerts the results */
      posting.done(function( data ) {

        $(s_asset_id).val(s_asset_id);
        $(s_name).val(s_name);
        $(s_description).val(s_description);
        $(sort).val(sort);
        $(s_file_type).val(s_file_type);
        $(filter).val(filter);      

 
        if(s_date_start == "" || s_date_end == ""  || (s_date_end !=="" && s_date_start !=="" && s_date_start <= s_date_end))
        {

            window.location.href = '?action=admin-assets'
            +'&pageId='+ page_id
            +'&s_asset_id='+ s_asset_id
            +"&s_name="+s_name                       
            +"&s_description="+s_description // admin or regular_user
            +"&sort="+sort           
            +"&filter="+filter           
            +"&s_file_type="+s_file_type
            +"&s_date_start="+s_date_start
            +"&s_date_end="+s_date_end;
             
        }else{
            alert('The start date must be less or equal with the end date. Please check the start date and the end date. Thank you');
        }

        });
    });

    //#filter_usergroups
    $("#filter_assets_browse").submit(function(event) {
       
      /* stop form from submitting normally */
      event.preventDefault();
 
      /* get some values from elements on the page: */
      var $form = $( this ), url = $form.attr( 's_name' );

        // Send the data using GET
        var page_id = 1;
        var s_asset_id = $('input[name=s_asset_id]').val();
        var s_name = $('input[name=s_name]').val();
        var s_description = $('input[name=s_description]').val();
        var s_date_start = $('input[name=s_date_start]').val();
        var s_date_end = $('input[name=s_date_end]').val();
        var s_file_type = $('select[name=s_file_type]').val();
        var s_description = $('input[name=s_description]').val();
        
        var filter = $('input[name=filter]').val(); 
        var sort = $('input[name=sort]').val();

        var source = getUrlParameter('source');
        var type = getUrlParameter('type');
        var input_file_url = getUrlParameter('input_file_url');
        var CKEditor = $('input[name=CKEditor]').val();
        var CKEditorFuncNum = $('input[name=CKEditorFuncNum]').val();
 
      var posting = $.get( url, { s_name: s_name, s_description: s_description } );

      /* Alerts the results */
      posting.done(function( data ) {

        $(s_asset_id).val(s_asset_id);
        $(s_name).val(s_name);
        $(s_description).val(s_description);
        $(sort).val(sort);
        $(s_file_type).val(s_file_type);
        $(filter).val(filter);      
  
 
        if(s_date_start == "" || s_date_end == ""  || (s_date_end !=="" && s_date_start !=="" && s_date_start <= s_date_end))
        {

            window.location.href = '?pageId='+ page_id
            +'&source='+ source
            +'&type='+ type
            +'&input_file_url='+ input_file_url
            +'&s_asset_id='+ s_asset_id
            +"&s_name="+s_name                       
            +"&s_description="+s_description // admin or regular_user
            +"&sort="+sort           
            +"&filter="+filter           
            +"&s_file_type="+s_file_type
            +"&s_date_start="+s_date_start
            +"&CKEditor="+CKEditor
            +"&CKEditorFuncNum="+CKEditorFuncNum
            ;
             
        }else{
            alert('The start date must be less or equal with the end date. Please check the start date and the end date. Thank you');
        }

        });
    });
   


        //When the dropdown changes
    $('#course_qty').change(function() {
        //copy the input
        input = $('.user_bf_input').eq(0).clone();
        //empty the input_area
        $('.input_area').empty();
        //add the right number of inputs
        for (var i=0; i < $(this).val(); i++) {
            $( input ).clone().appendTo( ".input_area" );
        }
    });

    //when each input changes
    $('input[name=s_name]').on('change', 'input', function() {
        //create an array to hold the names
        var names = new Array();
        //loop through each input
        $('.input_area input').each(function() {
            //add each value to the array
            names.push($(this).val());
        })
        
        //concatenate the names with a Pipe (|)
        listOfNames = names.join('|');
        
        //update your hidden field
        $('#hiddenNames').val(listOfNames);
    });

    //up and down sorter
    $('.sort a').click(function(e) {
    var $this = $(this);

    // Turn 'selected' class on/off
    if ($this.hasClass('selected')) return false;
    $this.parents('.sort-set').find('.selected').removeClass('selected');
    $this.addClass('selected');

    var key = $('.sortKey a.selected').attr('data-option-value');
    var order = $('.sortOrder a.selected').attr('data-option-value');

    var valBy = key + '_' + order; // For instance name_asc
    var valAscending = (order == "asc"); // true for 'asc', false otherwise

    $("#container").isotope({sortBy : valBy, sortAscending : valAscending});

    return false;
    });

    // end of sorter

    //START Date Picker Start Date
    var start_date = '#datepicker_start';
    var end_date = '#datepicker_end';


    $(start_date).datepicker({

      showButtonPanel: true,
      changeYear: true,
      changeMonths: true
      
    });

    $(start_date).focus(function(){
        $(start_date).datepicker('show');

    });

    $(start_date).click(function(){
        $(start_date).datepicker('show');
    });
    //END Date Picker Start Date

    //START Date Picker End Date
    $(end_date).datepicker({

      showButtonPanel: true,
      changeYear: true,
      changeMonths: true
      
    });

    $(end_date).focus(function(){
        $(end_date).datepicker('show');
    });

    $(end_date).click(function(){
        $(end_date).datepicker('show');
    });   
    //END OF Date Picker End Date





$( "#get_search_form" ).click(function() {
  $( ".search_wrapper" ).slideToggle( "slow" );
});

    $('#admin_top_menu li').on('click', function(e)
    {
        e.preventDefault();
        urlString = $(this).find("a").attr('href');
        //check if li a has an url in href
        if (urlString.indexOf('http://') === 0 || urlString.indexOf('https://') === 0)
        {
            location.href=urlString;
        }
    });
    $('#admin_top_menu li a').on('click', function(e)
    {
        e.preventDefault();
    });


    //find if is need it to toggle articles for a menu or not
    var article_menu_action = getUrlParameter('toggle_action');

    //console.log(article_menu_action);

    if(typeof article_menu_action != 'undefined' &&  article_menu_action == 'toggle_articles')
    {
        hash =  window.location.hash;

        //console.log(hash);

        menu_id=hash.match("[0-9]+");

        //console.log(menu_id);

        if ($("#"+menu_id+"_menu_section").length) {
            $('html,body').animate({
                scrollTop: $("#"+menu_id+"_menu_section").offset().top
            });
        }

        $("#"+menu_id+"_menu_tr_holder span.glyphicon-list-alt").removeClass("disabled");
        $("#"+menu_id+"_articles").hide();
        toggle_articles(menu_id);
        $("#"+menu_id+"_menu_tr_holder span.glyphicon-plus-sign").parent().hide();
    }


    function upload(){
        var fileIn = $("#fileToUpload")[0];
        //Has any file been selected yet?
        if (fileIn.files === undefined || fileIn.files.length == 0) {
            alert("Please select a file");
            return;
        }

        //We will upload only one file in this demo
        var file = fileIn.files[0];

        var data = new FormData();
        $.each($('#fileToUpload')[0].files, function(i, file) {
            data.append('file-'+i, file);
        });

        console.log(data);
        //Show the progress bar
        $("#progressbar").show();
        // return false;

        public_name = $("#public_name").val();
        file_description = $("#file_description").val();
        file_type = $("#file_type").val();
        $.ajax({
            url: "/admin-1000/ajax/assets_uploader.php?public_name=" + public_name + "&file_description=" +file_description + "&file_type=" +file_type,
            type: "POST",
            data: data,
            processData: false, //Work around #1
            cache: false,
            contentType: false,
            dataType: "json",
            success: function(response){
                $("#progressbar").hide();
                if (response.message != 'ok') {
                    $("#asset_error_message").html(response.message).show();
                }
                else
                {
                    if (response.warning != '') {
                        $("#asset_error_message").html(response.warning).show();
                        setTimeout(function () {
                            window.location = "/admin-1000/?action=admin-assets";
                        }, 4000);
                    }
                    else
                    {
                        window.location = "/admin-1000/?action=admin-assets";
                    }

                }
                console.log(response.message);
                //
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //alert("Failed");
                $("#asset_error_message").html(errorThrown).show();
            },
            //Work around #3
            xhr: function() {
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress',showProgress, false);
                } else {
                    console.log("Uploadress is not supported.");
                }
                return myXhr;
            }
        });

        return false;
    }

    function showProgress(evt) {
        if (evt.lengthComputable) {
            var percentComplete = (evt.loaded / evt.total) * 100;
            $('#progressbar').progressbar("option", "value", percentComplete );
        }
    }

    if ($("#upload_btn").length > 0) {
        $("#progressbar").progressbar();
        $("#progressbar").hide();
        $("#upload_btn").click(upload);
    }


    if ( $("#icons-legend").length) {
        var newTitle = $("#icons-legend").html();

        $('.tooltip_trigger').tooltip();
        $('.tooltip_trigger').attr('data-original-title', newTitle);


    }

    //check if exist parameter: menu_level and default open that section
    var menu_level = getUrlParameter('menu_level');
    if (menu_level)
    {
        $('#level_'+menu_level+'_menu').show();
    }

    /* Search */
    $(".ic-search").click(function () {
        if($('.filter_holder').hasClass("activ"))
        {
            var action = getUrlParameter('action');
            var url =  window.location.href.replace( /[\?#].*|$/, "" );

           // console.log(url);
            window.location = url+"?action="+action;
        }
        else
        {
            $(".filter_holder").slideToggle("slow");
            $(".filter_holder form").find("input[type=text], textarea, select").val("");
            $(this).toggleClass("activ");
        }

    });

    /* End Search */

    $('#clear_all_trigger').on('click', function(e)
    {
        if (confirm('Esti sigur ca vrei sa stergi toate erorile?'))
        {
            $.ajax({
                url: '/admin-1000/ajax/clear-error.php',
                type: 'GET',
                cache: false,
                success: function(result) {
                    window.location = "/admin-1000/?action=admin-errors";
                }
            });
        }
        else
        {
            return false;
        }

    });

    $('#new_file_trigger').click(function()
    {
        $('#form_files').slideToggle();
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

/* ADMINISTRATORS sections */

function current_admins()
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
        pagination_users(prev_item,'admin');
    }


}




function pagination_users(page_id,type)
{


    var url = window.location.href;

    //console.log(url);
    //console.log(window.location.hash);
    if (page_id)
    {
        //window.location.hash='pagina='+$("#"+page_id).attr('id');
        if (page_id > 0 ) {
            window.location.hash='pagina='+page_id;
        }

    }

    //get all filter parameters
    var s_name = getUrlParameter('s_name');
    var s_email = getUrlParameter('s_email');
    var s_ip = getUrlParameter('s_ip');
    var s_date_start = getUrlParameter('s_date_start');
    var s_date_end = getUrlParameter('s_date_end');
    var s_user_id = getUrlParameter('s_user_id');
    var s_usergroup = getUrlParameter('s_usergroup');
    var filter = getUrlParameter('filter');
    var sort = getUrlParameter('sort');
    //var s_type = getUrlParameter('s_type');
    //var q_search = getUrlParameter('q');
    //console.log(window.location.hash);
    // return false;
    $("#loading").show();
    $("#list_results").hide();
        /* attach a submit handler to the form */

    $.ajax({
        type: 'GET',
        url: '/admin-1000/ajax/show-users.php',
        data: 'pageId='+ page_id+
        "&type="+type+
        "&sort="+sort+
        "&filter="+filter+
        "&s_name="+s_name+
        "&s_user_id="+s_user_id+
        "&s_email="+s_email+
        "&s_ip="+s_ip+
        "&s_date_start="+s_date_start+
        "&s_date_end="+s_date_end+
        "&s_usergroup="+s_usergroup, // admin or regular_user

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



function prev_users(type)
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");

        if(type)
        {
            switch(type)
            {
                case 'admin':
                case 'users':
                    break;
            }

        }
        else
        {
            type="admin";
        }

        pagination_users(prev_item,type);
    }


}


function next_users(type)
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");

        if(type)
        {
            switch(type)
            {
                case 'admin':
                case 'users':
                    break;
            }

        }
        else
        {
            type="admin";
        }

        pagination_users(next_item,type);
    }


}

function admin_item(user_id, action_type, event)
{
    event.preventDefault();
    $.ajax({
        url: '/admin-1000/ajax/get_user_form.php?user_id='+user_id+'&action_type='+action_type,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (action_type == 'add')
            {
                $("#userModalLabel").html('Add administrator');
            }
            else
            {
                $("#userModalLabel").html('Edit administrator');
            }
            $("#userModal #frm_modal_btn").removeAttr("onclick");
            $("#userModal #frm_modal_btn").off("click");
            $("#userModal #frm_modal_btn").on("click", function () {
                save_admin('frm_admin');
            });
            $("#userModalBody").html( result.modal_body );
        }
    });
    $('#userModal').modal('show');
}

function save_admin(form_id)
{

    $.ajax({
        url: '/admin-1000/ajax/save_user.php',
        type: 'POST',
        data: $('#'+form_id).serialize(),
        cache: false,
        dataType:'json',
        success: function(result) {
            if (result.response == 'ok') {
                window.location = window.location.href.split("?")[0]+'?action=admin-users';
            }
            else
            {
                $("#userModalBody #error_message").html(result.response );
            }
        }
    });
}
function delete_admin(user_id)
{
    if (user_id == 1)
    {
        alert('First administrator can NOT be deleted!');
        return false;
    }
    if (confirm('Are you sure you want to delete the administrator?'))
    {
        $.ajax({
            url: '/admin-1000/?action=admin-delete_user&user_id='+user_id,
            type: 'GET',
            cache: false,
            success: function(result) {
                window.location = "/admin-1000/?action=admin-users";
            }
        });
    }
    else
    {
        return false;
    }

}

/**/

function pagination_errors(page_id,no_of_page)
{
    window.location.hash='pagina='+page_id;
    $("#loading").show();

    var initial = 0;

    $.ajax({
        type: 'GET',
        url: '/admin-1000/ajax/errors_pagination.php',
        data: 'pageId='+ page_id+"&initial="+initial,
        dataType: "json",
        success: function(response)
        {
            //$("#list_results").after(response);
            console.log(response.errors_results_body);
            //  $("#paginare_bottom").before(response.errors_results_body);

            $('#errors_table > tbody').append(response.errors_results_body);

            no_of_page = response.no_of_page;

            if (page_id != no_of_page)
            {
                next_page = parseInt(page_id) + parseInt(1);
                $("#more_results").attr("onclick", "pagination_errors("+next_page+", "+no_of_page+");");
            }
            else
            {
                $("#more_results_container").html('Acestea sunt toate rezultatele.');
            }


            $("#loading").hide();
            $("#list_results").show();
            // $("#list_more_results").html(response);
        }
    });
}



$(function() {
    $('#categoryModal button').on('click', function(e)
    {
        e.preventDefault();
    });
    $('#categoryModal').on('shown.bs.modal', function () {
        $("#categoryModal input:text").first().focus();
    });

    $('#settingModal button').on('click', function(e)
    {
        e.preventDefault();
    });
    $('#settingModal').on('shown.bs.modal', function () {
        $("#settingModal input:text").first().focus();
    });

    $('#articleModal button').on('click', function(e)
    {
        e.preventDefault();
    });
    $('#articleModal').on('shown.bs.modal', function () {
        $("#articleModal input:text").first().focus();
    });

    $('#userModal button').on('click', function(e)
    {
        e.preventDefault();
    });
    $('#userModal').on('shown.bs.modal', function () {
        $("#userModal input:text").first().focus();
    });
});

//======== START Articles ========

function article_item(article_id, action_type, event)
{
    event.stopPropagation();
    event.preventDefault();

    $("#"+article_id+"_content").hide();
    $.ajax({
        url: '/admin-1000/ajax/get_article_form.php?article_id='+article_id+'&action_type='+action_type,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (action_type == 'add')
            {
                $("#articleModalLabel").html('Add article');
            }
            else
            {
                $("#articleModalLabel").html('Edit article');
            }
            $("#articleModal #frm_modal_btn").removeAttr("onclick");
            $("#articleModal #frm_modal_btn").off("click");
            $("#articleModal #frm_modal_btn").on("click", function () {
                save_article('frm_article');
            });
            $("#articleModalBody").html( result.modal_body );
        }
    });
    $('#articleModal').modal('show');
}




function save_article(form_id)
{
    editor_name = 'version_1';
    var editorText = CKEDITOR.instances[editor_name].getData();
    // alert(editorText);
    $("#"+form_id+" #version_1").val(editorText);    

    item_value = $("#"+form_id+" #social_media_image").val();
    var item_value_uploaded = $('#social_media_image_upload')[0].files[0];
    if (typeof item_value_uploaded != 'undefined')
    {
        image_type = item_value_uploaded.type
        if (image_type.toLowerCase().indexOf("image") == -1)
        {
            alert('Please upload an image file (jpg, gif, png)');
            return false;
        }
        if (item_value != '' && item_value_uploaded.name != '') {
            if (confirm('You will replace the file with this new one! Are you sure?'))
            {

            }
            else
            {
                return false;
            }
        }
    }

    var m_data = new FormData();
    m_data.append( 'article_id', $("#"+form_id+" #article_id").val());
    m_data.append( 'page_no', $("#"+form_id+" #page_no").val());
    m_data.append( 'category_id', $("#"+form_id+" #category_id").val());
    m_data.append( 'title', $("#"+form_id+" #title").val());
    m_data.append( 'short_title', $("#"+form_id+" #short_title").val());
    m_data.append( 'meta_description', $("#"+form_id+" #meta_description").val());
    m_data.append( 'version_1', editorText);

    m_data.append( 'is_primary', $('input[name=is_primary]:checked').val());
    m_data.append( 'display_order', $("#"+form_id+" #display_order").val());
    m_data.append( 'status', $("#"+form_id+" #status").val());

    m_data.append( 'social_media_image', $("#"+form_id+" #social_media_image").val());
    m_data.append( 'social_media_image_upload', item_value_uploaded);

    $.ajax({
        url: '/admin-1000/ajax/save_article.php',
        type: 'POST',
        data: m_data,
        cache: false,
        dataType:'json',
        processData: false,
        contentType: false,
        success: function(result) {
            if (result.response == 'ok') {
                window.location.reload(true);
            }
            else
            {
                $("#articleModalBody #error_message").html(result.response );
            }
        }
    });
}

function delete_article_item(article_id, event)
{
    event.stopPropagation();
    event.preventDefault();

    $("#"+article_id+"_content").hide();
    if (confirm('Are you sure you want to delete this article?'))
    {
        $.ajax({
            url: '/admin-1000/ajax/delete-article.php?article_id='+article_id,
            type: 'GET',
            cache: false,
            dataType:'json',
            success: function(result) {
                if (result.response == "ok")
                {
                    window.location.reload(true);
                }
            }
        });
    }
    else
    {
        return false;
    }
}


function revert_article_to_version(article_id, version_no)
{

    if (confirm('Are you sure? This operation cannot be undone.'))
    {
        $.ajax({
            url: '/admin-1000/ajax/revert_article_to_version.php?article_id='+article_id+'&version_no='+version_no,
            type: 'GET',
            cache: false,
            dataType:'json',
            success: function(result) {
                window.location.reload(true);
            }
        });
    }
    else
    {
        return false;
    }

}

function show_article_item(article_id, event)
{
    event.stopPropagation();
    event.preventDefault();

    $("#"+article_id+"_content").hide();
    $('#showArticleModalLabel').attr('article_id', article_id);
    // console.log('article_id '+ article_id);
    $.ajax({
        url: '/admin-1000/ajax/get_article_versions.php?article_id='+article_id,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            $("#showArticleModalBody").html( result.modal_body );
        }
    });
    $('#showArticleModal').modal('show');
}

function move_article_item(article_id, position, event)
{
    event.stopPropagation();
    event.preventDefault();

    $("#"+article_id+"_content").hide();
    $.ajax({
        url: '/admin-1000/ajax/articles-move.php?position='+position+'&article_id='+article_id,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            window.location.reload(true);
        }
    });

}

function move_category_item(category_id, position, event)
{
    event.stopPropagation();
    event.preventDefault();

    $("#"+category_id+"_content").hide();

    $.ajax({
        url: '/admin-1000/ajax/category-move.php?position='+position+'&category_id='+category_id,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            window.location.reload(true);
        }
    });
}


function toggle_content(article_id)
{
    $("#"+article_id+"_content").toggle();
}

function update_article_status(article_id, event)
{

    event.stopPropagation();
    event.preventDefault();

    var current_element = $('#update-status-'+article_id);
    var current_status = current_element.attr('current-status');
    var status, error_class, icon_class, old_error_class, old_icon_class, icon_status_class, old_icon_status_class;

    var icon_status_element = $('#icon-status-'+article_id);

    if (current_status == 1) {
        status = 0;
        error_class = 'text-error';
        icon_class = 'glyphicon-ok';

        old_error_class = 'text-success';
        old_icon_class = 'glyphicon-ok';

        old_icon_status_class = '';
        icon_status_class = 'glyphicon-alert';
    }
    else
    {
        status = 1;
        error_class = 'text-success';
        icon_class = 'glyphicon-ok';

        old_error_class = 'text-error';
        old_icon_class = 'glyphicon-ok';

        old_icon_status_class = 'glyphicon-alert';
        icon_status_class = '';

    }

    $.ajax({
        url: '/admin-1000/ajax/update-article-status.php?article_id='+article_id+'&action=update&status='+status,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (result.response == 'ok') {
                current_element.attr('current-status', status);
                current_element.removeClass(old_error_class).addClass(error_class);
                current_element.find('span').removeClass(old_icon_class).addClass(icon_class);

                if (status == 0)
                {
                    icon_status_element.show();
                }
                else
                {
                    icon_status_element.hide();
                }
                icon_status_element.removeClass(old_icon_status_class).addClass(icon_status_class);
                icon_status_element.removeClass(old_error_class).addClass(error_class);
            }
        }
    });


}
function current_articles()
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
        pagination_articles(prev_item);
    }


}

function pagination_articles(page_id)
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
    var s_status = getUrlParameter('s_status');

    if(filter=='undefined'){
        filter='article_id';
    }
    //console.log(window.location.hash);
    // return false;
    $("#loading").show();
    $("#list_results").hide();
    $.ajax({
        type: 'POST',
        url: '/admin-1000/ajax/show-articles.php',
        data: 'pageId='+ page_id
        +"&s_id="+s_id
        +"&s_title="+s_title
        +"&s_short_title="+s_short_title
        +"&s_category_id="+s_category_id
        +"&s_date_start="+s_date_start
        +"&s_date_end="+s_date_end
        +"&filter="+filter
        +"&sort="+sort
        +"&s_status="+s_status
        ,
        success: function(response)
        {
            $("#list_results").html(response);
            //console.log(page_id);
            $(".list_pagination li a").removeClass("curent_item").addClass("pagination_item");
            $(".list_pagination li").removeClass("curent_item");
            $("#"+page_id).removeClass("pagination_item").addClass("curent_item");
            $("#"+page_id+"botom").removeClass("pagination_item").addClass("curent_item");

            $("#loading").hide();
            $("#list_results").show();

        }
    });
}




function prev_articles()
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
        pagination_articles(prev_item);
    }


}


function next_articles()
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
        pagination_articles(next_item);
    }


}

//======== END Articles ========

/* ASSETS IN BROWSER */
function current_browse_assets()
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
        pagination_browse_assets(prev_item);
    }

}

function prev_browse_assets(page_list, type)
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
        pagination_browse_assets(prev_item,page_list, type);
    }


}

function next_browse_assets(page_list, type)
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
        pagination_browse_assets(next_item,page_list, type);
    }


}

function pagination_browse_assets(page_id,page_list, type)
{
    var url = window.location.href;

    //console.log(url);
    //console.log(window.location.hash);
    if (page_id)
    {
        window.location.hash='pagina='+$("#"+page_id).attr('id');
        window.location.hash='pagina='+page_id;

    }

    var s_asset_id = getUrlParameter('s_asset_id');
    var s_name = getUrlParameter('s_name');
    var s_description = getUrlParameter('s_description');
    var s_file_type = getUrlParameter('s_file_type');
    var s_date_start = getUrlParameter('s_date_start');
    var s_date_end = getUrlParameter('s_date_end');
    var sort = getUrlParameter('sort');
    var filter = getUrlParameter('filter');
    var source = getUrlParameter('source');
    
    if(typeof source == 'undefined')
    {
        source = '';
    }

    if(typeof s_asset_id == 'undefined')
    {
        s_asset_id = '';
    }

    if(typeof s_name == 'undefined')
    {
        s_name = '';
    }
    if(typeof s_description == 'undefined')
    {
        s_description = '';
    }
    if(typeof s_file_type == 'undefined')
    {
        s_file_type = '';
    }
    if(typeof s_date_start == 'undefined')
    {
        s_date_start = '';
    }

    if(typeof s_date_end == 'undefined')
    {
        s_date_end = '';
    }


    var urlPath;
    
        urlPath = '/admin-1000/browse.php?type='+s_file_type+"&source="+source;


    $("#loading").show();
    $("#list_results").hide();
    $.ajax({
        type: 'POST',
        url: urlPath,
        data: 'pageId='+ page_id+
        "&s_asset_id="+s_asset_id+
        "&s_name="+s_name+
        "&s_description="+s_description+       
        "&s_file_type="+s_file_type+
        "&s_date_start="+s_date_start+
        "&s_date_end="+s_date_end+
        "&sort="+sort+
        "&source="+source+        
        "&type="+type+        
        "&input_file_url="+input_file_url+        
        "&filter="+filter,
 
        success: function(response)
        {
            $("#list_results").html(response);
            $("#list_results h2").remove();

            //console.log(page_id);
            $(".list_pagination li a").removeClass("curent_item").addClass("pagination_item");
            $(".list_pagination li").removeClass("curent_item");
            $("#"+page_id).removeClass("pagination_item").addClass("curent_item");
            $("#"+page_id+"botom").removeClass("pagination_item").addClass("curent_item");

            $("#loading").hide();
            $("#list_results").show();

        }
    });
}
/*END BROWSE ACTIONS */


/*START ASSETS ACTIONS */

function current_assets()
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
        pagination_assets(prev_item);
    }

}



function prev_assets(page_list, type)
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
        pagination_assets(prev_item,page_list, type);
    }


}

function update_asset_moderation_status(asset_id, aNumber){

      var current_element = $('#update-status-'+asset_id);
      var current_status = current_element.attr('current-status');
      var status, error_class, icon_class, old_error_class, old_icon_class, icon_status_class, old_icon_status_class;

      var icon_status_element = $('#icon-status-'+asset_id);

      if (current_status == 1) {
          status = 0;
          error_class = 'text-error';
          icon_class = 'glyphicon-ok';

          old_error_class = 'text-success';
          old_icon_class = 'glyphicon-ok';

          old_icon_status_class = '';
          icon_status_class = 'glyphicon-alert';
      }
      else
      {
          status = 1;
          error_class = 'text-success';
          icon_class = 'glyphicon-ok';

          old_error_class = 'text-error';
          old_icon_class = 'glyphicon-ok';

          old_icon_status_class = 'glyphicon-alert';
          icon_status_class = '';

      }

      $.ajax({
          url: '/admin-1000/ajax/update-asset-moderation-status.php?asset_id='+asset_id+'&action=update&status='+status,
          type: 'GET',
          cache: false,
          dataType:'json',
          success: function(result) {
              if (result.response == 'ok') {
                  current_element.attr('current-status', status);
                  current_element.removeClass(old_error_class).addClass(error_class);
                  current_element.find('span').removeClass(old_icon_class).addClass(icon_class);
                  icon_status_element.removeClass(old_icon_status_class).addClass(icon_status_class);
              }
              location.reload(true);
          }
      });

}

function next_assets(page_list, type)
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
        pagination_assets(next_item,page_list, type);
    }


}

function pagination_assets(page_id,page_list, type)
{
    var url = window.location.href;

    //console.log(url);
    //console.log(window.location.hash);
    if (page_id)
    {
        //window.location.hash='pagina='+$("#"+page_id).attr('id');
        window.location.hash='pagina='+page_id;

    }

    var s_asset_id = getUrlParameter('s_asset_id');
    var s_name = getUrlParameter('s_name');
    var s_description = getUrlParameter('s_description');
    var s_file_type = getUrlParameter('s_file_type');
    var s_date_start = getUrlParameter('s_date_start');
    var s_date_end = getUrlParameter('s_date_end');
    var sort = getUrlParameter('sort');
    var filter = getUrlParameter('filter');
    var source = getUrlParameter('source');
    
    if(typeof source == 'undefined')
    {
        source = '';
    }

    if(typeof s_asset_id == 'undefined')
    {
        s_asset_id = '';
    }

    if(typeof s_name == 'undefined')
    {
        s_name = '';
    }
    if(typeof s_description == 'undefined')
    {
        s_description = '';
    }
    if(typeof s_file_type == 'undefined')
    {
        s_file_type = '';
    }
    if(typeof s_date_start == 'undefined')
    {
        s_date_start = '';
    }

    if(typeof s_date_end == 'undefined')
    {
        s_date_end = '';
    }


    var urlPath;
    if (page_list == 'browser')
    {

        urlPath = '/admin-1000/browse.php?type='+s_file_type+'&source='+source;
    }
    else
    {
        urlPath = '/admin-1000/ajax/show-assets.php';
    }

    $("#loading").show();
    $("#list_results").hide();
    $.ajax({
        type: 'POST',
        url: urlPath,
        data: 'pageId='+ page_id+
        "&s_asset_id="+s_asset_id+
        "&s_name="+s_name+
        "&s_description="+s_description+       
        "&s_file_type="+s_file_type+
        "&s_date_start="+s_date_start+
        "&s_date_end="+s_date_end+
        "&sort="+sort+
        "&source="+source+        
        "&filter="+filter,
 
        success: function(response)
        {
            $("#list_results").html(response);
            $("#list_results h2").remove();

            //console.log(page_id);
            $(".list_pagination li a").removeClass("curent_item").addClass("pagination_item");
            $(".list_pagination li").removeClass("curent_item");
            $("#"+page_id).removeClass("pagination_item").addClass("curent_item");
            $("#"+page_id+"botom").removeClass("pagination_item").addClass("curent_item");

            $("#loading").hide();
            $("#list_results").show();

        }
    });
}

function edit_asset_item(asset_id, page_no)
{
    $('#editAssetModalLabel').attr('asset_id', asset_id);
    console.log('asset_id '+ asset_id);
    $.ajax({
        url: '/admin-1000/ajax/get_asset_form.php?asset_id='+asset_id+'&page_no='+page_no,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            $("#editAssetModalBody").html( result.modal_body );
        }
    });
    $('#editAssetModal').modal('show');
}

function show_asset_item(asset_id)
{
    $('#showAssetModalLabel').attr('asset_id', asset_id);
    // console.log('article_id '+ article_id);
    $.ajax({
        url: '/admin-1000/ajax/get_asset_info.php?asset_id='+asset_id,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            $("#showAssetModalBody").html( result.modal_body );
        }
    });
    $('#showAssetModal').modal('show');
}

function delete_asset_item(asset_id)
{
    if (confirm('Are you sure you want to delete this asset?'))
    {
        $.ajax({
            url: '/admin-1000/ajax/assets-delete.php?asset_id='+asset_id,
            type: 'GET',
            cache: false,
            success: function(result) {
               // window.location = "/admin-1000/?action=admin-assets";
                window.location.reload(true);
            }
        });
    }
    else
    {
        return false;
    }

}
/* END ASSESTS ACTIONS*/


function saveUser(form_id, user_type, action) {

    //make a short validation
    var msgError = '';
    var profile_message_holder = form_id+'_message_div';
    //update only info
    var profile_email = $('#email').val();
    var profile_user_name = $('#user_name').val();
    if (profile_email == '')
    {
        msgError += '<div>Email Address is mandatory.</div>';
    }
    else if (!validateEmail(profile_email))
    {
        msgError += '<div>Invalid Email Address.</div>';
    }
    profile_message_holder = 'form_users_message_div'; //form_users_message_div

    if (profile_user_name == '')
    {
        msgError += '<div>User name is mandatory.</div>';
    }

        var user_type_selected = $('#user_type').val();
        if (user_type_selected == '')
        {
            msgError += '<div>User Type is mandatory.</div>';
        }
        var password = $('#password').val();
        if (password == '')
        {
            msgError += '<div>Password is mandatory.</div>';
        }


    if (msgError == '')
    {

        var m_data = new FormData();
        m_data.append( 'user_name', $('#user_name').val());
        m_data.append( 'email', $('#email').val());
        m_data.append( 'password', $('#password').val());
        m_data.append( 'user_type', $('#user_type').val());
        m_data.append( 'location', $('#location').val());
        m_data.append( 'country', $('#country').val());
        m_data.append( 'user_birth_date_day', $('#user_birth_date_day').val());
        m_data.append( 'user_birth_date_month', $('#user_birth_date_month').val());
        m_data.append( 'user_birth_date_year', $('#user_birth_date_year').val());

        m_data.append( 'myfiles', $('input[name=myfiles]')[0].files[0]);
        $.ajax({
            url: '/admin-1000/ajax/save_user.php',
            type: 'POST',
            data: m_data,
            cache: false,
            dataType:'json',
            processData: false,
            contentType: false,
            success: function(result) {
                if (result.response == 'ok') {
                    if (user_type == 'front_user')
                    {
                        window.location = '/admin-1000/?action=admin-front-users';
                    }
                    else
                    {
                        window.location = '/admin-1000/?action=admin-users';
                    }
                    $("#"+profile_message_holder).html('Profile successfully saved!').removeClass('text-error').addClass("text-success");
                }
                else
                {

                    $("#"+profile_message_holder).html(result.response ).addClass('text-error').removeClass("text-success");
                }
            },
            error: function(result) {
                console.log(result);
                return false;
            }
        });
    }
    else
    {
        //alert(msgError);
        $("#"+profile_message_holder).html(msgError);
        return false;
    }
}


function edit_user()
{
    //make a short validation
    var msgError = '';
    var profile_message_holder = 'error_message_edit_user';
    //update only info
    var profile_email = $('#edit_email').val();
    var profile_user_name = $('#edit_user_name').val();
    if (profile_email == '')
    {
        msgError += 'Email Address is mandatory';
    }
    if (!validateEmail(profile_email))
    {
        msgError += 'Invalid Email Address';
    }
    profile_message_holder = 'details_message_response';

    if (profile_user_name == '')
    {
        msgError += 'User name is mandatory';
    }


    if (msgError == '')
    {
        var page_no = $('#page_no').val();
        var user_type_section = $('#user_type_section').val();



        var m_data = new FormData();
        m_data.append( 'page_no', $('#page_no').val());
        m_data.append( 'user_id', $('#edit_user_id').val());
        m_data.append( 'user_name', $('#edit_user_name').val());
        m_data.append( 'email', $('#edit_email').val());
        m_data.append( 'password', $('#edit_password').val());
        m_data.append( 'user_type', $('#edit_user_type').val());
        m_data.append( 'location', $('#edit_location').val());
        m_data.append( 'country', $('#edit_country').val());
        m_data.append( 'user_birth_date_day', $('#edit_user_birth_date_day').val());
        m_data.append( 'user_birth_date_month', $('#edit_user_birth_date_month').val());
        m_data.append( 'user_birth_date_year', $('#edit_user_birth_date_year').val());

        m_data.append( 'myfiles', $('input[name=edit_myfiles]')[0].files[0]);

        $.ajax({
            url: '/admin-1000/ajax/edit_user.php',
            type: 'POST',
            data: m_data,
            cache: false,
            dataType:'json',
            processData: false,
            contentType: false,
            success: function(result) {
               // console.log('page_no '+ result.response);
                if (result.response == 'ok') {

                    $('#editUserModal').modal('hide');
                    if (result.user_type_section == 'front_user')
                    {
                        window.location = '/admin-1000/?action=admin-front-users';
                    }
                    else
                    {
                        window.location = '/admin-1000/?action=admin-users';
                    }
                    window.location = "/admin-1000/?action=admin-articles#pagina="+page_no;
                    window.location.reload(true);
                }
                else
                {

                    $("#editUserModalBody #error_messaj_edit_article").html(result.response );
                }
            }
        });
    }
    else
    {
        alert(msgError);
        return false;
    }
}
function edit_user_item(user_id, page_no, user_type)
{
    $('#editUserModalLabel').attr('user_id', user_id);
    //console.log('user_id '+ user_id);
    $.ajax({
        url: '/admin-1000/ajax/get_user_form.php?user_id='+user_id+'&page_no='+page_no+'&user_type_section='+user_type,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            $("#editUserModalBody").html( result.modal_body );
        }
    });
    $('#editUserModal').modal('show');
}

function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function toggle_menu_table(menu_level){
    $('#level_'+menu_level+'_menu').toggle();
    $('#level_'+menu_level+'_menu_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

}


function openBrowseServer(input_file_url, event)
{
    event.preventDefault();
    var urlPath;
    urlPath = '/admin-1000/browse.php?type=images&source=non_ckeditor&input_file_url='+input_file_url;

    var w = window.open(urlPath, "popupWindow", "width=900, height=900, scrollbars=yes");
    var $w = $(w.document.body);

}



//======== START EMAILS MANAGEMENT ========

/*****  PAGINATION ***/

function pagination_emails(page_id)
{
    var url = window.location.href;

    //console.log(url);
    //console.log(window.location.hash);
    if (page_id)
    {
        //window.location.hash='pagina='+$("#"+page_id).attr('id');
        if (page_id > 1 ) {
            window.location.hash='pagina='+page_id;
        }

    }

    //console.log(window.location.hash);
    // return false;
    $("#loading").show();
    $("#list_results").hide();
    $.ajax({
        type: 'POST',
        url: '/admin-1000/ajax/show-emails-management.php',
        data: 'pageId='+ page_id, // admin or regular_user
        success: function(response)
        {
            $("#list_results").html(response);
            //console.log(page_id);
            $(".list_pagination li a").removeClass("curent_item").addClass("pagination_item");
            $(".list_pagination li").removeClass("curent_item");
            $("#"+page_id).removeClass("pagination_item").addClass("curent_item");
            $("#"+page_id+"botom").removeClass("pagination_item").addClass("curent_item");

            $("#loading").hide();
            $("#list_results").show();
        }
    });
}


function prev_emails()
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");

        pagination_emails(prev_item);
    }


}


function next_emails()
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");


        pagination_emails(next_item);
    }


}


function current_emails()
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
        pagination_emails(prev_item);
    }


}

function add_emai_managementl()
{
    $.ajax({
        url: '/admin-1000/ajax/get_email_form.php',
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            $("#emailModalLabel").html( 'Add Email Management' );
            $("#emailModalBody").html( result.modal_body );
        }
    });
    $('#emailModal').modal('show');
}
function save_email_management()
{
    var  formElem = $("#frm_email_save");

    $.ajax({
        url: '/admin-1000/ajax/save_email.php',
        type: 'POST',
        data: formElem.serialize(),
        cache: false,
        dataType:'json',
        success: function(result) {
            //  console.log('page_no '+ result.response);
            if (result.response == 'ok') {
                $('#newModal').modal('hide');
                window.location.reload(true);
            }
            else
            {
                $("#emailModal #error_message_save_email").html(result.response );
            }
        }
    });
}
function edit_email_management(email_management_id, page_no)
{

    // event.stopPropagation();
    //  event.preventDefault();

    $.ajax({
        url: '/admin-1000/ajax/get_email_form.php?email_management_id='+email_management_id+'&page_no='+page_no,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            $("#emailModalLabel").html( 'Edit Email Management' );
            $("#emailModalBody").html( result.modal_body );
        }
    });
    $('#emailModal').modal('show');
}

function update_email_management_status(email_management_id, event)
{

    event.stopPropagation();
    event.preventDefault();

    var current_element = $('#update-status-'+email_management_id);
    var current_status = current_element.attr('current-status');
    var status, error_class, icon_class, old_error_class, old_icon_class, icon_status_class, old_icon_status_class;

    var icon_status_element = $('#icon-status-'+email_management_id);

    if (current_status == 1) {
        status = 0;
        error_class = 'text-error';
        icon_class = 'glyphicon-ok';

        old_error_class = 'text-success';
        old_icon_class = 'glyphicon-ok';

        old_icon_status_class = '';
        icon_status_class = 'glyphicon-alert';
    }
    else
    {
        status = 1;
        error_class = 'text-success';
        icon_class = 'glyphicon-ok';

        old_error_class = 'text-error';
        old_icon_class = 'glyphicon-ok';

        old_icon_status_class = 'glyphicon-alert';
        icon_status_class = '';

    }

    $.ajax({
        url: '/admin-1000/ajax/update-email-management-status.php?email_management_id='+email_management_id+'&action=update&status='+status,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (result.response == 'ok') {
                current_element.attr('current-status', status);
                current_element.removeClass(old_error_class).addClass(error_class);
                current_element.find('span').removeClass(old_icon_class).addClass(icon_class);

                icon_status_element.removeClass(old_icon_status_class).addClass(icon_status_class);
            }
        }
    });


}



function remove_email_management(email_management_id, event)
{

    event.stopPropagation();
    event.preventDefault();
    if (confirm('Are you sure you want to delete this email?'))
    {
        $.ajax({
            url: '/admin-1000/ajax/delete_email.php?action=delete&email_management_id='+email_management_id,
            type: 'GET',
            cache: false,
            success: function(result) {
                window.location.reload(true);
            }
        });
    }
    else
    {
        return false;
    }

}

//======== END EMAILS MANAGEMENT ========




//======== START USERGROUP ========
function pagination_usergroups(page_id, type)
{

    var url = window.location.href;

    if (page_id)
    {
        if (page_id > 0 ) {
            //window.location.hash='pagina='+$("#"+page_id).attr('id');
            window.location.hash='pagina='+page_id;
        }

    }
    //get all filter parameters
    
    var s_id = getUrlParameter('s_id');
    var s_name = getUrlParameter('s_name');
    var s_description = getUrlParameter('s_description');
    var s_date_start = getUrlParameter('s_date_start');
    var s_date_end = getUrlParameter('s_date_end');
    var filter = getUrlParameter('filter');
    var sort = getUrlParameter('sort');
    //var s_type = getUrlParameter('s_type');
    //var q_search = getUrlParameter('q');
    //console.log(window.location.hash);
    // return false;
    $("#loading").show();
    $("#list_results").hide();
        /* attach a submit handler to the form */
 
    $.ajax({
        type: 'GET',
        url: '/admin-1000/ajax/show-usergroups.php',
        data: 'pageId='+ page_id+
        "&type="+type+
        "&sort="+sort+
        "&filter="+filter+
        "&s_name="+s_name+
        "&s_description="+s_description+
        "&s_date_start="+s_date_start+
        "&s_date_end="+s_date_end+
        "&s_id="+s_id,
 
        success: function(response)
        {
            $("#list_results_usergroups").html(response);
            $(".list_pagination li a").removeClass("curent_item").addClass("pagination_item");
            $(".list_pagination li").removeClass("curent_item");
            $("#"+page_id).removeClass("pagination_item").addClass("curent_item");
            $("#"+page_id+"botom").removeClass("pagination_item").addClass("curent_item");

            $("#loading").hide();
            $("#list_results_usergroups").show();            

        }
    });

}



function prev_usergroups()
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");

        pagination_usergroups(prev_item, '');
    }


}

function current_pagination_user_groups()
{
    var result= check_url();

    if(result!="" || result!='undefined' || typeof(result)!='undefined')
    {
        result= parseInt(result); 
        var prev_item =  result;
    }
    else
    {
        var prev_item  = 1;
    }

    if (prev_item > 0)
    {

        pagination_usergroups(prev_item,'admin');

    }else{

        pagination_usergroups(prev_item,'admin');

    }



}


function next_usergroups()
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");


        pagination_usergroups(next_item,'');
    }


}




function usergroup_item(usergroup_action_id, action_type)
{

    $.ajax({
        url: '/admin-1000/ajax/get_usergroup_form.php?usergroup_id='+usergroup_action_id+'&action_type='+action_type,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (action_type == 'add')
            {
                $("#usergroupModalLabel").html('Add Usergroup');
            }
            else
            {
                $("#usergroupModalLabel").html('Edit Usergroup'); 
            }
            $("#usergroupModal #frm_modal_btn").removeAttr("onclick");
            $("#usergroupModal #frm_modal_btn").off("click");
            $("#usergroupModal #frm_modal_btn").on("click", function () {
                save_usergroup('frm_usergroup');

            });
            $("#usergroupModalBody").html( result.modal_body );
        } 
    });
    $('#usergroupModal').modal('show');
}  




function countChar_user_management(val, limit)
{
    var len = val.value.length;
    if (len >= limit + 1) 
     {
              val.value = val.value.substring(0, limit);
     } 
     else
     {          
              //number of charachters   
              $('#charNum_user_name').text(len);
              $('#charNum_user_name').append('/'+limit);
     }
    var str = $('input[name=user_name_add]').val();
    
    var regex = /[^\w-\s]/gi;
    if(regex.test(str) == false) {
            $('.illegal_chars_name').css({"color":"red", "display":"none"});
            $('.modal-footer').css({"display":"block"});

            if(len < 3){
                $('#edit_user_top_right').removeClass('btn-success');
                $('#edit_user_top_right').addClass('btn-danger');
            }else{
                $('#edit_user_top_right').removeClass('btn-danger');
                $('#edit_user_top_right').addClass('btn-success');

            }

    }else{        
        $('.modal-footer').css({"display":"none"});
    }  

}

function countChar_user_management_first(val, limit)
{
    var len = val.length;
    if (len >= limit + 1) 
     {
              val.value = val.value.substring(0, limit);
     } 
     else
     {          
              //number of charachters   
              $('#charNum_user_name').text(len);
              $('#charNum_user_name').append('/'+limit);
     }
    var str = $('input[name=user_name_add]').val();
    
    var regex = /[^\w-\s]/gi;
    if(regex.test(str) == false) {
            $('.illegal_chars_name').css({"color":"red", "display":"none"});
            $('.modal-footer').css({"display":"block"});
            
            if(len < 3){
                $('#edit_user_top_right').removeClass('btn-success');
                $('#edit_user_top_right').addClass('btn-danger');
            }else{
                $('#edit_user_top_right').removeClass('btn-danger');
                $('#edit_user_top_right').addClass('btn-success');

            }

    }else{        
        $('.modal-footer').css({"display":"none"});
    }  

}

function countChar_name_first(val, limit)
{
     if(!val.lenght)
     { 
        len = 1; 
     }

     var len = val.length;

     if (len >= limit + 1) 
     {
              val = val.substring(0, limit);
     }
     else
     {             
              $('#charNum_name').text(len);
              $('#charNum_name').append('/'+limit);
     }

    var str = $('input[name=usergroup_name]').val();
    
    var regex = /[^\w-\s]/gi;

    if(regex.test(str) == false) {
            $('.illegal_chars_name').css({"color":"red", "display":"none"});
            $('.modal-footer').css({"display":"block"});

        if(len < 3){
             
            $('#usergroup_name').addClass('btn-danger');

            $('input[name="usergroup_name"]').removeClass('btn-succcess');
            $('input[name="usergroup_name"]').addClass('btn-danger');
            $('div #usergroup_name').removeClass('btn-success');
            $('div #usergroup_name').addClass('btn-danger');

            $('.4_chars').css({"color":"red","display":"block"});
            $('.usergroup_name_title').css({"color":"black","display":"block"});

         }else if (len >= 3 && len <=limit){
            $('input[name="usergroup_name"]').removeClass('btn-danger');
            $('#charNum_name').removeClass('btn-danger');
    
            $('div #usergroup_name').removeClass('btn-danger');
            $('div #usergroup_name').addClass('btn-success');

            $('#frm_modal_btn').css({"display":"block"});
            $('#frm_modal_btn').addClass('pull-right');

            $('.4_chars').css({"color":"black","display":"none"});
            $('.usergroup_name_title').css({"color":"black","display":"none"}); 
         }


        if( len < limit){       

            $('input[name="usergroup_name"]').removeClass('btn-warning');

            $('input[name="usergroup_name"]').css({"display":"block"});

         }



        
     
        $('.illegal_chars_name').css({"color":"black", "display":"none"});
       

    }else{     

        $('.illegal_chars_name').css({"color":"red", "display":"block"});
        

    }  

        

};


function countChar_name(val, limit)
{
     if(!val.value.lenght)
     { 
        len = 1; 
     }

     var len = val.value.length;

     if (len >= limit + 1) 
     {
              val.value = val.value.substring(0, limit);
     }
     else
     {             
              $('#charNum_name').text(len);
              $('#charNum_name').append('/'+limit);
     }

    var str = $('input[name=usergroup_name]').val();
    
    var regex = /[^\w-\s]/gi;

    if(regex.test(str) == false) {
            $('.illegal_chars_name').css({"color":"red", "display":"none"});
            $('.modal-footer').css({"display":"block"});

        if(len < 3){
             
            $('input[name="usergroup_name"]').removeClass('btn-succcess');
            $('input[name="usergroup_name"]').addClass('btn-danger');
            $('div #usergroup_name').removeClass('btn-warning');
            $('div #usergroup_name').removeClass('btn-success');
            $('div #usergroup_name').addClass('btn-danger');

            $('.4_chars').css({"color":"red","display":"block"});
            $('.usergroup_name_title').css({"color":"black","display":"block"});

         }else if (len >= 3 && len <=limit){
            $('input[name="usergroup_name"]').removeClass('btn-danger');
            $('#charNum_name').removeClass('btn-danger');
            $('div #usergroup_name').removeClass('btn-warning');
            $('div #usergroup_name').removeClass('btn-danger');
            $('div #usergroup_name').addClass('btn-success');

            $('#frm_modal_btn').css({"display":"block"});
            $('#frm_modal_btn').addClass('pull-right');

            $('.4_chars').css({"color":"black","display":"none"});
            $('.usergroup_name_title').css({"color":"black","display":"none"}); 
         }
     
        $('.illegal_chars_name').css({"color":"black", "display":"none"});
       

    }else{     

        $('.illegal_chars_name').css({"color":"red", "display":"block"});
        

    }  

        

};

function countChar_description(val, limit){
    var len = val.value.length;
    
   
         if (len > limit) 
         {
                  val.value = val.value.substring(0, limit);

         } 
         else
         {             
                  $('#charNum_description').text(len+'/'+limit);
         }

    var str = $("textarea[name='usergroup_description']").val();

     //$('.illegal_chars_description').val(str);


        $('.illegal_chars_description').css({"display":"none"});
        $('.modal-footer').css({"display":"block"});

        var textarea_usergroup_description = $("textarea[name='usergroup_description']");
         if( len > limit-5){        
            $('#usergroup_description').removeClass('btn-warning');
            $('#usergroup_description').addClass('btn-warning');
         }else{
            $('#usergroup_description').removeClass('btn-warning');
         }

         if ((limit - len) < 0)
         {
            $('#usergroup_description').removeClass('btn-warning');
            $('#usergroup_description').addClass('btn-warning');
            textarea_usergroup_description.addClass('btn-danger');
            $('.modal-footer').css({"display":"none"});
            $('.200_chars').css({"color":"red", "display":"block"});
         }else{
            textarea_usergroup_description.removeClass('btn-danger');            
            $('.modal-footer').css({"display":"block"});         
            $('.200_chars').css({"color":"black", "display":"none"});
         }


    
 
}

function countChar_description_first(val, limit){
    var len = val.length;
    
   
         if (len > limit) 
         {
                  val = val.substring(0, limit);

         } 
         else
         {             
                  $('#charNum_description').text((len)+'/'+limit);
         }

    var str = $("textarea[name='usergroup_description']").val();

     //$('.illegal_chars_description').val(str);


        $('.illegal_chars_description').css({"display":"none"});
        $('.modal-footer').css({"display":"block"});

        var textarea_usergroup_description = $("textarea[name='usergroup_description']");
         if( len > limit-5){        
            $('#usergroup_description').removeClass('btn-warning');
            $('#usergroup_description').addClass('btn-warning');
         }else{
            $('#usergroup_description').removeClass('btn-warning');
         }

         if ((limit - len) < 0)
         {
            $('#usergroup_description').removeClass('btn-warning');
            $('#usergroup_description').addClass('btn-warning');
            textarea_usergroup_description.addClass('btn-danger');
            $('.modal-footer').css({"display":"none"});
            $('.200_chars').css({"color":"red", "display":"block"});
         }else{
            textarea_usergroup_description.removeClass('btn-danger');
            
            $('.modal-footer').css({"display":"block"});         
            $('.200_chars').css({"color":"black", "display":"none"});
         }


    
 
}

function save_usergroup(form_id)
{

    $.ajax({
        url: '/admin-1000/ajax/save_usergroup.php',
        type: 'POST',
        data: $('#'+form_id).serialize(),
        cache: false,
        dataType:'json',
        success: function(result) {
            if (result.response == 'ok') {
                window.location = window.location.href.split("?")[0]+'?action=admin-usergroup';
            }
            else
            {
                $("#usergroupModalBody #error_message").html(result.response );
            }
        }
    });
}

function delete_usergroup_item(usergroup_id)
{
    if (confirm('Are you sure you want to delete this Usergroup?'))
    {
        $.ajax({
            url: '/admin-1000/ajax/delete-usergroup.php?usergroup_id='+usergroup_id,
            type: 'POST',
            cache: false,
            dataType:'json',
            success: function(result) {
                if (result.response == "ok")
                {
                    window.location.reload(true);
                }
                else
                {
                    alert(result.response); 
                }
            }
        });
    }
    else
    {
        return false;
    }
}

//======== END USERGROUP ========




//======== START SETTINGS ========

function setting_item(setting_id, action_type)
{

    $.ajax({
        url: '/admin-1000/ajax/get_setting_form.php?setting_id='+setting_id+'&action_type='+action_type,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (action_type == 'add')
            {
                $("#settingModalLabel").html('Add Setting');
            }
            else
            {
                $("#settingModalLabel").html('Edit Setting');
            }
            $("#settingModal #frm_modal_btn").removeAttr("onclick");
            $("#settingModal #frm_modal_btn").off("click");
            $("#settingModal #frm_modal_btn").on("click", function () {
                save_setting('frm_setting');

            });
            $("#settingModalBody").html( result.modal_body );
        }
    });
    $('#settingModal').modal('show');
}

function save_setting(form_id)
{

    $.ajax({
        url: '/admin-1000/ajax/save_setting.php',
        type: 'POST',
        data: $('#'+form_id).serialize(),
        cache: false,
        dataType:'json',
        success: function(result) {
            if (result.response == 'ok') {
                window.location.reload(true);
            }
            else
            {
                $("#settingModalBody #error_message").html(result.response );
            }
        }
    });
}

function delete_setting_item(setting_id)
{
    if (confirm('Are you sure you want to delete this setting?'))
    {
        $.ajax({
            url: '/admin-1000/ajax/delete-setting.php?setting_id='+setting_id,
            type: 'GET',
            cache: false,
            dataType:'json',
            success: function(result) {
                if (result.response == "ok")
                {
                    window.location.reload(true);
                }
            }
        });
    }
    else
    {
        return false;
    }
}
//======== END SETTINGS ========

//======== START Categories ========

function current_categories()
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
        pagination_categories(prev_item,'admin');
    }


}
  
function pagination_categories(page_id,type)
{


    var url = window.location.href;

    //console.log(url);
    //console.log(window.location.hash);
    if (page_id)
    {
        //window.location.hash='pagina='+$("#"+page_id).attr('id');
        if (page_id > 0 ) {
            window.location.hash='pagina='+page_id;
        }

    }

    //get all filter parameters
    var s_id = getUrlParameter('s_id');
    var s_name = getUrlParameter('s_name');
    var s_date_start = getUrlParameter('s_date_start');
    var s_date_end = getUrlParameter('s_date_end');
    var filter = getUrlParameter('filter');
    var sort = getUrlParameter('sort');
    var status = getUrlParameter('status');

    if(s_date_start=='undefined')
    {
        s_date_start='';
    }
    if(s_date_end=='undefined')
    {
        s_date_end='';
    }

    if(sort=='undefined'){
        sort='1';
    }
    if(filter=='undefined'){
        filter='category_id';
    }
    $("#loading").show();
    $("#list_results").hide();
        /* attach a submit handler to the form */

    $.ajax({
        type: 'GET',
        url: '/admin-1000/ajax/show-categories.php',
        data: 'pageId='+ page_id+
        "&type="+type+
        "&s_id="+s_id+
        "&s_name="+s_name+
        "&filter="+filter+
        "&sort="+sort+
        "&status="+status+
        "&s_date_start="+s_date_start+
        "&s_date_end="+s_date_end,
 
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



function prev_categories(type)
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");

        if(type)
        {
            switch(type)
            {
                case 'admin':
                case 'users':
                    break;
            }

        }
        else
        {
            type="admin";
        }

        pagination_categories(prev_item,type);
    }


}


function next_categories(type)
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
        var url = window.location.href;
        var sort = url.match("type=[a-z]+");

        if(type)
        {
            switch(type)
            {
                case 'admin':
                case 'users':
                    break;
            }

        }
        else
        {
            type="admin";
        }

        pagination_categories(next_item,type);
    }


}

function category_item(category_id, action_type)
{

    $.ajax({
        url: '/admin-1000/ajax/get_category_form.php?category_id='+category_id+'&action_type='+action_type,
        type: 'GET',
        cache: false,
        dataType:'json',
        success: function(result) {
            if (action_type == 'add')
            {
                $("#categoryModalLabel").html('Add category');
            }
            else
            {
                $("#categoryModalLabel").html('Edit category');
            }
            $("#categoryModal #frm_modal_btn").removeAttr("onclick");
            $("#categoryModal #frm_modal_btn").off("click");
            $("#categoryModal #frm_modal_btn").on("click", function () {
                save_category('frm_category');
            });
            $("#categoryModalBody").html( result.modal_body );
        }
    });
    $('#categoryModal').modal('show');
}

function save_category(form_id)
{

    $.ajax({
        url: '/admin-1000/ajax/save_category.php',
        type: 'POST',
        data: $('#'+form_id).serialize(),
        cache: false,
        dataType:'json',
        success: function(result) {
            if (result.response == 'ok') {
                window.location.reload(true);
            }
            else
            {
                $("#categoryModalBody #error_message").html(result.response );
            }
        }
    });
}

function delete_category_item(category_id)
{
    if (confirm('Are you sure you want to delete this category?'))
    {
        $.ajax({
            url: '/admin-1000/ajax/delete-category.php?category_id='+category_id,
            type: 'GET',
            cache: false,
            dataType:'json',
            success: function(result) {
                if (result.response == "ok")
                {
                    window.location.reload(true);
                }else{                    
                    alert(result.response);
                }
            }
        });
    }
    else
    {
        return false;
    }
}
//======== END Categories ========

