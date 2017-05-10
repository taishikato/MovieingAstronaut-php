$(function(){
  function authFacebook() {
    var provider = new firebase.auth.FacebookAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      var uid  = user.providerData[0].uid;
      var email = user.email;
      var url  = redeyesmovieConfig.signupWithFacebookUrl;
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

  function loginWithFacebook() {
    var provider = new firebase.auth.FacebookAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      var uid  = user.providerData[0].uid;
      var email = user.email;
      var url = redeyesmovieConfig.loginWithFacebookUrl;
      postForFacebookLogin(token, email, uid, url);

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

  function postForFacebookLogin(token, email, uid, url) {
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
    form.appendChild(tokenElm);
    form.appendChild(emailElm);
    form.appendChild(uidElm);
    document.body.appendChild(form);
    form.submit();
  }

  // Sign Up With Facebook
  if ($('#signupWithFacebookBtn')[0]) {
    var loginWithFacebookBtn = document.getElementById('signupWithFacebookBtn');
    loginWithFacebookBtn.addEventListener('click', authFacebook, false);
  }

  // Login
  if ($('#loginWithFacebookBtn')[0]) {
    var loginWithFacebookBtn = document.getElementById('loginWithFacebookBtn');
    loginWithFacebookBtn.addEventListener('click', loginWithFacebook, false);
  }
});
