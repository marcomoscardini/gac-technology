gac-technology1
===============

A Symfony project created on April 9, 2018, 4:55 pm.

## Setup
```bash
composer install
bin/console doctrine:database:create
bin/console doctrine:schema:create
bin/console doctrine:database:import tickets.utf8D.sql o bin/console doctrine:database:import dump.sql
bin/console server:run 0.0.0.0:8888
``` 

Visit http://localhost:8888/mobilecall/summary
The crud has been left, but it could have been removed to reduce default 
controller and form folders free of default code.

## Useful command

To convert French format dates to ISO, the following can be used
```bash
sed -E 's,([0-9]{2})/([0-9]{2})/([0-9]{4}),\3-\2-\1,g'
```

## How did I get here
created a symfony project
converted the file from iso*15 to UTF8
created a .sql insert line by line using gedit and openoffice
report_import.txt and notes.txt reports that some of the lines are unvalid (eg.30-02-2012)
created the entity
created the basic crud
modified the repository adding 3 functions DQL and doctrine
installed the dependencies required to phpunit and extend doctrine to have time_to_sec   
wrote functional tests... but no fixtures as I fear beyond the exercise
run tests:
```bash
vendor/bin/phpunit --verbose src/AppBundle/Tests/Controller/MobileCallControllerTest.php
```
