exchange-rate-service
=====================

simple symfony-based application

1. INSTALLATION
=====================

1. Clone project to local machine to localhost folder.
2. Create database - open PhpMyAdmin and create new DB with name equal to "exchange_rates_db" and select utf8_general_ci collation.
3. Download Symfony2 from http://symfony.com/download and unpack "bin" directory to project root folder
4. Download composer.phar file from https://getcomposer.org/download/ (direct link is https://getcomposer.org/composer.phar)
5. Run vendors installation with next command:
    $ php composer.phar install

    or if wanna to update vendors to last versions you should run command:
    $ php composer.phar update

6. Install assets for installed bundles with command:
    $ php app/console assets:install web

7. Generate DB scheme with entities annotations
    $ php app/console doctrine:schema:update --force