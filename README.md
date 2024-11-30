Here I used two fixtures for loading User Data and Contact Data
Please make sure to run the following command
1: php bin/console doctrine:database:create  //for creating a new database in MySQL
2: php bin/console make:migration     // to make the migration
3: php bin/console doctrine:migration:migrate // for migration here the migration file chreate the schema 
4: php bin/console doctrine:fixtures:load   // to load the fixtures

Please make sure that in your env you give a valid user name password and server version for the SQL
run php bin/console symfony serve-d or server:run for the local production

ADMIN CREDENTIALS
username = admin
password = password
