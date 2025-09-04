# Blogy

**Blogy** is a modern and elegant blog platform built with Laravel. It provides useful features for content creators and administrators to manage posts, categories, and users with ease.

##  Table of Contents
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database](#database)
- [Running the Application](#running-the-application)
- [Running Tests](#running-tests)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)

---

## Features
- User-friendly blog management: create, read, update, delete (CRUD) posts
- Categorization support for organizing content
- Authentication system for secure access control
- RESTful routing, migration, and seeding using Laravel's built-in tools
- Responsive UI for desktop and mobile
- Easy customization with Blade templating

## Prerequisites
- PHP >= 8.0
- Composer
- MySQL (or another supported relational database)
- Node.js & npm (for assets compilation)
- Laravel 10.x (assumed version)

## Installation

1. **Clone the repository**  
   ```bash
   git clone https://github.com/HilmiSalsabilla/blogy.git
   cd blogy
    ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**

   ```bash
   npm install
   ```

4. **Copy the example environment configuration**

   ```bash
   cp .env.example .env
   ```

5. **Generate the application key**

   ```bash
   php artisan key:generate
   ```

## Configuration

Edit the `.env` file to configure your database settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blogy_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

## Database Initialization

Run the following to create the necessary tables and seed with sample data:

```bash
php artisan migrate
php artisan db:seed
```

*Note: There's also a SQL dump file included (`blogy_db.sql`) if you'd like to import existing sample data manually.*

## Running the Application

Build assets and start the development server:

```bash
npm run dev
php artisan serve
```

Then open your browser and navigate to `http://localhost:8000`.

## Running Tests

Execute automated tests with:

```bash
php artisan test
```

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'Add my feature'`
4. Push to your branch: `git push origin feature/my-feature`
5. Open a Pull Request describing your changes

Please follow the existing code style and keep your implementation consistent.

## Credits

* **Laravel** – The PHP framework powering this project
* **[HilmiSalsabilla](https://github.com/HilmiSalsabilla)** – Project author and maintainer

## License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.
