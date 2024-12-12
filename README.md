# Laravel API

This is a Laravel-based backend application designed to provide a robust API for a web or mobile application. It offers efficient API endpoints, user management, database configuration, and more.

## Table of Contents

- [Dependencies](#dependencies)
- [Features](#features)
- [Environment Variables](#environment-variables)
- [Installation](#installation)
- [Contributing](#contributing)

## Dependencies

This project is built using the following technologies:

- **Laravel Framework** (PHP): The backend framework for API development.
- **MySQL**: Used to store application data.
- **Mailtrap**: To handle email sending in development.

## Features

1. **User Authentication**:
   - Secure login and registration.
   - Role-based access control.

2. **API Endpoints**:
   - Custom endpoints to manage resources (CRUD operations).

3. **Database Integration**:
   - Use of MySQL for data storage with migration support.

## Environment Variables

The project uses a `.env` file for configuration. Some key variables include:

- `APP_URL`, `APP_KEY`, `DB_*`: Core settings for application and database.
- `MAIL_*`: SMTP settings for email functionality.

Refer to the `.env.example` file for all necessary variables.

## Installation

To get the project running locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/EmilioGall/laravel-api.git
   cd laravel-api
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy the `.env` example:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Start the server:
   ```bash
   php artisan serve
   ```

## Contributing

We welcome contributions! To contribute:

1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature/your-feature
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add new feature"
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature
   ```
5. Open a pull request.

---

Happy coding!
