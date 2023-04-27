$(document).ready(function(){


	

	var mainNav= $('header');
	// $(window).scroll(()=>{
	// 	($(window).scrollTop()>=1)?mainNav.addClass('sticky'):mainNav.removeClass('sticky');
	// })


	if($(window).width()< 840){
		// $('header nav .nav-link.dropdown-toggle').removeClass('dropdown-toggle');
		$('header .nav-item.dropdown .nav-link').html('<span class="material-icons">menu</span>');
		$('header nav .nav-link.dropdown-toggle').off('click').on('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			$(this).next('.dropdown-menu').toggleClass('show');
		})
	}

	else{
		$('.dropdown, .dropleft').hover(function(){
			$(this).find('.dropdown-menu').addClass('show');
		},
		function(){
			$(this).find('.dropdown-menu').removeClass('show');
		});

	}

});


