# EduFusion

> Full-stack education management platform for students, teachers, counselors, and administrators.

## Overview

EduFusion is a web-based education management system designed to centralize student, teacher, counselor, and academic information in one application.

The project demonstrates full-stack development, relational database design, role-oriented workflows, and practical web application development.

## Key Features

- Student management
- Teacher management
- Counselor management
- User/account management
- Education and aspiration-related data management
- Relational database integration
- Web-based administrative workflows

## Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML, CSS, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Version Control | Git / GitHub |

## System Architecture

```text
Web Browser
    │
    │ HTTP
    ▼
PHP Application
    │
    │ SQL
    ▼
MySQL Database
```

## Database

The application uses MySQL for persistent data storage.

Database engine files such as `.frm`, `.ibd`, and `db.opt` are local MySQL artifacts and should not be treated as portable application source.

For reproducible development, add a database export such as:

```text
database/
├── schema.sql
└── seed.sql
```

## Getting Started

### Prerequisites

- PHP
- MySQL
- XAMPP or another local PHP development environment
- Git

### Installation

```bash
git clone https://github.com/kavirsawant1108/edufusion.git
cd edufusion
```

1. Configure the PHP application for your local environment.
2. Create a MySQL database.
3. Import the project's SQL schema/export when available.
4. Configure the database connection.
5. Start Apache/PHP and open the application in your browser.

## Recommended Project Structure

```text
edufusion/
├── EduFusion/
├── database/
├── docs/
├── assets/
├── .gitignore
└── README.md
```

## Engineering Notes

- Keep database credentials outside committed source code.
- Keep local database-engine artifacts out of Git.
- Prefer portable SQL schema/seed files for reproducible setup.
- Keep temporary development artifacts out of the repository.
- Document major architectural decisions as the application evolves.

## Future Improvements

- Role-based authentication and authorization
- REST API layer
- Automated tests
- Database migration workflow
- Deployment configuration
- CI checks
- API and architecture documentation

## License

Add a license when project ownership and reuse terms are confirmed.
