document.querySelectorAll('.nl').forEach(function(element){
	new Kentekenplaat(element);
	//element.addEventListener('kentekenplaat.valid', function(e) {
		//console.log('kentekenplaat.valid:', e.detail.licenseplate);
	//});
	//element.addEventListener('kentekenplaat.invalid', function(e) {
       //console.log('kentekenplaat.invalid:', e.detail.licenseplate);
	//});
});    