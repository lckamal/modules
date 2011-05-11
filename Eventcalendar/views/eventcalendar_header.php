<ion:eventcalendar>
    <!-- Start Event Calendar -->
    <link rel='stylesheet' type='text/css' href='<ion:base_url />modules/Eventcalendar/lib/styles/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='<ion:base_url />modules/Eventcalendar/lib/styles/fullcalendar.print.css' media='print' />
    <script type='text/javascript' src='<ion:base_url />modules/Eventcalendar/lib/javascripts/jquery-1.6.min.js'></script>
    <script type='text/javascript' src='<ion:base_url />modules/Eventcalendar/lib/javascripts/jquery-ui-1.8.11.custom.min.js'></script>
    <script type='text/javascript' src='<ion:base_url />modules/Eventcalendar/lib/javascripts/fullcalendar.js'></script>
    <script type='text/javascript'>
        $(document).ready(function() {

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                editable: false,
                height: 320,
                disableDragging: false,

                header: {

                    left: 'title',
                    center: 'prev,next today',
                    right: ''
                },
                buttonText: {
                        prev:     '&nbsp;&#9668;&nbsp;',  // left triangle
                        next:     '&nbsp;&#9658;&nbsp;',  // right triangle
                        prevYear: '&nbsp;&lt;&lt;&nbsp;', // <<
                        nextYear: '&nbsp;&gt;&gt;&nbsp;', // >>
                        today:    '<ion:translation term="today" />',
                        month:    '<ion:translation term="month" />',
                        week:     '<ion:translation term="week" />',
                        day:      '<ion:translation term="day" />'
                    },
                monthNames:[
                    '<ion:translation term="january" />',
                    '<ion:translation term="february" />',
                    '<ion:translation term="march" />',
                    '<ion:translation term="april" />',
                    '<ion:translation term="may" />',
                    '<ion:translation term="june" />',
                    '<ion:translation term="july" />',
                    '<ion:translation term="august" />',
                    '<ion:translation term="september" />',
                    '<ion:translation term="october" />',
                    '<ion:translation term="november" />',
                    '<ion:translation term="december" />'
                ],
                monthNamesShort: [
                    '<ion:translation term="jan" />',
                    '<ion:translation term="feb" />',
                    '<ion:translation term="mar" />',
                    '<ion:translation term="apr" />',
                    '<ion:translation term="may" />',
                    '<ion:translation term="jun" />',
                    '<ion:translation term="jul" />',
                    '<ion:translation term="aug" />',
                    '<ion:translation term="sep" />',
                    '<ion:translation term="oct" />',
                    '<ion:translation term="nov" />',
                    '<ion:translation term="dec" />'
                ],
                dayNames: [
                    '<ion:translation term="monday" />',
                    '<ion:translation term="tuesday" />',
                    '<ion:translation term="wednesday" />',
                    '<ion:translation term="thursday" />',
                    '<ion:translation term="friday" />',
                    '<ion:translation term="saturday" />',
                    '<ion:translation term="sunday" />'
                ],
                dayNamesShort: [
                    '<ion:translation term="sun" />',
                    '<ion:translation term="mon" />',
                    '<ion:translation term="tue" />',
                    '<ion:translation term="wed" />',
                    '<ion:translation term="thu" />',
                    '<ion:translation term="fri" />',
                    '<ion:translation term="sat" />'
                ],
                events: [
                            <ion:events>
                                {
                                    start: '<ion:start_date />',
                                    <?php if('<ion:start_date />' != ''): ?>
                                        end: '<ion:end_date />',
                                    <?php endif; ?>
                                    <?php if('<ion:url />' != ''): ?>
                                        url: '<ion:url />',
                                    <?php endif; ?>
                                    title: '<ion:title />'
                                },
                            </ion:events>
                        ],
//                   eventMouseover: function(calEvent, jsEvent, viw){
//                       alert('Event: ' + calEvent.title + calEvent.subtitle + calEvent.description);
//                   }
            });
        });

    </script>
</ion:eventcalendar>
