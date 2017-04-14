$(document).ready(function() {

	// Change the language
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

	// Fade out alert messages
	$(".alert").fadeTo(2000, 500).slideUp(500, function(){
		$(".alert").slideUp(500);
	});

	// Select2 library for multiple selections
	$(".select2").select2();

	// Ugly code
	$('#tournamentsList').change(function(){
		var tId = $(this).val();
		var redirectUrl = '/listscores/'+tId
		window.location = redirectUrl;
	});
});