$('#cp_submit').submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '/retrieve_weather',
        data: {
            cp_user:$('#cp_input').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        success: function(res) {
            $('.content-loaded').removeClass('d-none');
            $('#position_name span').html(res.name);
            $('#temp_max span').html(res.main.temp_max+' ºC');
            $('#temp_min span').html(res.main.temp_min+' ºC');
            $('#tiempo span').html(res.weather[0].main);
            $('#tiempo img').attr('src','http://openweathermap.org/img/wn/'+res.weather[0].icon+'.png');
            $('#wind_speed span').html(res.wind.speed+' m/s');
            $('#wind_direction span').html(res.wind.deg+' º');

        }
    })
});

$( "#cp_input" ).keyup(function() {
    let length_num = $(this).val().length;
    if (length_num > 5)
    {
        $(this).val($(this).val().slice(0,-1));
    }
});
