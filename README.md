# Getting started with Instagram  
Jouw applicatie is een client van Instagram. Eenvoudig gezegd: jouw applicatie vraagt Instagram om data. Instagram wil een client geregistreerd is. Na registratie van de client bij Instagram krijg je gegevens die je nodig hebt om toegang tot Instagram te krijgen.  
  
# Downloaden code  
Ga naar bitbucket.org/ernst_bolt/###. Download de bestanden in één keer door #####.  
Maak een map x  
  
  
# Client registratie bij Instagram
* Log in bij Instagram: https://www.instagram.com/  
* Ga naar: https://www.instagram.com/developer/  
* Klik bovenin het menu op 'Manage Clients'  
* Klik op de knop: 'Register a new client'  
* Vul de velden voor het formulier in. Tips:  
  	redirect URI:  	http://localhost:8080/insta_etty/redirect.php
  	website URL: 	http://localhost:8080  
* Na het opslaan krijg je een 'client id' en een 'client secret'. Deze heb je zo meteen nodig in je eigen applicatie om toegang te krijgen tot instagram.  

# Client id en client secret opslaan  
In de file `configuration.php` staat:  
``` 
	$CLIENT_ID = '...';
	$SECRET = '...'; 
```  
Vervang de punten voor het client id en de secret die je van Instagram hebt gekregen voor jouw applicatie.