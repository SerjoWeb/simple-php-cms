# PHP CMS Builder
## Practicing on PHP language

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

PHP CMS Builder - a simple PHP Class useable for start develop your own cms

- PHP
- JavaScript ECMA SCRIPT latest
- Html
- Scss (Compass)

Version 1.0
Under development, free license.

## How to use

- Clone or download zip
- Use a local server like ``` XAMPP ``` or similar
- To start developing: Setting up ``` hosts ``` and ``` httpd-vhosts ``` files for your local server and start PHP environment

```sh
 1. git clone https://github.com/SerjoWeb/simple-php-cms.git
 2. Setting up ``` hosts ``` and ``` httpd-vhosts ```
 3. Start PHP environment
```

## Structure

| Folder/File | Description |
| ------ | ------ |
| ``` index.php ``` | Main entrance of the app |
| Vendor | Consist ``` config.system.php ``` Class |
| Site | This folder for development a web site. Consist ``` index.php ``` as an entry point and folder ``` views ``` |
| Frontend | This folder for development a front end part of the CMS panel, ``` index.php ``` as an entry point |
| Backend | Folder for API |

## Mutable Structure

You can change the structure whatever you prefer but as an exception ``` Don't delete or change vendor files ```