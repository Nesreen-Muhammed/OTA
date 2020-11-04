<?php

/* check if file is uploaded */
if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
	/* open uploaded file */
    $hexFile = fopen($_FILES['fileToUpload']['tmp_name'],"r");
    /* check if file is open */
    if($hexFile != false){
    	/* loop till the end of hex file */
        while (!feof($hexFile)){  
        	/* open txt file */
            $myFile = fopen("file.txt","w");
            /* write current line from hex file to txt file */
            fwrite($myFile , fgets($hexFile));
            /* close txt file */
            fclose($myFile);  
            /* get the response */
            $response = $_GET["response"]; 
            /* check if the response is not OK wait till its OK */
            while($_GET["response"] != "OK"){}
        }
    	/* close hex file */
		fclose($hexFile);
    }
}

//echo ("Data Sent Successfully");
header("Location:success.html");

?>
