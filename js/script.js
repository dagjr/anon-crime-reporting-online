$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
		$('#searchbar').fadeOut();
		document.getElementsByName('search-big')[0].value = document.getElementsByName('search-small')[0].value;
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });

    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			document.getElementsByName('search-small')[0].value = document.getElementsByName('search-big')[0].value;
            $(this).removeClass('open');
			$('#searchbar').fadeIn();
			
        }
    });



});
