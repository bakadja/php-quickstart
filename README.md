# PHP Quickstart

This repository contains a simple web application that demonstrates how to quickly connect to and communicate with a [MariaDB](https://mariadb.com) database using [PHP](https://www.php.net/) (via [mysqli](https://www.php.net/manual/en/book.mysqli.php)). 

<p align="center" spacing="10">
    <kbd>
        <img src="media/demo.gif" />
    </kbd>
</p>

> ⚠️ Interested in using MariaDB and PHP with [PDO (PHP Data Objects)](https://www.php.net/manual/en/book.pdo.php)? Check out the quickstart [here](https://github.com/mariadb-developers/php-pdo-quickstart)!

## Getting Started

The application in this repository demonstrates how to:

* Connect to a MariaDB database using `mysqli`
* Execute queries (`SELECT`, `UPDATE`, `INSERT` and `DELETE`) to manage _contact_ data (like a digital [rolodex](https://en.wikipedia.org/wiki/Rolodex))
* Use prepared statements across the CRUD pages
* Load database credentials from environment variables with `vlucas/phpdotenv`

### Prepare the database

The application relies on a single database (`rolodex`) that contains a single table (`contacts`). You can find the necessary SQL for setting up the environment in [schema.sql](schema.sql).

### Run the application

After you've [pulled down this repository](https://git-scm.com/docs/git-clone), follow these steps to get the app up and running:

1. Install the PHP dependencies with Composer.

    ```bash
    composer install
    ```

2. Create a `.env` file at the project root and add the database credentials used by [config.php](src/config.php).

    _Example configuration:_

    ```dotenv
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_USER=user_name
    DB_PASS=your_password
    DB_NAME=rolodex
    ```

    `src/config.php` now loads these values through Composer's autoloader and `vlucas/phpdotenv`, so credentials no longer need to be committed in source files.

3. Run the application using the [built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php).

    ```bash
    php -S localhost:5000 -t src
    ```

4. Open `http://localhost:5000` in your browser.

### Recent changes

The app now includes the following improvements:

* Database credentials are loaded from `.env`
* `.env` and `vendor/` are ignored by Git through [.gitignore](.gitignore)
* The MariaDB SkySQL example config file was removed
* The CRUD pages now use the shared `$conn` connection from [config.php](src/config.php)
* The `add.php`, `edit.php`, and `delete.php` flows now redirect with `exit` after header redirects
* `add.php` now uses an explicit `add` submit action and shows the correct "Add Contact" page title

## Helpful Resources

* [MariaDB Quickstart](https://github.com/mariadb-developers/mariadb-getting-started)
* [Official MariaDB Documentation](https://mariadb.com/docs)

## Support and Contribution

Please feel free to submit PR's, issues or requests to this project directly.

If you have any other questions, comments, or looking for more information on MariaDB please check out:

* [MariaDB Developer Hub](https://mariadb.com/developers)
* [MariaDB Community Slack](https://r.mariadb.com/join-community-slack)

Or reach out to us directly via:

* [developers@mariadb.com](mailto:developers@mariadb.com)
* [MariaDB Twitter](https://twitter.com/mariadb)

## License <a name="license"></a>
[![License](https://img.shields.io/badge/License-MIT-blue.svg?style=plastic)](https://opensource.org/licenses/MIT)
