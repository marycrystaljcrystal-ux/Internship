# QuizPro Online Tests

QuizPro is an MCQ (Multiple Choice Question) quiz platform built as part of a Full Stack Development internship project.

## Project Overview

The platform provides backend APIs for creating and managing quizzes and questions. Each quiz can contain multiple questions with four answer options and a correct answer.

## Technologies Used

* Laravel 13
* PHP
* MySQL
* Laravel Sanctum
* REST API
* Git & GitHub

## Week 2 — Core Feature: Backend API

The Week 2 checkpoint focuses on building the core backend APIs for the QuizPro platform.

### Features Completed

* Quiz CRUD API
* Question CRUD API
* Quiz–Question relationship
* Request validation
* Database migrations
* Laravel Sanctum API setup
* Automated API tests
* Database persistence

## API Endpoints

### Quiz API

| Method    | Endpoint            | Description     |
| --------- | ------------------- | --------------- |
| GET       | `/api/quizzes`      | Get all quizzes |
| POST      | `/api/quizzes`      | Create a quiz   |
| GET       | `/api/quizzes/{id}` | Get one quiz    |
| PUT/PATCH | `/api/quizzes/{id}` | Update a quiz   |
| DELETE    | `/api/quizzes/{id}` | Delete a quiz   |

### Question API

| Method    | Endpoint              | Description       |
| --------- | --------------------- | ----------------- |
| GET       | `/api/questions`      | Get all questions |
| POST      | `/api/questions`      | Create a question |
| GET       | `/api/questions/{id}` | Get one question  |
| PUT/PATCH | `/api/questions/{id}` | Update a question |
| DELETE    | `/api/questions/{id}` | Delete a question |

## Question Structure

Each question contains:

* Quiz ID
* Question text
* Option A
* Option B
* Option C
* Option D
* Correct answer

## Validation

The Question API validates:

* Quiz ID must exist in the quizzes table
* Question text is required
* All four options are required
* Correct answer must be A, B, C, or D

## Automated Tests

Two automated feature tests were created for the Quiz API:

1. Create a quiz
2. Get all quizzes

Run the tests with:

```bash
php artisan test --filter=QuizApiTest
```

Test result:

```text
2 tests passed
4 assertions passed
```

## Database

The application uses MySQL for storing quiz and question data.

The `questions` table is connected to the `quizzes` table through `quiz_id`.

Deleting a quiz also removes its related questions through the configured cascade relationship.

## Running the Project

### 1. Install dependencies

```bash
composer install
```

### 2. Configure the environment

Create/configure the `.env` file with your database settings.

### 3. Generate the application key

```bash
php artisan key:generate
```

### 4. Run migrations

```bash
php artisan migrate
```

### 5. Start the Laravel development server

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

## API Testing

The Quiz and Question APIs were tested locally using HTTP requests.

The following operations were successfully tested:

* Create
* Read
* Update
* Delete

Data was successfully stored, retrieved, updated, and deleted from the database.

## Internship Checkpoint

**Checkpoint 2 — Week 2: Core Feature — Backend API**

Status: Completed
