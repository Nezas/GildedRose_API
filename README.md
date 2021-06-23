# GildedRose_API

## Information
For this project I used XAMPP and MariaDB for the database. I didn't delete original Laravel files or migrations.

I've created 2 models:
- Category (Properties: id; name;)
- Item (Properties: id; category; name; value; quality;)

Both models have its own controller with all the required functionalities.

## Installation

- First you need to clone this repository

```sh
git clone git@github.com:Nezas/GildedRose_API.git
```

or

```sh
git clone https://github.com/Nezas/GildedRose_API.git
```

- Navigate to project folder and install all the dependencies using composer

```shell script
composer install
```

- Rename .env.example to .env and replace existing information with your database information.

- Run this command to migrate database tables :

```shell script
php artisan migrate
```

- Start the server :

```shell script
php artisan serve
```

Now you can start using this API.

## Usage

To use this API you will need 'Postman' or 'REST Client' extension in Visual Studio Code. (Or anything similiar).

- GET methods

1. ``` http://localhost:8000/api/categories/ ``` - Returns all the categories.
2. ``` http://localhost:8000/api/categories/return/{categoryName} ``` - Returns all the items based on a categories name. Change {categoryName} with your desired name.
3. ``` http://localhost:8000/api/items/ ``` - Returns all the items.

- POST methods

1. ``` http://localhost:8000/api/categories/store ``` - Stores a new category.
2. ``` http://localhost:8000/api/items/store ``` - Stores a new item.

- PUT methods
 
1. ``` http://localhost:8000/api/items/update/{itemId} ``` - Updates an item. Change {itemId} with your desired id.

- DELETE methods

1. ``` http://localhost:8000/api/categories/destroy/{categoryName} ``` - Deletes all the items based on a categories name.