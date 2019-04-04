
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12 text-center">
            Actividades
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="responsive-calendar">
                <div class="controls w-100">
                    <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
                    <h4><span data-head-year></span> <span data-head-month></span></h4>
                    <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
                </div><hr/>
                <div class="day-headers">
                    <div class="day header">Mon</div>
                    <div class="day header">Tue</div>
                    <div class="day header">Wed</div>
                    <div class="day header">Thu</div>
                    <div class="day header">Fri</div>
                    <div class="day header">Sat</div>
                    <div class="day header">Sun</div>
                </div>
                <div class="days" data-group="days"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $(".responsive-calendar").responsiveCalendar({
            time: '2019-04',
            translateMonths: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
            events: {
                "2019-04-30": {"number": 5, "url": ""},
                "2019-04-26": {"number": 1, "url": ""}, 
                "2019-04-03": {"number": 1}, 
                "2019-04-12": {}
            }
        });
    });
</script>