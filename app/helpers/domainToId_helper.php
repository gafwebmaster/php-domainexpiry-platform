<?php

//Change the domain name to id in order to work the Bootstrap modal that need for each domain a different id
function domainToIp($domain) {
    $formattedName = explode('.', $domain);
    $theId = '';
    for ($i = 0; $i < count($formattedName); $i++) {
        $theId .= $formattedName[$i];
    }
    echo $theId;
}
