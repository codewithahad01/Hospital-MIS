// Jquer   function

$(document).ready(function(){

	$("a.delete").click(function(){
		var sure = window.confirm("Are you sure you want to delete?");
		if(!sure){
			event.preventDefault();
		}
		
	});

	window.setTimeout(function(){ 

	$(".alert").slideUp(1000);
	 
	}, 5000);


	$("a.print").click(function(){  

		window.print();

	});

	$("#bonus").change(function (){

		var bonus = parseInt($("#bonus").val());
		var net_salary = parseInt($("#net_salary_amount").val());

	$("#net_salary").val(net_salary + bonus);

	});

});