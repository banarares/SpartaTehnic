<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>{$page_title}</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="{$root_url}/css/normalize.css">
  <link rel="stylesheet" href="{$root_url}/css/skeleton.css">
  <link rel="stylesheet" href="{$root_url}/css/skeleton.css">
  


  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="{$root_url}/images/favicon.png">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- JQUERY -->
  <script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
  <!-- Latest compiled and minified JavaScript -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
  <link rel="stylesheet" href="{$root_url}/bxslider/jquery.bxslider.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">

  <!-- Google Api -->
  <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"> </script>
  <link rel="stylesheet" href="{$root_url}/css/stylesheet.css">

  <link rel="stylesheet" href="{$root_url}/SlickNav/scss/slicknav.scss" />
  <script src="{$root_url}/SlickNav/jquery.slicknav.js"></script>
  <script>
      //var sitekey = '{$sitekey}';
      var root_url = '{$root_url}';
  </script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">

  <script type="text/javascript"  src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

  <script src="{$root_url}/bxslider/jquery.bxslider.js"></script>
  <script src="{$root_url}/bxslider/jquery.bxslider.min.js"></script>

  <script src="{$root_url}/js/jquery.slicknav.js"></script>
  <script src="{$root_url}/js/main.js"></script>

    {if $has_escaped_fragment}
        <link rel="canonical" href="{$canonical_url}" />
    {/if}

</head>

{include file="{$tpl_folder}/top.tpl"}
