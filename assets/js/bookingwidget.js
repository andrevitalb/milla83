let openBooking = 0;
let bookingDate = "";
let bookingTime = "";
let successSvg = '<?xml version="1.0" encoding="iso-8859-1"?><svg version="1.1" id="svgNotifS" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"    viewBox="0 0 507.2 507.2" style="enable-background:new 0 0 507.2 507.2;" xml:space="preserve"><circle style="fill:#32BA7C;" cx="253.6" cy="253.6" r="253.6"/><path style="fill:#0AA06E;" d="M188.8,368l130.4,130.4c108-28.8,188-127.2,188-244.8c0-2.4,0-4.8,0-7.2L404.8,152L188.8,368z"/><g>   <path style="fill:#FFFFFF;" d="M260,310.4c11.2,11.2,11.2,30.4,0,41.6l-23.2,23.2c-11.2,11.2-30.4,11.2-41.6,0L93.6,272.8      c-11.2-11.2-11.2-30.4,0-41.6l23.2-23.2c11.2-11.2,30.4-11.2,41.6,0L260,310.4z"/> <path style="fill:#FFFFFF;" d="M348.8,133.6c11.2-11.2,30.4-11.2,41.6,0l23.2,23.2c11.2,11.2,11.2,30.4,0,41.6l-176,175.2      c-11.2,11.2-30.4,11.2-41.6,0l-23.2-23.2c-11.2-11.2-11.2-30.4,0-41.6L348.8,133.6z"/></g></svg>';
let errorSvg = '<?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="svgNotifE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 455.1 455.1" style="enable-background:new 0 0 455.1 455.1;" xml:space="preserve"><style type="text/css">  .st0{fill:#E24C4B;} .st1{fill:#D1403F;} .st2{fill:#FFFFFF;}</style><circle class="st0" cx="227.6" cy="227.6" r="227.6"/><path class="st1" d="M455.1,227.6c0,125.2-102.4,227.6-227.6,227.6c-72.5,0-136.5-32.7-177.8-85.3c38.4,31.3,88.2,49.8,142.2,49.8  c125.2,0,227.6-102.4,227.6-227.6c0-54-18.5-103.8-49.8-142.2C422.4,91,455.1,155,455.1,227.6z"/><path class="st2" d="M331.4,331.4c-8.5,8.5-22.8,8.5-31.3,0l-72.5-72.5L155,331.4c-8.5,8.5-22.8,8.5-31.3,0s-8.5-22.8,0-31.3 l72.5-72.5L123.7,155c-8.5-8.5-8.5-22.8,0-31.3s22.8-8.5,31.3,0l72.5,72.5l72.5-72.5c8.5-8.5,22.8-8.5,31.3,0s8.5,22.8,0,31.3   l-72.5,72.5l72.5,72.5C339.9,308.6,339.9,322.8,331.4,331.4z"/></svg>';

$('.bWButton').click(function(){
    if(!openBooking) {
        $('.bWContainer').animate({
            opacity: 1,
            'z-index': 100
        }, 200, function(){});
        $('.bWContainer').css('display','block');
        $('.bWButton').html('<i class="fal fa-times"></i>');
    }
    else {
        $('.bWContainer').animate({
            opacity: 0,
            'z-index': '-100'
        }, 200, function(){});
        $('.bWContainer').css('display','none');
        $('.bWButton').html('<i class="fal fa-calendar-alt"></i>');
    }
    if(openBooking == 0) openBooking = 1;
    else openBooking = 0;
});

$(function () {
    $('.bookingDate').datetimepicker({
        inline: true,
        sideBySide: true
    });

    $('.bookingTime').datetimepicker({
        inline: true,
        sideBySide: true
    });

    $('.datepicker').removeClass('col-md-6');
    $('.datepicker').addClass('col-md-12');

    $('.timepicker').removeClass('col-md-6');
    $('.timepicker').addClass('col-md-12');
});

$('.bookingButton').click(function(){
    switch($('.bookingButtonHolder').attr('data-current')){
        case '1':
            $('.bookingButtonHolder').attr('data-current', '2');

            $('.bookingService').removeClass('active');
            $('.bookingDate').addClass('active');
            $('.bookingTime').removeClass('active');

            $('.bookingButtonHolder').removeClass('page1');
            $('.bookingButtonHolder').addClass('page2');
            $('.bookingButtonHolder').removeClass('page3');
        break;
        case '2':
            switch($(this).attr('data-action')){
                case 'prev': 
                    $('.bookingButtonHolder').attr('data-current', '1');

                    $('.bookingService').addClass('active');
                    $('.bookingDate').removeClass('active');
                    $('.bookingTime').removeClass('active');

                    $('.bookingButtonHolder').addClass('page1');
                    $('.bookingButtonHolder').removeClass('page2');
                    $('.bookingButtonHolder').removeClass('page3');
                break;
                case 'next': 
                    $('.bookingButtonHolder').attr('data-current', '3');

                    $('.bookingService').removeClass('active');
                    $('.bookingDate').removeClass('active');
                    $('.bookingTime').addClass('active');

                    $('.bookingButtonHolder').removeClass('page1');
                    $('.bookingButtonHolder').removeClass('page2');
                    $('.bookingButtonHolder').addClass('page3');

                    bookingDate = $('td.active[data-action="selectDay"]').attr('data-day');
                    let month = bookingDate.substring(0,2);
                    let day = bookingDate.substring(3,5);
                    let year = bookingDate.substring(6,10);
                    $('#bookingDate').val(year + '-' + month + '-' + day);
                break;
            }
        break;
        case '3':
            switch($(this).attr('data-action')){
                case 'prev': 
                    $('.bookingButtonHolder').attr('data-current', '2');

                    $('.bookingService').removeClass('active');
                    $('.bookingDate').addClass('active');
                    $('.bookingTime').removeClass('active');

                    $('.bookingButtonHolder').removeClass('page1');
                    $('.bookingButtonHolder').addClass('page2');
                    $('.bookingButtonHolder').removeClass('page3');
                break;
                case 'appt':
                    hours = $('span[data-action="showHours"]').text().substring(2,4);
                    bookingTime += hours;
                    if(hours >= 10 && hours <= 19){
                        bookingTime += ":";

                        let minutes = parseInt($('span[data-action="showMinutes"]').text().substring(2,4));
                        minutes -= minutes % 5;

                        if(minutes < 10) minutes += '0';
                        if(hours == 19){
                            if(minutes > 30){
                                let bookForm = $('.bookingAppoint');
                                bookForm.find('.col-md-12:not(.bookingNotif)').each(function(){ $(this).addClass('d-none'); });
                                $('.bookingNotif').toggleClass('vis');

                                $('.bookingNotif').html(errorSvg);
                                $('.bookingNotif').append('<p class="bookingNotifMsg">¡Selecciona un horario en el que trabajemos!</p>');

                                setTimeout(function() { 
                                    $('.bookingNotif').toggleClass('vis');
                                    bookForm.find('.col-md-12:not(.bookingNotif)').each(function(){ $(this).removeClass('d-none'); });
                                    $('.bWButton').click();
                                }, 3500);
                            }
                        }

                        bookingTime += minutes;
                        $('#bookingTime').val(bookingTime);

                        $('form.bookingAppoint').submit();
                    }
                    else {
                        let bookForm = $('.bookingAppoint');
                        bookForm.find('.col-md-12:not(.bookingNotif)').each(function(){ $(this).addClass('d-none'); });
                        $('.bookingNotif').toggleClass('vis');

                        $('.bookingNotif').html(errorSvg);
                        $('.bookingNotif').append('<p class="bookingNotifMsg">¡Selecciona un horario en el que trabajemos!</p>');

                        setTimeout(function() { 
                            $('.bookingNotif').toggleClass('vis');
                            bookForm.find('.col-md-12:not(.bookingNotif)').each(function(){ $(this).removeClass('d-none'); });
                            $('.bWButton').click();
                        }, 3500);
                    }
                break;
            }
        break;
    }
});

$('form.bookingAppoint').submit(function(){
    let that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(){
        let that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
            let bookForm = $('.bookingAppoint');
            bookForm.find('.col-md-12:not(.bookingNotif)').each(function(){ $(this).addClass('d-none'); });

            $('.bookingNotif').toggleClass('vis');

            let responseObject = null;

            try { responseObject = JSON.parse(response); }
            catch { console.error('Could not parse JSON!'); }

            if(responseObject.ok) {
                $('.bookingNotif').html(successSvg);
                let msg = '';

                responseObject.messages.forEach((message) => { msg += message; });

                $('.bookingNotif').append('<p class="bookingNotifMsg">'+msg+'</p>');
            }
            else {
                $('.bookingNotif').html(errorSvg);
                let errors = '<p class="bookingNotifMsg">';
                
                responseObject.messages.forEach((message) => {
                    errors += message;
                    errors += '<br>';
                });

                errors += '</p>';
                $('.bookingNotif').append(errors);
            }
            
            setTimeout(function() { 
                $('.bookingNotif').toggleClass('vis');
                bookForm.find('.col-md-12:not(.bookingNotif)').each(function(){ $(this).removeClass('d-none'); });
                $('.bWButton').click();
            }, 3500);
        }
    });

    return false;
});