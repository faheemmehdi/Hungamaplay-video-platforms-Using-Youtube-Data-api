<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
	<?php 
	require_once("simple_html_dom.php");

	$base = "https://www.ytapi.com/w/GjSOmgcwIX8?source=related";
            // set up curl
            $curl = curl_init();
            // the url to request
            curl_setopt($curl, CURLOPT_URL, $base);
            // return to variable
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // decompress using GZIP
            curl_setopt($curl, CURLOPT_ENCODING, '');
            // don't verify peer ssl cert
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            //  // fetch remote contents, check for errors
            if (false === ($response = curl_exec($curl)))
                $error = curl_error($curl);
            // close the resource
            curl_close($curl);

            if (!$response) {
                die("Curl Error: {$error}");
            }
            $html = new simple_html_dom();
            $html->load($response);

                    //Find all links 
             
            foreach($html->find('img ') as $element)
       echo $element->src . '<br>'; 
      
 
	?>

</body>
</html>