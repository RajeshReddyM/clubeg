$(document).ready(function() {

	$('#languageSwitcher').click(function(){
		var locale = $(this).data('index');
		var _token = $("input[name=_token]").val();

		$.ajax({
			url: '/language',
			type: 'POST',
			data: {locale: locale, _token: _token},
			success: function(data) {

			},
			error: function(data) {

			},
			beforeSend: function() {

			},
			complete: function(data) {
				window.location.reload(true);
			},
		})

	});

    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
});