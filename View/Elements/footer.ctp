    <footer class="text-muted">
        <div class="container">
            <small><a class="hoverLine" href="<?php echo $this->Html->url("/"); ?>">MOVIEING ASTRONAUT</a> is © <a class="hoverLine" href="http://taishikato.com/" target="_blank">taishikato</a></small>
        </div>
    </footer>

    <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyCxvJ93wJh36Fmf9XWowswd-TtEqkH6318",
      authDomain: "movieingastronaut.firebaseapp.com",
      databaseURL: "https://movieingastronaut.firebaseio.com",
      projectId: "movieingastronaut",
      storageBucket: "movieingastronaut.appspot.com",
      messagingSenderId: "138167356960"
    };
    firebase.initializeApp(config);
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <?php echo $this->Html->script('tether.min.js'); ?>
    <?php echo $this->Html->script('config.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>

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
