<div class="" id="calendar"> </div> <br>
<p>*การสอบมาตรฐานฝีมือแรงงานแห่งชาติ 15คน/วัน</p>
<p>*การสอบรับรองความรู้ความสามารถ 26คน/วัน</p>

<div class="modal fade" id="dayClick" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">กำหนดตารางวันสอบของท่าน</h4> </div>
      <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
      <div class="modal-body">
        <h4 class="text-center" id="full">รายการลงทะเบียนเต็มแล้ว</h4>
        <div id="form">
          <div class="form-group"> <?=form_label('รายการคำร้อง','',array('class'=>'control-label col-md-3'));?>
            <div class="col-md-9"> <?php foreach ($request as $key => $value) :
              $category = isset($value['category']) ? $value['category'] : 'ใบรับรองความรู้ความสามารถ';
              $type = isset($value['category']) ? 'standard' : 'skill'; ?>
              <label><?=form_radio('code',$value['date_create'],set_radio('code',$value['date_create']),array('data-type'=>$type));?><?=$category;?></label>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="form-group"> <?=form_label('วันที่เลือกสอบ','',array('class'=>'control-label col-md-3'));?>
            <div class="col-md-9"> <?=form_input(array('name'=>'approve_schedule','class'=>'form-control','id'=>'dayTime','readonly'=>TRUE));?> </div>
          </div>
          <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-3'));?>
            <div class="col-md-9"> <?=form_submit('','บันทึกข้อมูล',array('class'=>'btn btn-primary btn-block'));?> </div>
          </div>
        </div>
      </div>
      <?=form_close();?>
      <div class="modal-footer" style="padding:0;"> <table class="table table-bordered"> <thead> <tr> <th>ประเภทการสอบ</th> <th>ผู้เข้าสอบ</th> </tr> </thead> <tbody> </tbody></table> </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){

  $.fullCalendar.locale("th", {
    buttonText: {
      month: "เดือน",
      week: "สัปดาห์",
      day: "วัน",
      list: "แผนงาน"
    },
    allDayText: "ตลอดวัน",
    eventLimitText: "เพิ่มเติม",
    noEventsMessage: "ไม่มีกิจกรรมที่จะแสดง"
  });

  var calendar = $('#calendar');
  var modal = $('#dayClick');

  calendar.fullCalendar({
    header: { left: 'title', right: 'today,prev,next' },
    defaultView: 'month',
    eventLimit: true,
    eventLimit: 1,
    validRange: function(nowDate) { return { start: nowDate.add(1,'day'), end: nowDate.clone().add(6,'months') }; },
    hiddenDays: [ 0,6 ],
    businessHours: [{ dow: [ 1,2,3,4,5 ], start: '08:00', end: '17:00' }],
    events: [
      <?php foreach ($schedule as $value) : ?>
      {
        title : '<?=$value["title"]?>',
        start : '<?=$value["start"]?>'
      },
      <?php endforeach; ?>
    ],
    // eventRender: function(event,element){
    //   $(element).each(function(){
    //       $(this).attr('date-num',event.start.format('YYYY-MM-DD'));
    //   });
    //   element.attr('href', 'javascript:void(0);');
    //   element.click(function() {
    //     $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
    //     $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
    //     $("#eventInfo").html(event.description);
    //     $("#eventContent").dialog({ modal: true, title: event.title, width:350});
    //   });
    // },
    // dayRender: function(date,cell) {
    // },
    // eventAfterAllRender: function(view) {
    //   for(cDay = view.start.clone(); cDay.isBefore(view.end); cDay.add(1,'day')) {
    //     var dateNum = cDay.format('YYYY-MM-DD');
    //     var dayEl = $('.fc-day[data-date="' + dateNum + '"]');
    //     var eventCount = $('.fc-event[date-num="' + dateNum + '"]').length;
    //     if (eventCount > 15) {
    //       dayEl.css('background-color','red');
    //       var html = '<span class="label label-success">'+eventCount+' รายการ</span>';
    //       dayEl.append(html);
    //     }
    //   }
    // },
    // eventClick: function(calEvent,jsEvent,view) {
    //   console.log(': ' + calEvent);
    //   console.log('Event: ' + calEvent.title);
    // },
    dayClick: function(date,jsEvent,view) {
      $("#dayTime").val(date.format('DD-MM-YYYY'));
      modal.modal('show');
    }
  });

  modal.on('show.bs.modal',function(e) {
    var related = $(e.relatedTarget);
    var date = $('input#dayTime').val();
    var modal = $(this);
    modal.find('.modal-body#full').hide();
    $.post('get_event/'+date,function(d) {
      modal.find(':radio[data-type="standard"]').removeAttr('disabled').prop('checked',false);
      modal.find(':radio[data-type="skill"]').removeAttr('disabled').prop('checked',false);
      modal.find('#form').show();
      modal.find('#full').hide();
      if (d.standard === 'full' && d.skill === 'full') {
        modal.find('#form').hide();
        modal.find('#full').show();
      } else if (d.skill == 'full') {
        modal.find('#form').show();
        modal.find(':radio[data-type="skill"]').prop('disabled',true);
      } else if (d.standard == 'full') {
        modal.find('#form').show();
        modal.find(':radio[data-type="standard"]').prop('disabled',true);
      } else {
        modal.find('#form').show();
        modal.find('#full').hide();
      }
      delete d.standard;
      delete d.skill;
      modal.find('table>tbody').empty();
      $.each(d,function(k,v) {
        if (typeof v.category === 'undefined') {
          v.category = 'ใบรับรองความรู้ความสามารถ';
        }
        modal.find('table>tbody').append('<tr><td class="text-left">'+v.category+'</td><td>'+v.firstname+' '+v.lastname+'</td></tr>');
      });
    });
  });

});
</script>
