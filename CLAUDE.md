# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Syncro is a monorepo with two applications:
- `api/` — Laravel 12 backend (PHP 8.2+)
- `web/` — SvelteKit 2 frontend (TypeScript)

## Development Commands

### API (Laravel) — run from `api/`

```bash
# Start all dev services concurrently (API + queue + logs + Vite assets)
composer run dev

# Or individually:
php artisan serve        # HTTP server on port 8000
php artisan queue:listen # Background job processor
php artisan pail         # Real-time log viewer
npm run dev              # Vite asset compilation (watch mode)

# First-time setup
composer run setup       # install, .env, key:generate, migrate, npm install, build

# Run tests
composer run test        # Clears config cache then runs PHPUnit
php artisan test --filter=ClassName  # Run a single test class

# Linting
./vendor/bin/pint        # Laravel Pint (PHP code style fixer)

# Build assets
npm run build
```

### Web (SvelteKit) — run from `web/`

```bash
npm run dev              # Vite dev server
npm run build            # Production build
npm run preview          # Preview production build
npm run check            # svelte-check type checking
npm run check:watch      # Type checking in watch mode
```

## Architecture

### API — Laravel MVC

- **Routes**: `routes/web.php` (HTTP) and `routes/console.php` (Artisan commands)
- **Controllers**: `app/Http/Controllers/` — extend base `Controller`
- **Models**: `app/Models/` — Eloquent ORM (User model already present)
- **Migrations**: `database/migrations/` — MySQL, tables: users, sessions, cache, jobs
- **Views**: `resources/views/` — Blade templates
- **Service Providers**: `app/Providers/AppServiceProvider.php`

Database uses MySQL (`syncro` database). Key env vars are in `api/.env`.

### Web — SvelteKit File-based Routing

- **Routes**: `src/routes/` — `+page.svelte` (page component), `+layout.svelte` (layout wrapper)
- **Shared utilities**: `src/lib/` — exported via `src/lib/index.ts`
- **Styling**: Tailwind CSS v4 via `src/app.css`
- **HTTP calls**: Axios to the Laravel API (port 8000)

Current routes:
- `/` — home page
- `/admin/login` — admin login (skeleton, not yet implemented)

### Data Flow

SvelteKit frontend → Axios HTTP → Laravel API (port 8000) → Eloquent → MySQL
