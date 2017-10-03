<?php
$profile = unserialize($standard['profile']);
$address = unserialize($standard['address']);
$education = unserialize($standard['education']);
$work_yes = unserialize($standard['work_yes']);
$work_abroad = unserialize($standard['work_abroad']);
$reference = unserialize($standard['reference']);
?>
<?php $this->load->view('_partials/messages'); ?>
*หมายเหตุจากผู้อนุมัติ : <p class="text-warning"> <?=$standard['approve_remark'];?></p>
<div class="panel panel-warning">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลรายการขอสอบมาตรฐานฝีมือแรงงาน </h3> </div>
  <?=form_open(uri_string(),array('class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('id',$standard['id']);?>
  <div class="panel-body">

    <div class="form-group"> <?=form_label('หน่วยงาน','department',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'department','class'=>'form-control'),set_value('department',$standard['department']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สาขาอาชีพ','branch',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'branch','class'=>'form-control'),set_value('branch',$standard['branch']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ระดับ','level',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'level','class'=>'form-control'),set_value('level',$standard['level']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ประเภทการสอบ','category',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $c = array(''=>'เลือกรายการ','ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ'=>'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',
          'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ'=>'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',
          'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ'=>'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',
          'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)'=>'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)');
        echo form_dropdown(array('name'=>'category','class'=>'form-control','id'=>'ctg'),$c,set_value('category',$standard['category']));?>
      </div>
    </div>

    <div class="form-group"> <?=form_label('คำนำหน้าชื่อ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
        echo form_dropdown(array('name'=>'profile[title]','class'=>'form-control'),$tt,set_value('profile[title]',$profile['title']));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[firstname]','class'=>'form-control'),set_value('profile[firstname]',$profile['firstname']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('นามสกุล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[lastname]','class'=>'form-control'),set_value('profile[lastname]',$profile['lastname']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อเต็ม(ภาษาอังกฤษ)','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[fullname]','class'=>'form-control'),set_value('profile[fullname]',$profile['fullname']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ศาสนา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[religion]','class'=>'form-control'),set_value('profile[religion]',$profile['religion']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สัญชาติ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[nationality]','class'=>'form-control'),set_value('profile[nationality]',$profile['nationality']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[id_card]','class'=>'form-control','id'=>'id_card','readonly'=>TRUE),set_value('profile[id_card]',$profile['id_card']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ว/ด/ป เกิด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-2"> <?php $d = array(''=>'วัน');
        foreach (range('1','31') as $value) $d[$value] = $value;
        echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',($user['birthdate']) ? date('d',($profile['birthdate'])) : ''));?>
      </div>
      <div class="col-md-3"> <?=form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',($user['birthdate']) ? date('m',$profile['birthdate']) : ''));?> </div>
      <div class="col-md-3"> <?php $y = array(''=>'ปี พ.ศ.');
        foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
        echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',($user['birthdate']) ? date('Y',$profile['birthdate'])+543 : ''));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',$address['address']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',$address['street']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[tambon]','class'=>'form-control'),set_value('address[tambon]',$address['tambon']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[amphur]','class'=>'form-control'),set_value('address[amphur]',$address['amphur']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[province]','class'=>'form-control'),set_value('address[province]',$address['province']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control zip'),set_value('address[zip]',$address['zip']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อีเมล์','email',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_email(array('name'=>'address[email]','class'=>'form-control'),set_value('address[email]',$address['email']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[phone]','class'=>'form-control tel','max_length'=>'10'),set_value('address[phone]',$address['phone']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address[fax]','class'=>'form-control tel','max_length'=>'10'),set_value('address[fax]',$address['fax']));?> </div>
    </div>

    <div class="form-group"> <?=form_label('ระดับการศึกษาสูงสุด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $e = array(''=>'เลือกรายการ','ประถมศึกษา'=>'ประถมศึกษา','ม.3'=>'ม.3','ม.6'=>'ม.6',
        'ปก.ศ.ต้น'=>'ปก.ศ.ต้น','ปก.ศ.สูง/อนุปริญญา'=>'ปก.ศ.สูง/อนุปริญญา','ปวช.'=>'ปวช.','ปวท.'=>'ปวท.',
        'ปวส.'=>'ปวส.','ปริญญาตรี'=>'ปริญญาตรี','ปริญญาโท'=>'ปริญญาโท','ปริญญาเอก'=>'ปริญญาเอก');
        echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control'),$e,set_value('education[degree]',$education['degree']));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สาขาวิชา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[branch]','class'=>'form-control'),set_value('education[branch]',$education['branch']));?> </div>
    </div>
    <div class="form-group">
      <?=form_label('สถานศึกษา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[place]','class'=>'form-control'),set_value('education[place]',$education['place']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'education[province]','class'=>'form-control'),set_value('education[province]',$education['province']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ปี พ.ศ.ที่สำเร็จ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $y = array(''=>'ปี'); foreach (range((date('Y')+543),'2520') as $value) $y[$value] = $value;
        echo form_dropdown(array('name'=>'education[year]','class'=>'form-control'),$y,set_value('education[year]',$education['year']));?>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('ข้อมูลการทำงานในปัจจุบัน','work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $ws = array(''=>'เลือกรายการ','ผู้มีงานทำ'=>'ผู้มีงานทำ','ผู้ไม่มีงานทำ'=>'ผู้ไม่มีงานทำ');
        echo form_dropdown(array('name'=>'work_status','class'=>'form-control','id'=>'work_status'),$ws,set_value('work_status',$standard['work_status']));?>
      </div>
    </div>

    <div class="form-group"> <?=form_label('สถานภาพ(ผู้ไม่มีงานทำ)','work_no',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $wn = array(''=>'เลือกรายการ','อยู่ระหว่างหางาน'=>'อยู่ระหว่างหางาน','นักเรียน/นักศึกษา'=>'นักเรียน/นักศึกษา',
          'ทหารก่อนปลดประจำการ'=>'ทหารก่อนปลดประจำการ','ผู้อยู่ในสถานพินิจ'=>'ผู้อยู่ในสถานพินิจ','ผู้ต้องขัง'=>'ผู้ต้องขัง','ผู้ประกันตนที่ถูกเลิกจ้าง'=>'ผู้ประกันตนที่ถูกเลิกจ้าง');
          echo form_dropdown(array('name'=>'work_no','class'=>'form-control','id'=>'work_no'),$wn,set_value('work_no',$standard['work_no']));?>
        <p class="help-block">*ให้เลือกกรณีเป็นผู้ไม่มีงานทำ</p>
      </div>
    </div>
    <div id="work_yes">
      <div class="form-group"> <?=form_label('สถานภาพ(ผู้มีงานทำ)','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $w = array(''=>'เลือกรายการ','ทำงานภาครัฐ'=>'ทำงานภาครัฐ','ทำงานภาคเอกชน'=>'ทำงานภาคเอกชน','ทำงานรัฐวิสาหกิจ'=>'ทำงานรัฐวิสาหกิจ',
            'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ'=>'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ','ช่วยธุรกิจครัวเรือน'=>'ช่วยธุรกิจครัวเรือน');
          echo form_dropdown(array('name'=>'work_yes[category]','class'=>'form-control','id'=>'work_category'),$w,set_value('work_yes[category]',$work_yes['category']));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?php $c = array(''=>'เลือกรายการ');
          echo form_dropdown(array('name'=>'work_yes[type]','class'=>'form-control','id'=>'work_type'),$c,set_value('work_yes[type]',$work_yes['type']));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทอุตสาหกรรม','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $g = array('ยานยนต์และชิ้นส่วน'=>'ยานยนต์และชิ้นส่วน','เหล็กและเหล็กกล้า'=>'เหล็กและเหล็กกล้า','เฟอร์นิเจอร์'=>'เฟอร์นิเจอร์','อาหาร'=>'อาหาร','ซอฟต์แวร์'=>'ซอฟต์แวร์',
            'ปิโตรเคมี'=>'ปิโตรเคมี','ไฟฟ้าและอิเล็กทรอนิกส์'=>'ไฟฟ้าและอิเล็กทรอนิกส์','สิ่งทอและแฟชั่น'=>'สิ่งทอและแฟชั่น','เซรามิกส์'=>'เซรามิกส์','แม่พิมพ์'=>'แม่พิมพ์',
            'ก่อสร้าง'=>'ก่อสร้าง','โลจิสติกส์'=>'โลจิสติกส์','ท่องเที่ยวและบริการ'=>'ท่องเที่ยวและบริการ','ผลิตภัณฑ์ยาง'=>'ผลิตภัณฑ์ยาง');
            echo form_dropdown(array('name'=>'work_yes[group]','class'=>'form-control','id'=>'work_group'),$g,set_value('work_yes[group]',$work_yes['group']));?>
            <p class="help-block">*ให้เลือกกรณีไม่ได้ทำงานภาครัฐ</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทการจ้าง','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $wi = array(''=>'เลือกรายการ','รายเดือน'=>'รายเดือน','รายสัปดาห์'=>'รายสัปดาห์','รายวัน'=>'รายวัน','รายชั่วโมง'=>'รายชั่วโมง','งานเหมา/รายชิ้น'=>'งานเหมา/รายชิ้น');
          echo form_dropdown(array('name'=>'work_yes[income]','class'=>'form-control'),$wi,set_value('work_yes[income]',$work_yes['income']));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('รายได้เฉลี่ยต่อเดือน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $wia = array(''=>'เลือกรายการ','1-5,000 บาท'=>'1-5,000 บาท','5,001-9,000 บาท'=>'5,001-9,000 บาท','9,001-15,000 บาท'=>'9,001-15,000 บาท',
            '15,001-20,000 บาท'=>'15,001-20,000 บาท','20,001-30,000 บาท'=>'20,001-30,000 บาท','30,001-40,000 บาท'=>'30,001-40,000 บาท','40,001 บาทขึ้นไป'=>'40,001 บาทขึ้นไป');
          echo form_dropdown(array('name'=>'work_yes[income_amount]','class'=>'form-control'),$wia,set_value('work_yes[income_amount]',$work_yes['income_amount']));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[position]','class'=>'form-control'),set_value('work_yes[position]',$work_yes['position']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อายุงาน(ปี)','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[age]','class'=>'form-control'),set_value('work_yes[age]',$work_yes['age']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อสถานที่ทำงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[place]','class'=>'form-control'),set_value('work_yes[place]',$work_yes['place']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[street]','class'=>'form-control'),set_value('work_yes[street]',$work_yes['street']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[tambon]','class'=>'form-control'),set_value('work_yes[tambon]',$work_yes['tambon']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[amphur]','class'=>'form-control'),set_value('work_yes[amphur]',$work_yes['amphur']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[province]','class'=>'form-control'),set_value('work_yes[province]',$work_yes['province']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[zip]','class'=>'form-control zip'),set_value('work_yes[zip]',$work_yes['zip']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[phone]','class'=>'form-control tel','max_length'=>'10'),set_value('work_yes[phone]',$work_yes['phone']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[fax]','class'=>'form-control tel','max_length'=>'10'),set_value('work_yes[fax]',$work_yes['fax']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จำนวนลูกจ้างทั้งหมด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $e = array(''=>'เลือกรายการ','1-100 คน'=>'1-100 คน','101-200 คน'=>'101-200 คน','201-300 คน'=>'201-300 คน','301 คนขึ้นไป'=>'301 คนขึ้นไป');
          echo form_dropdown(array('name'=>'work_yes[employee_amount]','class'=>'form-control'),$e,set_value('work_yes[employee_amount]',$work_yes['employee_amount']));?>
        </div>
      </div>
    </div>

    <div class="form-group"> <?=form_label('ความต้องการหางาน','need_work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $tt = array(''=>'เลือกรายการ','ไม่ต้องการ'=>'ไม่ต้องการ','ต้องการจัดหางานในประเทศ'=>'ต้องการจัดหางานในประเทศ','ต้องการจัดหางานในต่างประเทศ'=>'ต้องการจัดหางานในต่างประเทศ');
        echo form_dropdown(array('name'=>'need_work_status','class'=>'form-control','id'=>'need_work_status'),$tt,set_value('need_work_status',$standard['need_work_status']));?>
      </div>
    </div>
    <div id="local">
      <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ','need_work_position',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_position','class'=>'form-control'),set_value('need_work_position',$standard['need_work_position'])); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('กลุ่มอุตสาหกรรม','need_work_group',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_group','class'=>'form-control'),set_value('need_work_group',$standard['need_work_group'])); ?> <p class="help-block">*ให้เลือกกรรณีจัดหางานในประเทศ</p> </div>
      </div>
    </div>
    <div id="abroad">
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน','need_work_country',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_country','class'=>'form-control'),set_value('need_work_country',$standard['need_work_country'])); ?> <p class="help-block">*ให้เลือกกรณีจัดหางานในต่างประเทศ</p> </div> </div>
    </div>
    <hr>
    <div id="ctg_ctn">
      <div class="form-group"> <?=form_label('ชื่อบริษัทจัดหางาน/สถานที่ทำงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[agent]','class'=>'form-control'),set_value('work_abroad[agent]',$work_abroad['agent']));?> <p class="help-block">*กรณีทดสอบฝีมือแรงงานเพื่อไปทำงานในต่างประเทศ</p> </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อบริษัทนายจ้าง','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[company]','class'=>'form-control'),set_value('work_abroad[company]',$work_abroad['company']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เลขที่/หมู่ที่/ชื่อหน่วยงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[address]','class'=>'form-control'),set_value('work_abroad[address]',$work_abroad['address']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[street]','class'=>'form-control'),set_value('work_abroad[street]',$work_abroad['street']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[tambon]','class'=>'form-control'),set_value('work_abroad[tambon]',$work_abroad['tambon']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[amphur]','class'=>'form-control'),set_value('work_abroad[amphur]',$work_abroad['amphur']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[province]','class'=>'form-control'),set_value('work_abroad[province]',$work_abroad['province']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[zip]','class'=>'form-control zip'),set_value('work_abroad[zip]',$work_abroad['zip']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เบอร์โทรศัพท์','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[phone]','class'=>'form-control tel'),set_value('work_abroad[phone]',$work_abroad['phone']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[country]','class'=>'form-control'),set_value('work_abroad[country]',$work_abroad['country'])); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('ระยะเวลาจ้าง','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[duration]','class'=>'form-control','id'=>'duration','maxlength'=>'2'),set_value('work_abroad[duration]',$work_abroad['duration']));?> </div>
      </div>
    </div>

    <div class="form-group"> <?=form_label('ประเภทผู้สมัคร','type',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $c = array(''=>'เลือกรายการ','ผู้รับการฝึกจาก กพร.'=>'ผู้รับการฝึกจาก กพร.','จากสถานศึกษา'=>'จากสถานศึกษา',
        'จากภาครัฐ'=>'จากภาครัฐ','จากภาคเอกชน'=>'จากภาคเอกชน','บุคคลทั่วไป'=>'บุคคลทั่วไป');
        echo form_dropdown(array('name'=>'type','class'=>'form-control'),$c,set_value('type',$standard['type']));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สภาพร่างกาย','health',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $h = array(''=>'เลือกรายการ','ปกติ'=>'ปกติ','พิการ'=>'พิการ');
        echo form_dropdown(array('name'=>'health','class'=>'form-control','id'=>'health'),$h,set_value('health',$standard['health']));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ความพิการ','health_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $hs = array('การมองเห็น'=>'การมองเห็น','การได้ยิน'=>'การได้ยิน','การเคลื่อนไหว'=>'การเคลื่อนไหว');
        echo form_dropdown(array('name'=>'health_status','class'=>'form-control','id'=>'health_status'),$hs,set_value('health_status',$standard['health_status']));?>
        <p class="help-block">*ให้เลือกกรณีสถาพร่างกายพิการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('เอกสารที่แนบมาด้วย','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[refer]'),'สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน',set_checkbox('reference[refer]','สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน',(isset($reference['refer']))));?>สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน</label> </div>
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',set_checkbox('reference[copy]','สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',(isset($reference['copy']))));?>สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน</label> </div>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'อื่นๆ'),set_value('reference[etc]',$reference['etc']));?>
        <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นความจริงทุกประการและได้แนบหลักฐานการสมัครมาด้วย</p>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary btn-block'));?> </div>
    </div>

  </div>
  <div class="panel-footer"> </div>
  <?=form_close();?>
</div>

<script type="text/javascript">
$(function(){
  var work_category = $('#work_category');
  var ctg = $('#ctg');
  var ctg_ctn = $('#ctg_ctn :input');
  var work_type = $('#work_type');
  var work_status = $('#work_status');
  var work_yes = $('#work_yes :input');
  var need_work_status = $('#need_work_status');
  var local = $('div#local :input');
  var abroad = $('div#abroad :input');
  var health = $('#health');

  <?php if ($standard['work_status'] != 'ผู้มีงานทำ') : ?>
  work_yes.prop('disabled',true);
  <?php endif; ?>
  $('#work_no').prop('disabled',true);
  work_status.on('change',function(){
    if (this.value === 'ผู้มีงานทำ') {
      work_yes.prop('disabled',false);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',false);
    } else if (this.value === 'ผู้ไม่มีงานทำ') {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',false);
      $('#work_group').prop('disabled',true);
    } else {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',true);
    }
  });

  work_category.on('change',function(){
    $.post('../get_work_type/'+this.value,function(data) {
      work_type.empty();
      $.each(data,function(key,value) {
        work_type.append('<option value="'+key+'">'+value+'</option>');
      });
    });
    if (this.value !== 'ทำงานภาครัฐ') {
      $('#work_group').prop('disabled',false);
    } else {
      $('#work_group').prop('disabled',true);
    }
  });

  <?php if ($standard['need_work_status'] == 'ไม่ต้องการ') : ?>
  local.prop('disabled',true);
  abroad.prop('disabled',true);
  <?php elseif ($standard['need_work_status'] == 'ต้องการจัดหางานในประเทศ') : ?>
  local.prop('disabled',false);
  abroad.prop('disabled',true);
  <?php else: ?>
  local.prop('disabled',true);
  abroad.prop('disabled',false);
  <?php endif; ?>
  need_work_status.on('change',function(){
    if (this.value === 'ไม่ต้องการ') {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในประเทศ') {
      local.prop('disabled',false);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในต่างประเทศ') {
      local.prop('disabled',true);
      abroad.prop('disabled',false);
    } else {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    }
  });

  ctg_ctn.prop('disabled',true);
  ctg.on('change',function(){
    if (this.value === 'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ') {
      ctg_ctn.prop('disabled',false);
    } else {
      ctg_ctn.prop('disabled',true);
    }
  });

  $('#health_status').prop('disabled',true);
  health.on('change',function(){
    if (this.value == 'พิการ') {
      $('#health_status').prop('disabled',false);
    } else {
      $('#health_status').prop('disabled',true);
    }
  });

  $('#work_no').editableSelect();
  $('#work_group').editableSelect();
  $('#health_status').editableSelect();

  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');
});
</script>