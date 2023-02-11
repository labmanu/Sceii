// Call this from the developer console and you can control both instances
var calendars = {};
var dias = JSON.parse(asistencias);
var eventArray = [];

//console.log(dias);
for (let i = 0; i < dias.length; i++) {
    const dia = dias[i];
    var text = "";

    if(dia.fecha_ingreso != null){
        var dti = dia.fecha_ingreso.split(" ");
        text += 'Entrada:  '+dti[1];
        if(dia.fecha_salida != null){
            var dts = dia.fecha_salida.split(" ");
            text += '<br>Salida: '+dts[1];
        }else{
            text += '<br>Salida: Asistencia en curso';
        }

        //console.log(text);
        
        eventArray.push({
            date: dti[0],
            title: text
        });
    }

    
}

$(document).ready( function() {
    console.info(
        'Welcome to the CLNDR demo. Click around on the calendars and' +
        'the console will log different events that fire.');

    // Assuming you've got the appropriate language files,
    // clndr will respect whatever moment's language is set to.
    // moment.locale('ru');

    // Here's some magic to make sure the dates are happening this month.
    // var thisMonth = moment().format('YYYY-MM');
    // Events to load into calendar
    
    //console.log(eventArray);

    // The order of the click handlers is predictable. Direct click action
    // callbacks come first: click, nextMonth, previousMonth, nextYear,
    // previousYear, nextInterval, previousInterval, or today. Then
    // onMonthChange (if the month changed), inIntervalChange if the interval
    // has changed, and finally onYearChange (if the year changed).
    calendars.clndr1 = $('.cal1').clndr({
        events: eventArray,
        clickEvents: {
            click: function (target) {
                console.log('Cal-1 clicked: ', target);
                
                var aux = JSON.stringify(target);
                var c = JSON.parse(aux);
                //console.log(aux);
                //console.log(c)
                //console.log(c.events.length)
                var texto = "";

                if(c.events.length > 1){
                    for (let i = 0; i < c.events.length; i++) {
                        const element = c.events[i].title;
                        texto+=element;
                        if(i < c.events.length-1){
                            texto += "<br><br>";
                        }
                        //console.log(c.events[i].title)
                    }
                }else if(c.events.length == 1){
                    texto = c.events[0].title;
                }

                Swal.fire({
                    background: '#131414',
                    color: 'white',
                    icon: 'info',
                    title: c.date.split("T")[0],
                    html : texto
                    //text: 'info -> '+aux,
                })


            },
            today: function () {
                console.log('Cal-1 today');
            },
            nextMonth: function () {
                console.log('Cal-1 next month');
            },
            previousMonth: function () {
                console.log('Cal-1 previous month');
            },
            onMonthChange: function () {
                console.log('Cal-1 month changed');
            },
            nextYear: function () {
                console.log('Cal-1 next year');
            },
            previousYear: function () {
                console.log('Cal-1 previous year');
            },
            onYearChange: function () {
                console.log('Cal-1 year changed');
            },
            nextInterval: function () {
                console.log('Cal-1 next interval');
            },
            previousInterval: function () {
                console.log('Cal-1 previous interval');
            },
            onIntervalChange: function () {
                console.log('Cal-1 interval changed');
            }
        },
        multiDayEvents: {
            singleDay: 'date',
            endDate: 'endDate',
            startDate: 'startDate'
        },
        showAdjacentMonths: true,
        adjacentDaysChangeMonth: false
    });

    // Bind all clndrs to the left and right arrow keys
    $(document).keydown( function(e) {
        // Left arrow
        if (e.keyCode == 37) {
            calendars.clndr1.back();
            calendars.clndr2.back();
            calendars.clndr3.back();
        }

        // Right arrow
        if (e.keyCode == 39) {
            calendars.clndr1.forward();
            calendars.clndr2.forward();
            calendars.clndr3.forward();
        }
    });
});