    <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyD2BYSw7KUh4ZmdKl1bYUZuTJozU_9E_U0",
        authDomain: "redeyesmovie-7aba5.firebaseapp.com",
        databaseURL: "https://redeyesmovie-7aba5.firebaseio.com",
        projectId: "redeyesmovie-7aba5",
        storageBucket: "redeyesmovie-7aba5.appspot.com",
        messagingSenderId: "899774704753"
      };
      firebase.initializeApp(config);
    </script>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
    <?php echo $this->Html->script('config.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-27648393-14', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>
