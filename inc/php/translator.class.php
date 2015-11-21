<?php
class Traslator_API {

    private $input;
    private $output;
    private $apiKey = 'AIzaSyAww6xe_uCN25DTo84zsMyXlFsLGwkopZc';

    function __construct( $input ) {
		$this->input = $input;
        $this->translateInput();
	}

    static function setOutput( $output ) {
        $this->output = $output;
    }

    function getOutput() {
        //echo $this->output;
        //echo 'hello';
    }

    function translateInput() {
        $url = 'https://www.googleapis.com/language/translate/v2/detect?q=' . $this->input .'&key=' . $this->apiKey;

        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);     //We want the result to be saved into variable, not printed out
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        curl_close($handle);
        echo '<pre>';
        print_r(json_decode($response, true));
        echo '</pre>';

        echo 'Source: ' . $this->input . '<br>';
        echo 'Translation: ' . $responseDecoded['data']['detections'][0][0]['language'];
        }

 }

?>
