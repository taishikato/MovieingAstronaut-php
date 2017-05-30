/******
 * Facebook
 **/
$(function(){
  function startWithFacebook() {
    var provider = new firebase.auth.FacebookAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      var uid  = user.providerData[0].uid;
      var email = user.email;
      var url  = movieingastronautConfig.startWithFacebookUrl;
      postForFacebook(token, email, uid, url);

    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
    });
  }

  function postForFacebook(token, email, uid, url) {
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = url;
    var tokenElm = document.createElement('input');
    tokenElm.name = 'data[User][facebook_token]';
    tokenElm.value = token;
    var emailElm = document.createElement('input');
    emailElm.name = 'data[User][email]';
    emailElm.value = email;
    var uidElm = document.createElement('input');
    uidElm.name = 'data[User][facebook_id]';
    uidElm.value = uid;
    var fbAuthElm = document.createElement('input');
    fbAuthElm.name = 'data[User][isFacebookAuth]';
    fbAuthElm.value = 1;
    form.appendChild(tokenElm);
    form.appendChild(emailElm);
    form.appendChild(uidElm);
    form.appendChild(fbAuthElm);
    document.body.appendChild(form);
    form.submit();
  }

  // Start
  if ($('#startWithFacebookBtn')[0]) {
    var startWithFacebookBtn = document.getElementById('startWithFacebookBtn');
    startWithFacebookBtn.addEventListener('click', startWithFacebook, false);
  }

/******
 * Twitter
 **/
  function startWithTwitter() {
    var provider = new firebase.auth.TwitterAuthProvider();
/*
    firebase.auth().signInWithRedirect(provider);
    firebase.auth().getRedirectResult().then(function(result) {
console.log('A');
      if (result.credential) {
console.log('B');
        // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
        // You can use these server side with your app's credentials to access the Twitter API.
        var token = result.credential.accessToken;
        var secret = result.credential.secret;
      var user = result.user;
      console.log(user);
        // ...
      }
      // The signed-in user info.
      var user = result.user;
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
*/
      alert('a');
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
      // You can use these server side with your app's credentials to access the Twitter API.
      var token = result.credential.accessToken;
      var secret = result.credential.secret;
      // The signed-in user info.
      var user = result.user;
      console.log(user);
      // ...
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
  }

  // Start
  if ($('#startWithTwitterBtn')[0]) {
    var startWithFacebookBtn = document.getElementById('startWithTwitterBtn');
    startWithTwitterBtn.addEventListener('click', startWithTwitter, false);
  }
});
