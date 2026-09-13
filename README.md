# PontiPin

PontiPin is a Laravel web application for discovering cafes in Pontianak, West Kalimantan. It provides a cafe catalog, cafe detail pages, and a homepage for browsing cafes by location and vibe.

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js and npm
- SQLite (the default database connection) or another database supported by Laravel

## Installation

1. Clone the repository and enter the project directory.

	```bash
	git clone <repository-url>
	cd Ponti-Pin
	```

2. Install the PHP and JavaScript dependencies, create the environment file, generate the application key, run migrations, and build the frontend assets.

	```bash
	composer run setup
	```

3. Start the local development environment.

	```bash
	composer run dev
	```

## Main Routes

| Route | Purpose |
| --- | --- |
| `/` | Homepage |
| `/Home` | Homepage controller route |
| `/ExploreCafe` | Explore cafe catalog |
| `/ExploreCafe/{id}` | Cafe detail page |
| `/CafePage` | Cafe page |
| `/CafePage/{id}` | Cafe detail page |


