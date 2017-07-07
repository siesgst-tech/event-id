# Event ID Web Application

A simple web application to handle event registrations and payment for the user base.

## Status
[![Build Status](https://travis-ci.org/siesgst-tech/eventID-web.svg?branch=master)](https://travis-ci.org/siesgst-tech/eventID-web)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

1. PHP verion 7.0+
2. Apache Server
3. MySQL Backend

### Installing

Copy .env.example and save it as .env
Create MySQL database with required name and update .env file with appropriate details
```
DB_DATABASE=<your database name>
DB_USERNAME=<your mysql username>
DB_PASSWORD=<your mysql password>
```
Create tables in database as mentioned in database/migrations
```
php artisan migrate
```

## Deployment

TODO: Additional notes about how to deploy this on a live system

## Built With

* [Laravel](https://laravel.com) - The web framework used
* [Composer](https://getcomposer.org) - Dependency Management
* [JWT](https://jwt.io) - Authentication for APIs

## Contributing

Please read [CONTRIBUTING.md](https://github.com/siesgst-tech/eventID-web/blob/master/CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **Omkar Prabhu** - [nerdyninja](https://github.com/nerdyninja)

See also the list of [contributors](https://github.com/siesgst-tech/eventID-web/contributors) who participated in this project.

## License

TODO: Add a license

## Acknowledgments

* **Adding JWT for APIs** - [VinayA8](https://github.com/VinayA8)