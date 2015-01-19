$(function() {
	var myElement = document.getElementById('image_container');
	console.log(myElement);
	// create a simple instance
	// by default, it only adds horizontal recognizers
	var mc = new Hammer(myElement);

	// listen to events...
	mc.on("panleft panright", function(ev) {
	    // myElement.textContent = ev.type +" gesture detected.";
	    console.log(ev);
	    console.log('moep');
	});

});