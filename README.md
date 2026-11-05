# Tech Academy — Student Information Management System (SIMS)

An AI-assisted Laravel web application + REST API for managing students, subjects,
and enrollments, built as the final project for the Laravel Web Development course.
Branded as **Tech Academy**, with a dark cyberpunk-neon UI throughout.

## Features

- **Authentication** — registration ("Enroll Now"), login, logout (Laravel Breeze,
  Blade stack), with a Student/Admin portal switcher on the login screen
- **Three roles** — `Admin`, `Staff`, and `Student`, enforced server-side via the
  `admin` and `staff` middleware (not just hidden in the UI):
  - **Admin** — full CRUD across Students, Subjects, Enrollments
  - **Staff** — can view all records (Students, Subjects, Enrollments, Dashboard)
    but cannot create/edit/delete
  - **Student** — self-service only: a personal portal showing their own student
    record and enrollments; blocked from every staff/admin management route
- **Student self-enrollment** — "Enroll Now" creates a `Student`-role account and
  either links it to a matching student record (e.g. an official roster entry) or
  creates a new one, auto-generating a student number
- **Student Management** — full CRUD (student number, name + middle name, email,
  course, year level), with a live search box (name, student number, or email)
- **Subject Management** — full CRUD (subject code, name, units)
- **Enrollment Management** — full CRUD linking Students ↔ Subjects, with a
  composite-unique rule preventing duplicate enrollment in the same subject/term
- **Dashboard** — role-aware: Admins get a control center (quick actions, student
  search, recent enrollment activity, course/year breakdowns); Staff get a browse
  view; Students get their own enrollment summary
- **REST API** — token-authenticated (Sanctum) JSON CRUD for students, subjects,
  and enrollments
- **Validation** — required fields, email format, uniqueness, length/range limits
- **Automated tests** — 44 PHPUnit feature tests covering web CRUD, role
  restrictions, validation, and the REST API

## Tech Stack

- Laravel 13, PHP 8.3
- Blade + Laravel Breeze (authentication scaffolding)
- SQLite (zero-config, file-based database)
- Laravel Sanctum (API token authentication)
- PHPUnit (feature tests)
- Laravel Pint (code style)

## Requirements

- PHP 8.3+
- Composer 2.x
- Node.js 18+ / npm (for building frontend assets)

## Setup Instructions

```bash
# 1. Install PHP dependencies
composer install

# 2. Copy the environment file and generate an app key
cp .env.example .env
php artisan key:generate

# 3. Create the SQLite database file
touch database/database.sqlite
# (On Windows, instead: type nul > database\database.sqlite)

# 4. Run migrations and seed demo data
php artisan migrate --seed

# 5. Install JS dependencies and build frontend assets
npm install
npm run build

# 6. Serve the application
php artisan serve
```

The app will be available at `http://localhost:8000`.

`.env` already defaults to `DB_CONNECTION=sqlite`, so no database server setup is
required.

## Database Setup / Export

This project uses **SQLite** for simplicity and portability. The seeded database
file is included at `database/database.sqlite`. To regenerate it from scratch:

```bash
php artisan migrate:fresh --seed
```

Schema overview:

| Table | Key columns | Relationships |
|---|---|---|
| `users` | name, first_name, last_name, middle_initial, contact_number, email, role (`admin`/`staff`/`student`) | `hasOne` `students` (when role is `student`) |
| `students` | user_id (nullable, unique), student_number (unique), first_name, middle_name, last_name, email (unique), course, year_level | `belongsTo` `users`; has many `enrollments` |
| `subjects` | subject_code (unique), subject_name, units | has many `enrollments` |
| `enrollments` | student_id, subject_id, school_year, semester, status | belongs to `student`, `subject`; unique on (student_id, subject_id, school_year, semester) |

## Demo Accounts

Seeded by `database/seeders/DatabaseSeeder.php`:

| Role | Email | Password |
|---|---|---|
| Administrator | `admin@sims.test` | `password` |
| Staff | `staff@sims.test` | `password` |
| Student | `ace.cabuga@techacademy.edu` | `password` |

Administrators have full CRUD access across all modules. Staff accounts can view
all records (Students, Subjects, Enrollments, Dashboard) but cannot create, edit,
or delete. Student accounts only see their own portal and are blocked from every
staff/admin route. All of this is enforced server-side by the `admin`
(`EnsureUserIsAdmin`) and `staff` (`EnsureUserIsStaffOrAdmin`) middleware, not just
hidden in the UI.

## API Usage

All API routes live under `/api` and require a Sanctum bearer token (except login).

### Authenticate

```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" -H "Accept: application/json" \
  -d '{"email":"admin@sims.test","password":"password"}'
```

Response:

```json
{
  "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
  "user": { "id": 1, "name": "System Administrator", "email": "admin@sims.test", "role": "admin" }
}
```

Use the returned token as a `Bearer` token on subsequent requests.

### Endpoints

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/login` | Exchange credentials for an API token |
| POST | `/api/logout` | Revoke the current token |
| GET | `/api/students` | List students (paginated) |
| GET | `/api/students/{id}` | Get a single student |
| POST | `/api/students` | Create a student |
| PUT | `/api/students/{id}` | Update a student |
| DELETE | `/api/students/{id}` | Delete a student |
| GET\|POST\|PUT\|DELETE | `/api/subjects[/{id}]` | Same CRUD shape for subjects |
| GET\|POST\|PUT\|DELETE | `/api/enrollments[/{id}]` | Same CRUD shape for enrollments |

### Example: create a student

```bash
curl -X POST http://localhost:8000/api/students \
  -H "Authorization: Bearer <token>" \
  -H "Accept: application/json" -H "Content-Type: application/json" \
  -d '{"student_number":"S99-0002","first_name":"Maria","last_name":"Santos","email":"maria@sims.test","course":"BSCS","year_level":3}'
```

A Postman collection can be generated by importing the routes above, or via
`php artisan route:list --path=api`.

## Running Tests

```bash
php artisan test
```

44 feature tests cover: guest redirects, role-based access control, server-side
validation (required/unique/email), the enrollment composite-uniqueness rule, and
the full REST API (including the 401 unauthenticated case).

## Project Structure Notes

- `app/Enums/Role.php`, `app/Enums/EnrollmentStatus.php` — typed enums for role and
  enrollment status instead of magic strings
- `app/Http/Middleware/EnsureUserIsAdmin.php` — aliased as `admin` in
  `bootstrap/app.php`, used on all create/edit/delete routes
- `app/Http/Middleware/EnsureUserIsStaffOrAdmin.php` — aliased as `staff`, blocks
  `Student`-role accounts from every Students/Subjects/Enrollments management route
- `app/Http/Controllers/Api/` — JSON API controllers, separate from the Blade web
  controllers in `app/Http/Controllers/`
- `app/Http/Resources/` — Eloquent API Resources for consistent JSON responses
- `routes/web.php` — note the explicit route ordering: `create`/`edit` routes are
  registered before the `{student}` show wildcard to avoid the wildcard swallowing
  literal segments like `/students/create`
- `routes/api.php` — API route names are prefixed `api.*` to avoid colliding with
  the web route names of the same resource

## Deployment (Railway)

The app includes a `Procfile` so Railway's Nixpacks builder can run it directly.

1. Push this repository to GitHub.
2. On [railway.app](https://railway.app), sign in with GitHub and create a new
   project from this repo.
3. Attach a **Volume** mounted at `/app/database` so the SQLite file persists
   across deploys/restarts (Railway's filesystem is otherwise ephemeral).
4. Set these environment variables in the Railway service:

   | Variable | Value |
   |---|---|
   | `APP_KEY` | Generate locally with `php artisan key:generate --show` and paste the output |
   | `APP_ENV` | `production` |
   | `APP_DEBUG` | `false` |
   | `APP_URL` | Your Railway-assigned domain, e.g. `https://sims-laravel.up.railway.app` |
   | `DB_CONNECTION` | `sqlite` |
   | `DB_DATABASE` | `/app/database/database.sqlite` |
   | `SESSION_DRIVER` | `database` |
   | `CACHE_STORE` | `database` |
   | `QUEUE_CONNECTION` | `database` |

5. Deploy. The `Procfile`'s start command runs `php artisan migrate --force`
   on every boot (safe/idempotent) before serving the app.
6. Seed demo data once, after the first successful deploy, via Railway's
   "Run a command" / shell feature:

   ```bash
   php artisan db:seed --force
   ```

## AI-Assisted Development

This project was built with AI-agent assistance (Claude Code). See the accompanying
`AI_PORTFOLIO.pdf`, `AGENT_DESIGN.pdf`, and `REFLECTION.pdf` for the prompt history,
agent workflow, and engineering reflection.
