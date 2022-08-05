

<?php $__env->startSection('content'); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('workLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ArtManager-CRM\resources\views/calendarShow.blade.php ENDPATH**/ ?>