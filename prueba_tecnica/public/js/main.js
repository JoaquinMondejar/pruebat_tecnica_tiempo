
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
        success: function() {
            console.log("Geodata sent");
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
