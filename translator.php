<!doctype html>
<html class="no-js" lang="en-ca">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./inc/js/jquery-2.1.4.min.js"><\/script>')</script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <h1>Welcome to the SMS Translator</h1>

        <div id="sourceText">Hello world, we are testing SMS Translation!</div>
        <div id="translation"></div>

        <script>
        $.ajax({
            url: 'https://www.googleapis.com/language/translate/v2/detect?q=hallo&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8',
            dataType: 'json',
            type: 'GET',
            success: function(data) {
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });
        </script>

    </body>
</html>
