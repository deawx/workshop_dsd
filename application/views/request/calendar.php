<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.css" />
<link rel="stylesheet" media="print" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.print.css" />
<?=script_tag('assets/js/moment.min.js');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/th.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.js"></script>

<div class="" id="calendar"> </div>

<br>
<p>*การสอบมาตรฐานฝีมือแรงงานแห่งชาติ ช่วงเช้า 15คน/วัน</p>
<p>*การสอบรับรองความรู้ความสามารถ ช่วงเช้า 13คน ช่วงบ่าย 13คน/วัน</p>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">ตารางวันสอบพร้อมแสดงสถานะ</h3>
  </div>
  <div class="panel-body">
  </div>
  <div class="panel-footer">
  </div>
</div>

<div class="modal fade" id="dayClick" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id=""></h4>
      </div>
      <div class="modal-body" id="eventContent" title="Event Details">
        Start: <span id="startTime"></span><br>
        End: <span id="endTime"></span><br><br>
        <p id="eventInfo"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"></button>
      </div>
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
    validRange: function(nowDate) { return { start: nowDate.add(1,'day'), end: nowDate.clone().add(6,'months') }; },
    businessHours: [ { dow: [ 1,2,3,4,5 ], start: '08:00', end: '17:00' } ],

    resources: {
      url: '',
        error: function() {
      }
    },
    dayClick: function(date, jsEvent, view) {
      console.log('Clicked on: ' + date.format());
      modal.modal('show');
    },

    events: [
      { title : 'event1', start : '2017-09-25' },
      { title : 'event2', start : '2017-09-28', end : '2017-09-29' },
      { title : 'event3', start : '2017-09-16T12:30:00', allDay : false }
    ],
    eventRender: function(event, element){
      element.attr('href', 'javascript:void(0);');
      element.click(function() {
        $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
        $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
        $("#eventInfo").html(event.description);
        $("#eventContent").dialog({ modal: true, title: event.title, width:350});
      });
    },
    eventClick: function(calEvent, jsEvent, view) {
      console.log(': ' + calEvent);
      console.log('Event: ' + calEvent.title);
    }

  });

  modal.on('show.bs.modal',function(e) {
    var button = $(e.relatedTarget);
    // var recipient = button.data('whatever');
    var modal = $(this);
  })

});
</script>
