$(document).ready( function() {
	
new AjaxUpload('upload_button', {
  action: 'ajax/submit.php',
  name: 'userfile',
  autoSubmit: true,
  responseType: false,
  onChange: function(file, extension){},
  onSubmit: function(file, extension) {
  	
		// check for valid file type
		if (! (extension && /^(jpg|png|txt|jpeg|gif)$/i.test(extension))){
			// extension is not allowed
	    alert('Error: invalid file extension');
	    // cancel upload
	    return false;
    }
		
		// display loader
		$('#loader').load('inc/loader.html');
		
  },
  onComplete: function(file, response) {
  	alert(response);
  	if (response == "success") {
  		$('#loader').load('inc/success.html');
  		startRequest();
  	} else {
  		$('#loader').load('inc/failure.html');
  	}

  }
});
});

function Request() {
	i++;
	
	if (i < 3) {
		alert(i);
	} else
	{
		stopRequest();
	}
}

function startRequest() {
	var aktiv = window.setInterval("Request()", 1000);
	var i = 0;
}

function stopRequest() {
	window.clearInterval(aktiv);
}