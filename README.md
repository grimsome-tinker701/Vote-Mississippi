# Vote-Mississippi
PHP script that runs users through a step-by-step questionnaire and automatically fills out a Mississippi voter registration form.

download pdftk server, composer:

in a terminal open to your php project folder enter: `composer init`
go through the menu and create a blank composer file.
next using composer add a requirment to your .json file with: `composer require mikehaertl/php-pdftk` this will add the pdftk server repository to your autoload script.
  + credit to https://github.com/mikehaertl/php-pdftk?tab=readme-ov-file#Installation
next reload your auto load files with `composer dump-autoload`
