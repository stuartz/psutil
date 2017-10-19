# Promo Standards Services client
Use to set up access to suppliers for Inventory, Order Status, and Shipping Status requests.

# Install the application
* clone the repository `git clone https://
* cd to the root folder
* mkdir /data for database persistence and set root password: 
`mkdir /data && export MYSQL_ROOT_PASSWORD=my-secret-pw ` (or set it in the docker-compose.yml if running as sudo)
* Make any changes in the docker-compose.yml from default as listed below **before running**
* If docker && docker-compose are installed run `docker-compose up -d` from root directory. 
* Otherwise run `sudo su` then  `cd docker && sh install.sh` after auditing the scripts to install docker && docker-compose on a linux based instance.  Then  run `docker-compose up -d`.

To run as a development environment and display errors, set `-  ENVIRONMENT=development` in docker-compose.yml.

# set up admin users and supplier account(s)
go to https://127.0.0.1/init.php or https://YourDomainYouSetup/init.php

init.php will only work once and be removed along with root access.  init.php will set up a user as admin:your-secret-pw, log you in and redirect you to index.php

When using HTTPS, you will then be able to login and go to the admin tab to set supplier credentials. Enter user:pwd:urls for supplier accounts.

# Supplier accounts
Only supplier accounts for which you have provided credentials and a url will be available in the selection drop downs for inventory, order, or shipping request forms.  Credentials can be requested through http://promostandards.org/company/overview/

If you are a supplier using this to test your services or a distributor who has found an error, contact CriticalComputingRX@gmail.com with any updates needed for your service urls or to add your company.  

The `Update All Endpoints` button on admin updates all end points to the latest correct endpoints.  Companies with blank urls have not been tested.  **Not all endpoints have been tested at this time.**


# Emails
SET the following in docker-compose for sending emails on forgot username/password links and error notifications:
* SMTP_HOST
* SMTP_PASSWORD
* SMTP_FROM
* SMTP_PORT

# External requests
You can use the json service from other applications by sending an ajax request to Inv Request (ir636797.php), Order Status (order643s64.php) or Shipping Status(shipping643s64.php)   You must include dtype=json in the request along with the other filtering variables.  This will return a json reply.  For additional required variables, capture the form requests to view.

# Database
The application is set up to use the table set up in db_schema with a linked mariadb container.  Optionally, you can set DATABASE_HOST to connect to a mysql compatible database and set up the table there...remove the db service from the docker-compose.yml

# SSL Certificate
If you wish to provide your own certificte for ssl, put key.pem, cert.pem, and dh.pem in 'external' folder. If you forget the dh.pem, it will be created on first start.  Container must have write permissions to the folder.  Optionally, you can create your own SSL proxy to connect to psutil container.  **SSL is required for admin login and session storage.**

# Development Environment
Setting `ENVIRONMENT=development` in docker-compose.yml will expose PHP errors and help with trouble shooting soap calls to the services.  Soap calls first attempt to use the WSDL returned. If it fails, it will use a local WSDL and set the location to the endpoint. A final attempt is made if that fails by using the WSDL returned and setting the location to the endpoint.  These attempts will be displayed in the development environment.

# Order Status
Order Status resonse also includes minimal shipping information for the order if statusID is 75 or 80 such as status or the tracking url if available.
