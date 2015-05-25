$(document).ready(function(){
	$('input[type="text"]').addClass('form-control');
	$('input[type="email"]').addClass('form-control');
	$('input[type="password"]').addClass('form-control');
	$('textarea').addClass('form-control');
	$('select').addClass('form-control');
	$('input[type="submit"]').addClass('btn btn-primary');
	$('button[type="submit"]').addClass('btn btn-primary');
	$('.actions button[type="submit"]').addClass('btn-xs btn-success');
	
	$('.error').addClass('alert alert-danger');
	$('.success').addClass('alert alert-success');
});