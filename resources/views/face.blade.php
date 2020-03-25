<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '883861458700229',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v6.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };


  function saveUserData(id,first_name,last_name,email,name){
    jQuery(document).ready(function(){
              /* $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });*/
               jQuery.ajax({
                  url: "{{ url('/facebook/post') }}",
                  method: 'post',
                  data: {
                     name: name,
                     first_name: first_name,
                     last_name: last_name,
                     email: email,
                     id: id,
                      _token: '{{csrf_token()}}',
                  },
                  success: function(result){
                     console.log(result);
                     alert(result);
                  }});
               });
           
} 

  (function(d, s, id) {                      // Load the SDK asynchronously
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,name'},
     function(response) {
      console.log('Successful login for: ' + response.name +response.first_name+response.link);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';

saveUserData(response.id,response.first_name,response.last_name,response.email,response.name);

    });
  }

</script>


//  The JS SDK Login Button 

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

</body>
</html>