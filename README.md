Custome Vtiger api
==================

Pre-requisites
--------------

 * A [vtiger image](https://clabvtigerdev.gizur.com/vtigercrm) for send api request
 * A mem cache server is needed (https://github.com/gizur/beservices)
 
Update main.config
------------------
 * Change mem cahce server detail
 * Change Vtiger api path
 
Send request using curl
-------------------------
  1. Login Request
    curl -X POST http://localhost/gizur/api/Authenticate/login 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"
  
  2. Assets List Request
    curl -X GET http://localhost/gizur/api/Assets 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"

  3. For trailer app portal: to get all damages we not use custom and vtiger api, For same we use direct mysql connection. 


  4. For Assets tab
    curl -X GET http://localhost/gizur/api/Assets/Search/s?searchString='' 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"
    
 5. Get All Account
    curl -X GET http://localhost/gizur/api/Accounts 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"

 6. Get All Products
    curl -X GET http://localhost/gizur/api/Products 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"

 7. Get Pick list
    curl -X GET http://localhost/gizur/api/Assets/trailertype 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"

 8. Get All Products
    curl -X GET http://localhost/gizur/api/Assets/trailertype 
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json"

 9. Create new Assets
    curl -X POST http://localhost/gizur/api/Assets
    -H "Content-Type:application/json" -H "X-USERNAME:niclas.andersson@coop.se" 
    -H "X-PASSWORD:123456" -H "X-CLIENTID:clab" -H "ACCEPT-LANGUAGE:en" -H "ACCEPT:json" 
    -D data


