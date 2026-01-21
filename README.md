# WellnessWeb - Vercel Deployment Guide

This Laravel application is configured for deployment on Vercel.

## Prerequisites

Before deploying to Vercel, ensure you have:
- A Vercel account
- Vercel CLI installed (`npm i -g vercel`)

## Deployment Steps

### 1. Generate Application Key

The `APP_KEY` must be set before deployment. Run this command locally:

```bash
cd WellnessWeb
php artisan key:generate
```

Copy the generated key from `WellnessWeb/.env` and add it to your Vercel environment variables.

### 2. Set Environment Variables in Vercel

Go to your Vercel project settings and add these environment variables:

**Required:**
- `APP_KEY` - Generated from step 1
- `APP_URL` - Your Vercel deployment URL (e.g., https://your-app.vercel.app)

**Optional (update as needed):**
- `DB_CONNECTION` - Database connection type
- `DB_HOST` - Database host
- `DB_PORT` - Database port
- `DB_DATABASE` - Database name
- `DB_USERNAME` - Database username
- `DB_PASSWORD` - Database password
- `MAIL_MAILER` - Mail driver
- `MAIL_HOST` - Mail host
- `MAIL_PORT` - Mail port
- `MAIL_USERNAME` - Mail username
- `MAIL_PASSWORD` - Mail password

### 3. Install Dependencies

```bash
cd WellnessWeb
composer install --no-dev --optimize-autoloader
npm install
npm run build
```

### 4. Deploy to Vercel

From the root directory (`testfortotal`):

```bash
vercel --prod
```

Or link to an existing project:

```bash
vercel link
vercel --prod
```

## Important Notes

### Storage Directory
Vercel's serverless functions have read-only file systems except for `/tmp`. You may need to:
- Use external storage (S3, Cloudinary) for file uploads
- Configure session driver to use cookies or database instead of files
- Set cache driver to array, database, or Redis

### Database
- SQLite won't work well on Vercel (read-only filesystem)
- Use a cloud database (PlanetScale, Supabase, AWS RDS, etc.)
- Update `DB_*` environment variables in Vercel

### Sessions
The configuration uses cookie-based sessions for Vercel compatibility.

### Logs
Logs are configured to use `stderr` which works with Vercel's logging system.

### Queue Workers
Background queue workers don't work on Vercel. Use:
- `QUEUE_CONNECTION=sync` for synchronous processing
- External queue service (AWS SQS, Redis Queue, etc.)

## File Structure

```
testfortotal/
├── api/
│   └── index.php          # Vercel serverless entry point
├── WellnessWeb/           # Laravel application
├── vercel.json            # Vercel configuration
├── .vercelignore          # Files to ignore during deployment
└── README.md              # This file
```

## Troubleshooting

### Build Fails
- Ensure all dependencies are in `composer.json`
- Check PHP version compatibility (requires PHP ^8.2)
- Verify `composer install` runs successfully locally

### 500 Errors
- Check Vercel function logs
- Verify `APP_KEY` is set
- Ensure database connection is configured correctly
- Check file permissions for storage directories

### Static Assets Not Loading
- Run `npm run build` before deploying
- Verify asset paths in `vercel.json` routes
- Check that `public` directory is accessible

## Support

For more information:
- [Vercel PHP Runtime](https://github.com/vercel-community/php)
- [Laravel Deployment Documentation](https://laravel.com/docs/deployment)
