<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="Shortcut Icon"  href="favicons.png" type="image/x-icon">
        <style>
            .wrap{
                font-family: monotype corsiva;
                text-align: left;
            }
            .tank{
                margin:0 25px;
                display: inline-block;
            }
            body{
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="page-loader"></div>
        <header class="main-header">
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand">
                        <b style="color: #0099ff;">Tank level</b><br>
                        <form method="POST">
                            <a href="../w/" class="btn btn-success btn-sm">Refresh</a>
                        </form>
                    </a>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <div class="wrap">
                            <div class="tank waterTankHere1"></div>
                        </div>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="waterTank.js"></script>
        
        <script>
            $(document).ready(function() {
                $('.waterTankHere1').waterTank({
                    width: 230,
                    height: 300,
                    color: '#8bd0ec',
                    level: 0
                }).on('click', function(event) {
                    $.ajax({
                        type: 'POST',
                        url: 'fetch.php',
                        success: function(data){
                            if (isNaN(data)) {
                                // do not update the tank animation
                            }
                            else {
                                $('.waterTankHere1').waterTank({
                                    level: data
                                });
                            }
                        }
                    });
                });
                $('.waterTankHere1').trigger('click');
            });

            setInterval(function(){
               $('.waterTankHere1').trigger('click');
            }, 2000);
        </script>
    </body>
</html>