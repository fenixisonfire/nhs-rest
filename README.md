# nhs-rest

This is a very simple RESTful application that provides connection information to an Azure SQL server.

## Database server connection information

The database server connection information is stored in **index.html** and uses the following information:
* The server name
* The server administrator login
* The server administrator password

It stores each of the 3 pieces of information on 3 separate lines, in the format: 'Title':::'data'::: (without the quotations), where "Title" is the name of the detail in question and "data" is the raw data itself.
It is imperative that the triple colon notation (:::) is maintained on both sides of the "data" section. As such, ensure that none of the data entries start or end in a colon (:). Inner colons are acceptable, so long as there aren't 3 consecutive colons in a row.

## Example
### Current configuration
ServerName:::testserver:::  
ServerAdmin:::admin:::  
ServerPassword:::password:::  

### New data
New server name = testserver2  
New server admin = admin  
New server password = password123  

### New configuration
ServerName:::testserver2:::  
ServerAdmin:::admin:::  
ServerPassword:::password123:::  
