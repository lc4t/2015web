function _ajax(method, url, data, callback) {
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json'
    }).done(function(r) {
        if (r && r.error) {
            return callback && callback(r);
        }
        return callback && callback(null, r);
    }).fail(function(jqXHR, textStatus) {
        return callback && callback({error: 'HTTP ' + jqXHR.status, message: 'Network error (HTTP ' + jqXHR.status + ')'});
    });
}

function getApi(url, data, callback) {
    if (arguments.length === 2) {
        callback = data;
        data = {};
    }
    _ajax('GET', url, data, callback);
}

function postApi(url, data, callback) {
    if (arguments.length === 2) {
        callback = data;
        data = {};
    }
    _ajax('POST', url, data, callback);
}

function showConfirm(title, text, fn_ok, fn_cancel) {
    var s = '<div id="div-confirm" class="uk-modal">' +
            '<div class="uk-modal-dialog">' +
            '<a href="#0" class="uk-modal-close uk-close"></a>' +
            '<h1 class="x-title"></h1>' +
            '<p class="x-text"></p>' +
            '<hr><p class="uk-text-center">' +
            '<button class="uk-button uk-button-primary x-ok"><i class="uk-icon-check"></i> 是</button>' +
            '&nbsp;&nbsp;&nbsp;' +
            '<button class="uk-button x-cancel"><i class="uk-icon-times"></i> 否</button>' +
            '</p></div></div>';
    $('body').append(s);
    var m = $('#div-confirm');
    var modal = new $.UIkit.modal('#div-confirm');
    m.find('.x-title').text(title);
    m.find('.x-text').text(text);
    m.find('.x-ok').click(function () {
        modal.hide();
        fn_ok && fn_ok();
    });
    m.find('.x-cancel').click(function () {
        modal.hide();
        fn_cancel && fn_cancel();
    });
    m.on({
        'uk.modal.hide': function() {
            $('#div-confirm').remove();
        }
    });
    modal.show();
}

function showError(err) {
    var alert = $('div.uk-alert-danger');
    if (err) {
        alert.text(err.message || err.error || err).removeClass('uk-hidden').show();
        try {
            if (alert.offset().top < ($(window).scrollTop() - 41)) {
                $('html,body').animate({scrollTop: alert.offset().top - 41});
            }
        }
        catch (e) {}
    }
    else {
        alert.addClass('uk-hidden').hide().text('');
    }
}

function switchToMonth () {
    $('#calendar').fullCalendar('changeView', 'month');
}

function switchToWeek () {
    $('#calendar').fullCalendar('changeView', 'basicWeek');
}

function switchToDay () {
    $('#calendar').fullCalendar('changeView', 'basicDay');
}

function gotoNext () {
    $('#calendar').fullCalendar('next');
    $('#date_title').text(getDateTitle());
}

function gotoPrev () {
    $('#calendar').fullCalendar('prev');
    $('#date_title').text(getDateTitle());
}

function gotoToday () {
    $('#calendar').fullCalendar('today');
    $('#date_title').text(getDateTitle());
}

function getDateTitle () {
    return $('#calendar').fullCalendar('getDate').format('MMM Do, YYYY');
}

function clearAddDialog () {
    $('#title').val('');
    $('#starttime').val('');
    $('#endtime').val('');
    $('#desc').val('');
    $('#new-event-errmsg').addClass('uk-hidden').show();
    UIkit.modal('#new-event').hide();
}

function clearEditDialog() {
    $('#e_title').val('');
    $('#current_id').val('');
    $('#e_starttime').val('');
    $('#e_startdate').val('');
    $('#e_endtime').val('');
    $('#e_enddate').val('');
    $('#e_desc').val('');
    $('#edit-event-errmsg').addClass('uk-hidden').show();
    UIkit.modal('#edit-event').hide();
}

function addEvent(event){
    event.preventDefault();
    var e_title = $('#title').val();
    var e_start = $('#startdate').val() + 'T' + $('#starttime').val();
    var e_end = $('#enddate').val() + 'T' + $('#endtime').val();
    var e_desc = $('#desc').val();
    if (!e_title || !$('#startdate').val()){
        return showError('Title or start time is empty.');
    }
    postApi('events.php',{
        action: 'insert',
        title: e_title,
        start: e_start,
        end: e_end,
        desc: e_desc
    }, function(err, r){
        if(err){
            return showError(err);
        } else {
            $('#calendar').fullCalendar( 'refetchEvents' );
            clearAddDialog();
        }
    });
}

function displayEvent(calEvent, jsEvent, view) {
    var startDate = moment(calEvent.start).format('YYYY-MM-DD');
    var startTime = moment(calEvent.start).format('HH:mm');
    var endDate = moment(calEvent.end).format('YYYY-MM-DD');
    var endTime = moment(calEvent.end).format('HH:mm');
    $('#e_title').val(calEvent.title);
    $('#current_id').val(calEvent.id);
    $('#e_starttime').val(startTime);
    $('#e_startdate').val(startDate);
    $('#e_endtime').val(endTime);
    $('#e_enddate').val(endDate);
    $('#e_desc').val(calEvent.desc);
    UIkit.modal('#edit-event').show();
}

function deleteEvent(event){
    event.preventDefault();
    showConfirm(
        'Delete an event',
        'Are you sure to remove the event?',
        function (){
            postApi('events.php',{
                action: 'delete',
                id: $('#current_id').val()
            }, function(err, r){
                return $('#calendar').fullCalendar('refetchEvents');
            });
        },
        function(){
            return;
    });
}

function updateEvent(event){
    event.preventDefault();
    var e_title = $('#e_title').val();
    var e_start = $('#e_startdate').val() + 'T' + $('#e_starttime').val();
    var e_end = $('#e_enddate').val() + 'T' + $('#e_endtime').val();
    var e_desc = $('#e_desc').val();
    var e_id = $('#current_id').val();
    if (!e_title || !$('#e_startdate').val()){
        return showError('Title or start time is empty.');
    }
    postApi('events.php',{
        action: 'update',
        id: e_id,
        title: e_title,
        start: e_start,
        end: e_end,
        desc: e_desc
    }, function(err, r){
        if(err){
            return showError(err);
        } else {
            $('#calendar').fullCalendar( 'refetchEvents' );
            clearEditDialog();
        }
    });
}