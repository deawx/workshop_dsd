<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <?=link_tag('assets/css/bootstrap.min.css');?>
    <?=link_tag('assets/css/bootstrap.theme.min.css');?>
    <?=link_tag('assets/css/font-awesome.min.css');?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?=print_data($record);?>
    <table class="table table-bordered">
      <tr>
        <td style="width:80%;"></td>
        <td style="width:20%;"></td>
      </tr>
    </table>

    <?=script_tag('assets/js/jquery.min.js');?>
    <?=script_tag('assets/js/bootstrap.min.js');?>
  </body>
</html>
