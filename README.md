# Brighte Senior Developer Test

Assuming PHP is installed. The code is written in Symfony framework.

## Installation Guide

### 1) Clone the repository from https://github.com/dansieg422000/brighte.git

### 2) Run the server php bin/console server:run

### 3) Access the page from the URL: http://127.0.0.1:8000/brighte/delivery

## Demonstrate the Domain Driven Design (DDD)

 1) The purpose of the Controller is mainly to call other services, trigger some events and return a response. 
    The best practice is to limit the line of codes in the controller. In this case I use Controller to call the
    Services, which process the code logic.
    [BrighteController]
    
 2) Services are useful objects because everything that the app does is actually done here. I use the Services to 
 proces the json file and organize the business logic. 
    [ DeliveryService, MarketingService, ApiService ]
 
 3) Entity is a basic class that holds data. I added an Entity to create data fields and to map the Repository.
    [DeliveryEntity]
 
 4) Repository is useful on creating complex queries that can be reuse. I use Repository to load the json file.
    It is a good practice to keep the Controller clean and put the complex queries inside the Repository.
    [DeliverRepository]
    
 Note: The code is fully functional. You can find the 3rd party api logic in the ApiService.php. Since no instruction
    provided for personalDelivery, I just output the data. For the email campaign, it will show the message 
    "Email campaign is successful".
    
    
    

