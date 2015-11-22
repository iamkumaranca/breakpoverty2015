<?php
class Traslator_API {

    private $input;
    private $output;
    private $apiKey = 'AIzaSyAww6xe_uCN25DTo84zsMyXlFsLGwkopZc';

    function __construct( $input ) {
		$this->input = $input;
	}

    static function setOutput( $output ) {
        $this->output = $output;
    }

    function translateInput() {
        $url = 'https://www.googleapis.com/language/translate/v2/detect?q=' . $this->input .'&key=' . $this->apiKey;
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);
        if($responseCode != 200) :
            echo 'error';
            $error = 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
            $error =+ 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
            return error;
        else :
            $detectedLanuage = $responseDecoded['data']['translations'][0]['translatedText'];
            if ( $detectedLanuage == 'en' ) :
                echo 'success en';
                $url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=sw&key=' . $this->apiKey;
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handle);
                $responseDecoded = json_decode($response, true);
                $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
                if($responseCode != 200) :
                    echo 'error en';
                    return error;
                else :
                    return  rawurldecode($this->input) . ' -> ' . $translatedString;
                endif;
            else:
                echo 'success other';
                $url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=en&key=' . $this->apiKey;
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handle);
                $responseDecoded = json_decode($response, true);
                $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
                if($responseCode != 200) :
                    echo 'error other';
                    return error;
                else :
                    return  rawurldecode($this->input) . ' -> ' . $translatedString;
                endif;
            endif;
        endif;


    }
 }

?>
