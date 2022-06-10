@extends('workLayout')

@section('content')

    <div id='calendar' >

    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 600,
                headerToolbar: {
                    start: 'title',
                    center: '',
                    end: 'prev,next'
                },
                titleFormat: {
                    month: 'short',
                    year: 'numeric',
                },
                displayEventTime: false,
                locale: 'ru',
                timeZone: 'UTC',
                events: '/calendar/get'
            });
            calendar.render();
        });

    </script>
@endsection
