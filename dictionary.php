<?php
    class RequestHandler implements SkPublishAPIRequestHandler {
        public function prepareGetRequest($curl, $uri, &$headers) {
            print($uri."\n");
            $headers[] = "Accept: application/json";
        }
    }
    $requestHandler = new RequestHandler();
    $api = new SkPublishAPI($baseUrl.'/api/v1', $accessKey);
    $api->setRequestHandler($requestHandler);

    print "*** Dictionaries\n";
    $dictionaries = json_decode($api->getDictionaries(), true);
    var_dump($dictionaries);

    $dict = $dictionaries[0];
    var_dump($dict);
    $dictCode = $dict["dictionaryCode"];

    print "*** Search\n";
    print "*** Result list\n";
    $results = json_decode($api->search($dictCode, "ca", 1, 1), true);
    var_dump($results);
    print "*** Spell checking\n";
    $spellResults = json_decode($api->didYouMean($dictCode, "dorg", 3), true);
    var_dump($spellResults);
    print "*** Best matching\n";
    $bestMatch = json_decode($api->searchFirst($dictCode, "ca", "html"), true);
    var_dump($bestMatch);

    print "*** Nearby Entries\n";
    $nearbyEntries = json_decode($api->getNearbyEntries($dictCode, $bestMatch->{"entryId"}, 3), true);
    var_dump($nearbyEntries);

 ?>
