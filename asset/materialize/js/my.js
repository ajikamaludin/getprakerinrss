$('.button-collapse').sideNav({
   menuWidth: 300, // Default is 300
   edge: 'right', // Choose the horizontal origin
   closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
   draggable: true // Choose whether you can drag to open on touch screens
});
$(document).on('click', '#edit_profile', function() {
    $('.validate').removeAttr('disabled');
    $('.materialize-textarea').removeAttr('disabled');
});
$(document).ready(function() {
   $('select').material_select();
}); 
$('#rsync').click(function(){
	$('#loader').fadeIn();
	$('#data-table').fadeOut();
});