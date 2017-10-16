# Promo Standards Services client
Use to set up access to suppliers for Inventory, Order Status, and Shipping Status requests.

# Install the application
* clone the repository `git clone https://
* cd to the root folder
* mkdir /data for database persistence and set root password
`mkdir /data && export export MYSQL_ROOT_PASSWORD=my-secret-pw \
  && export MAIL_TO=webadmin@yourcompany.com && export MAIL_FROM=noreply@yourcompany.com`
* Make any changes from default as listed below
* If docker && docker-compose are installed run `docker-compose up -d` from root directory. 
* Otherwise run `sudo su` then  `cd docker && sh install.sh` after auditing the scripts to install docker && docker-compose on a linux based instance.

To run as a development environment and display errors, add `-  ENVIRONMENT=development` in docker.yml.

# set up admin users and supplier account(s)
log in to http://127.0.0.1:8080/init.php

init.php will only work once and be removed along with root access.  init.php will set up a user as admin:your-secret-pw, log you in and redirect you to index.php

You will then be able to go to the admin tab to set supplier credentials. Enter user:pwd:urls for supplier accounts.

# Supplier accounts
Only supplier accounts for which you have provided credentials and a url will be available in the selection drop downs for inventory, order, or shipping request forms.


# Emails
SET the following in docker-compose for sending emails on forgot username/password links and error notifications:
* SMTP_HOST
* SMTP_PASSWORD
* SMTP_FROM
* SMTP_PORT

# External requests
You can use the json service from other applications by sending an ajax request to Inv Request (ir636797.php), Order Status (order643s64.php) or Shipping Status(shipping643s64.php)   You must include dtype=json in the request along with the other filtering variables.  This will return a json reply.  For additional required variables, capture the form requests to view.

# Database
The application is set up to use the table set up in db_schema and a linked mariadb container.  Optionally, you can set DATABASE_HOST to connect to a mysql compatible database and set up the table there.

# SSL Certificate
If you wish to provide your own certificte for ssl, put key.pem, cert.pem, and dh.pem in 'external' folder. If you forget the dh.pem, it will be created on first start.  Container must have write permissions to the folder.  Optionally, you can create your own SSL proxy to connect to psutil container.   SSL is required for admin login and session storage.
