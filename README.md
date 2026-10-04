# EduFusion

> Full-stack education management platform for students, teachers, counselors, and administrators.

## Overview

EduFusion is a web-based education management system designed to centralize student, teacher, counselor, and academic information in one application.

The project demonstrates full-stack development, relational database design, role-based workflows, and practical web application development.

## Features

- Student management
- Teacher management
- Counselor management
- User/account management
- Education and aspiration-related data management
- Relational database integration
- Web-based administrative workflows

## Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Version Control:** Git / GitHub

> The stack above reflects the technologies identified in this repository. Update this section if the implementation changes.

## Architecture

```text
┌─────────────────────┐
│      Web Browser    │
│   HTML/CSS/JS UI    │
└──────────┬──────────┘
           │ HTTP
           ▼
┌─────────────────────┐
│      PHP Backend    │
│ Application Logic   │
└──────────┬──────────┘
           │ SQL
           ▼
┌─────────────────────┐
│       MySQL         │
│ Relational Database │
└─────────────────────┘
```

## Database

The application uses MySQL for persistent data storage.

For reproducible setup, database definitions should be maintained as SQL scripts rather than database-engine-specific binary files.

Recommended structure:

```text
database/
├── schema.sql
└── seed.sql
```

## Getting Started

### Prerequisites

- PHP
- MySQL
- A local PHP development environment such as XAMPP
- Git

### Installation

```bash
git clone https://github.com/kavirsawant1108/edufusion.git
cd edufusion
```

1. Configure the PHP application for your local environment.
2. Create a MySQL database.
3. Import the project database/schema.
4. Update database connection settings.
5. Start Apache/PHP and open the application in your browser.

## Project Structure

The repository is being progressively organized around application code, database assets, and documentation.

```text
edufusion/
├── database/
├── assets/
├── docs/
├── application/
└── README.md
```

## Engineering Notes

- Keep database credentials outside committed source code.
- Prefer SQL schema/seed files over database engine storage files.
- Keep temporary test files and local development artifacts out of the production repository.
- Document major architectural decisions as the application evolves.

## Future Improvements

- Role-based authentication and authorization
- REST API layer
- Automated tests
- Better database migration workflow
- Deployment configuration
- CI checks
- API and architecture documentation

## License

Add a license when the project's ownership and reuse terms are confirmed.
