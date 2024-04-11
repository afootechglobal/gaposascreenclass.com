<?php include 'connection/connection.php' ?>
<?php include 'connection/session.php' ?>
<html>
    <head>
    <title>Administrative Portal |  GAPOSA- ScreenClass</title>
    <?php include 'reference.php' ?>
    </head>
    <body>
        <div class="dashboard-main-div">
            <div class="reg-success-main animated animated zoomIn animated">
                <div class="gif">
                    <img src="images/finish.gif" alt="">
                </div>
                <h3>REGISTRATION SUCCESSFUL</h3>
                   <button onclick="_detect_history()">OK</button>
                </div> 

            </div>
        </div>

        <script>
            var actionsuccess = document.getElementById('actionsuccess');
            window.addEventListener("popstate", _detect_history);

            function _detect_history(){
                window.history.back({id:1}), null, null;
            }
        </script>
    </body>
</html>