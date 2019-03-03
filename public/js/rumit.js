
$(document).ready(function(){

	//Select Main Navigation Focus
	$("#mainNavbar .navbar-nav a").click(function(){
		$("#mainNavbar .navbar-nav").find("li.active").removeClass("active");
		$(this).parents('li').addClass('active');
	});

	//tooltip
	$('[data-toggle="tooltip"]').tooltip(); 
	
  });
  