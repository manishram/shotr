# Shotr - URL Shortening Service
![image](https://github.com/manishram/shotr/assets/22790904/a3bcc91c-f612-4e86-b071-808c86a454b6)

---

Shotr is a URL shortening service that allows you to create shorter versions of long URLs, making them easier to share and manage.

## Introduction

This project provides a web-based URL shortening service along with a RESTful API for shortening URLs programmatically. With Shotr, you can create concise and easy-to-share versions of long URLs, making it convenient for sharing links in emails, social media, and more.

## Getting Started

These instructions will help you get a copy of the Shotr project up and running on your local machine for development and testing purposes.

### Prerequisites

Before you begin, ensure you have met the following requirements:

- [Composer](https://getcomposer.org/download/)
- [PHP](https://www.php.net/downloads.php)
- [Node.js](https://nodejs.org/en/download/)
- [MySQL](https://dev.mysql.com/downloads/installer/)

### Installation

1. Clone the repository:

```
git clone https://github.com/manishram/short.git
```
Navigate to the project directory:

```
cd shotr
```
Install PHP dependencies:

```
composer install
```
Install JavaScript dependencies:

```
npm install
```
Configure your database settings in .env file.

Generate the application key:

```
php artisan key:generate
```

Run database migrations and seed the database:

```
php artisan migrate --seed
```

Start the development server:

```
php artisan serve
```
The application should now be running on http://localhost:8000.


### Using the API
To shorten a URL using the API, send a POST request to the ```/v1/api/shorten-url``` endpoint with a JSON payload containing the destination parameter.

### Example Request:

POST /api/shorten-url

```json
{
    "destination": "https://example.com"
}
```

Example Response:

```json
{
    "destination": "https://example.com",
    "slug": "abcde",
    "updated_at": "2021-09-10T23:52:11.000000Z",
    "created_at": "2021-09-10T23:52:11.000000Z",
    "id": 1,
    "shortened_url": "http://localhost:8000/ab5d7"
}
```

### Error Responses
If the request is invalid or a non-valid URL is provided, the API will return a validation error response.
Example Validation Error Response:

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "destination": [
            "The destination field is required.",
            "The destination must be a valid URL."
        ]
    }
}
```
## License

Shotr is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
