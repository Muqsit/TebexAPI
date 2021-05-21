# TebexAPI

This is a PHP library implementing methods to request to and retrieve responses from [Tebex Plugin API endpoints](https://docs.tebex.io/plugin/) using [cURL](https://www.php.net/manual/en/book.curl.php).

Currently, this library does not provide a non-blocking implementation of the API. However, this library implements a set of adaptable abstract classes to achieve the goal.

## Installation
### Install this library via [composer](https://getcomposer.org/)
```
composer install muqsit/tebexapi
```

### Install this library via [poggit](https://poggit.pmmp.io/ci/Muqsit/TebexAPI)
Include this library in your plugin's `poggit.yml`:
```yaml
projects:
  YourProjectName:
    path: ""
    libs:
      - src: muqsit/tebexapi/TebexApi
        version: ^0.0.1
```
