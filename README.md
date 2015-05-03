SAT project
============

Quick-Start
-----------

### Composer installation

You can install SAT   using [composer](https://getcomposer.org/download/)...

    composer install

Create and adjust your environment configuration, eg. add a database...

    cd myapp
    cp .env-dist .env
    edit .env

Run the application setup...

    ./yii app/setup

Open `http://path-to-app/web` or `http://path-to-app/web?r=admin` in your browser.

> Note: dump DB in database/sat.sql