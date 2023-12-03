# E-Commerce System with Laravel

## Overview

This project is an E-Commerce system built with Laravel, utilizing RESTful API architecture, and implementing the service and repository design patterns. The system is designed to provide a scalable and maintainable solution for managing products, orders, users, and more.

## Features

- **User Authentication**: Secure user registration and authentication system using Passport.
- **Store Management**: CRUD operations for managing stores.
- **Product Management**: CRUD operations for managing products, including images.
- **Cart Processing**: CRUD operations for managing carts, including cart details.
- **RESTful API**: A robust API for seamless communication between the front end and back end.
- **Service and Repository Patterns**: Codebase is organized using service and repository design patterns for modularity and testability.

## Database Schema

The database schema is structured to support the following features:

- **users**: Table for storing user information.
- **user_types**: Table for storing user types(which we have to type normal customer and merchant).
- **products**: Table for managing product details.
- **translations**: Table for general translation for any another table.
- **carts**: Table for add items to cart.
- **cart_details**: Table to store individual items within an cart.
- **orders**: Table for tracking customer orders.
- **order_details**: Table to store individual items within an order.
- **order_statuses**: Table to store order status.
- **languages**: Table to store languages.
- **merchant_details**: Table to store more user details if the type is merchant.
- **drivers**: Table to store driver.
- **stores**: Table to stores for each merchant.
- **payment_method**: Table to store payment method(cash-online..etc).
- **payment_transaction**: Table to store payment transaction in case payment method is online.
- **addresses**: Table to store user addresses.


Please refer to the `database/migrations` directory for detailed schema information.

## Prerequisites

Before you begin, make sure you have the following installed:

- PHP
- Composer
- MySQL or any other database server

## Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/jihadtareq/ecommerce-system-laravel-backend.git

## Install PHP dependencies:
```sh
 composer install
```    


## Configure your environment variables:

    Duplicate the .env.example file and rename it to .env.
    Update the database connection details and other necessary configurations in the .env file.

1-Run database migrations and seed:
```sh
    php artisan migrate --seed
```    
2-Start the development server:

```sh
    php artisan serve
```

The application will be accessible at http://localhost:8000 by default.

...

## Customer Module (Note for Vue.js Testing)

The customer module included in this project is primarily designed for testing Vue.js tasks. It may not fully represent a production-ready customer management system. The primary focus of this module is to provide a simplified interface for testing and demonstrating Vue.js functionalities within the context of an e-commerce system.

### Usage

While testing the Vue.js tasks related to the customer module, keep in mind that:

- This module may not have complete CRUD functionality.
- The features provided are for Vue.js testing purposes only.
- Production-ready customer management features may require additional development.

Feel free to explore and modify the customer module as needed for your Vue.js testing. If you have any questions or need assistance.

## Vuejs repository:

   ```bash
    git clone https://github.com/jihadtareq/customer-CRUD-vuejs.git
   ```

...


