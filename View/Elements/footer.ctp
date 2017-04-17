    <script src="https://www.gstatic.com/firebasejs/3.7.8/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyDy-A5NBOCvoNi2vyxNaMaVKZxdDqGmu14",
            authDomain: "filmstar-5e1ab.firebaseapp.com",
            databaseURL: "https://filmstar-5e1ab.firebaseio.com",
            projectId: "filmstar-5e1ab",
            storageBucket: "filmstar-5e1ab.appspot.com",
            messagingSenderId: "899517705502"
        };
        firebase.initializeApp(config);
    </script>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('config.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
</body>
</html>
