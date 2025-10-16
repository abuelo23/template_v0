# Build and deploy

This project uses Vite for frontend assets and PHPUnit for tests. Quick steps to build and prepare the app:

1. Install PHP dependencies (if not already done):

```bash
composer install --no-interaction --prefer-dist --optimize-autoloader
```

2. Install Node dependencies and build assets:

```bash
npm ci
npm run build
```

3. Ensure storage and cache directories are writable by the webserver (common user: `www-data`):

```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R ug+rwX storage bootstrap/cache
```

4. Run tests:

```bash
./vendor/bin/phpunit
```

Notes:
- In development you can run `npm run dev` to use Vite's dev server.
- Add the `npm ci && npm run build` step to your CI/deploy pipeline so `public/build/manifest.json` is always generated.
