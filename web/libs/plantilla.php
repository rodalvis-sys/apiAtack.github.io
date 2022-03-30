<?php

class template
{
    static $instancia;
    public static function aplicar(){
        if (!self::$instancia) {
            self::$instancia = new template();
        }
    }
    function __construct()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">            
            <title>Ataques</title>
        </head>

        <body>
            <div class="container">
                <div style="min-height:400px;">


            <?php
        }
        function __destruct()
        {
            ?>
            </div>
            <div>
                <hr>
                Derechos Reservados &copy; <? date('v');?>
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
        </body>
        </html>

<?php

        }
    }
