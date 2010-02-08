$(document).ready( function() {
	
new AjaxUpload('upload_button', {
  // Location of the server-side upload script
  // NOTE: You are not allowed to upload files to another domain
  action: 'ajax/submit.php',
  // File upload name
  name: 'userfile',
  // Additional data to send
 
  // Submit file after selection
  autoSubmit: true,
  // The type of data that you're expecting back from the server.
  // HTML (text) and XML are detected automatically.
  // Useful when you are using JSON data as a response, set to "json" in that case.
  // Also set server response type to text/html, otherwise it will not work in IE6
  responseType: false,
  // Fired after the file is selected
  // Useful when autoSubmit is disabled
  // You can return false to cancel upload
  // @param file basename of uploaded file
  // @param extension of that file
  onChange: function(file, extension){},
  // Fired before the file is uploaded
  // You can return false to cancel upload
  // @param file basename of uploaded file
  // @param extension of that file
  onSubmit: function(file, extension) {
  	
		// check for valid file type
		if (! (extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
			// extension is not allowed
	    alert('Error: invalid file extension');
	    // cancel upload
	    return false;
    }
		
		// display loader
		$('#loader').load('inc/loader.html');
		
  },
  // Fired when file upload is completed
  // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
  // @param file basename of uploaded file
  // @param response server response
  onComplete: function(file, response) {
  	$('#loader').load('inc/success.html');
  }
});
});