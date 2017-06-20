$(document).ready(function(){
	var dinput = '';
	var url = '';
	var soc = '';
	$( "#dia_date" ).datepicker();
	$('#tags').keyup(function(){
		dinput = this.value;
		url = 'http://192.168.0.106/emedirec/index.php/icd10s/RESTData/';
		soc = String(url+dinput);
		$('#tags').autocomplete({source: soc});
	});
});

