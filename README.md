# simple-download-with-curl-using-stateless-authentication
simple example to download with curl
#### USAGE
````terminal 
$cd simple-download-with-curl-using-stateless-authentication
$php -S localhost:81
````    
#### Test on Terminal
````terminal 
$php client.php
````   
the script will create 2015232abc.pdf
#### Test on Browser
````browser 
http://localhost:81/server.php?file=abc.pdf&token=0de997706523d47fa79558c63f22e002686cef34 
````
will show the pdf