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
    <div class="container">
      <div class="row">

        <?php
        print_data($record);
        $profile = unserialize($record['profile']);
        $address = unserialize($record['address']);
        $education = unserialize($record['education']);
        $work_yes = unserialize($record['work_yes']);
        $work_abroad = unserialize($record['work_abroad']);
        $reference = unserialize($record['reference']);
        ?>

        <p class="text-right">แบบ กพร.201</p>
        <table class="table table-bordered">
          <tr>
            <td style="width:70%;">
              <h4 class="text-center">ใบสมัครเข้ารับการทดสอบฝีมือแรงงาน</h4>
              <p><img src="https://placehold.it/50x50">กรมพัฒนาฝีมือแรงงาน กระทรวงแรงงาน</p>
              <span class="col-md-8">
                <?=form_checkbox('category','ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',set_checkbox('category','ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',($record['category']==='ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ')));?>ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ<br>
                <?=form_checkbox('category','ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',set_checkbox('category','ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',($record['category']==='ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ')));?>ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ<br>
                <?=form_checkbox('category','ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',set_checkbox('category','ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',($record['category']==='ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ')));?>ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ<br>
                <?=form_checkbox('category','ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)',set_checkbox('category','ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)',($record['category']==='ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)')));?>ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)<br>
              </span>
              <span class="col-md-4">
                หน่วยงาน : <?=$record['department'];?><br>
                สาขาอาชีพ : <?=$record['branch'];?><br>
                ระดับ : <?=$record['level'];?><br>
              </span>
            </td>
            <td style="width:30%;"></td>
          </tr>
          <tr>
            <td colspan="2">
              <p>1.<b>ข้อมูลส่วนบุคคล</b>
                ชื่อ <?=$profile['title'].nbs().$profile['firstname'];?>
                นามสกุล <?=$profile['lastname'];?>
                เพศ <?=form_checkbox('title','นาย',set_checkbox('title','นาย',($profile['title']==='นาย')));?> ชาย
                    <?=form_checkbox('title','น',set_checkbox('title','น',($profile['title']!=='นาย')));?> หญิง
              </p>
              <p>1.1</p>
              <p>1.2</p>
              <p>1.3</p>
              <p>1.4</p>
              <p>1.5</p>
            </td>
          </tr>
          <tr>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2"></td>
          </tr>
        </table>

      </div>
    </div>
    <?=script_tag('assets/js/jquery.min.js');?>
    <?=script_tag('assets/js/bootstrap.min.js');?>
  </body>
</html>
