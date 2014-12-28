Exchange rate service
=====================

simple symfony-based application

1. INSTALLATION
=====================

1. Clone project to local machine to new virtual host folder.
2. Create database - open PhpMyAdmin and create new DB with name equal to "exchange_rates_db" and select utf8_general_ci collation.
3. Download Symfony2 from http://symfony.com/download and unpack "bin" directory to project root folder
4. Download composer.phar file from https://getcomposer.org/download/ (direct link is https://getcomposer.org/composer.phar)
5. Run vendors installation with next command:
    $ php composer.phar install

    or if want to update vendors to last versions you should run command:
    $ php composer.phar update

6. Install assets for installed bundles with command:
    $ php app/console assets:install web

7. Generate DB scheme with entities annotations
    $ php app/console doctrine:schema:update --force

2. USING
=====================

1. Open page http://<your-virtual-host-url>/
2. In first table you cab see info about exchange rate data provider.
You can create custom exchange rates data provider: just create new provider class in src\Acme\ExchangeRateBundle\Service\ExchangeRate.
This class must extends AbstractExchangeRateService.
3. If you want to change provider you should to change 'acme_exchange_rate' conf in /app/config/config.yml file - parameter 'provider' help you select others exchange rates providers.

3. Admin dashboard
=====================

1. Open in browser http://<your-virtual-host-url>/admin
2. Use link for show list of currencies or for create new currency. If you open list you can edit or remove currencies.
On site will showed only active currencies, so if you want use some currencies you should open its for editing and check option "Active".

4. API description
=====================

Default data format - JSON

Return all active currencies:
+ http://<your-virtual-host-url>/api/v1/currency/all

Return data about currency with id equals to {id}:
+ http://<your-virtual-host-url>/api/v1/currency/{id}
+ http://<your-virtual-host-url>/api/v1/currency/123

Get exchange rate. {code} is equals to concatination of 2 3-letters codes. For emaple, 'USDEUR' - 3-letters codes for United States Dollar and for Euro Member Countries
+ http://<your-virtual-host-url>/api/v1/exchange_rate/{code}
+ http://<your-virtual-host-url>/api/v1/exchange_rate/USDEUR
