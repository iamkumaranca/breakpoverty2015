<!doctype html>
<html class="no-js" lang="en-ca">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <h1>Welcome to the SMS Translator</h1>

        <div id="sourceText">Hello world, We are testing SMS Translation!</div>
        <div id="translation"></div>
        <script>
            function translateText(response) {
                document.getElementById("translation").innerHTML += "<br>" + response.data.translations[0].translatedText;
            }
        </script>
        <script>
            var newScript = document.createElement('script');
            newScript.type = 'text/javascript';
            var sourceText = escape(document.getElementById("sourceText").innerHTML);
            //var source = 'https://www.googleapis.com/language/translate/v2?key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8&source=en&target=de&callback=translateText&q=' + sourceText;
            var source = 'https://www.googleapis.com/language/translate/v2/detect?key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8&q=' + sourceText;
            newScript.src = source;

            // When we add this script to the head, the request is sent off.
            document.getElementsByTagName('head')[0].appendChild(newScript);
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./inc/js/jquery-2.1.4.min.js"><\/script>')</script>
    </body>
</html>
