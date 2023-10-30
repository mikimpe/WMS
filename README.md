# Mikimpe WMS

## Purpose of this module
This module has been developed to be paired with https://github.com/mikimpe/SyncWithWMS  
After installing this module, also install https://github.com/mikimpe/SyncWithWMS and follow the instructions in its README.md to give it a try.

## Installation
- Inside the `app/code` Magento's directory create the folder `Mikimpe` and inside it create the folder `WMS`
- Download the latest release's source code from https://github.com/mikimpe/WMS/releases
- Extract the content of the downloaded archive inside the newly created `app/code/Mikimpe/WMS` folder
- Run `bin/magento module:enable Mikimpe_WMS`
- Run `bin/magento setup:upgrade`

## Casual errors
There is a 33% chance of an exception being raised

## Logs
Any errors are logged in `var/log/mikimpe_wms.log`

## Development environment
- Magento 2.4.6-p3
- PHP 8.2
