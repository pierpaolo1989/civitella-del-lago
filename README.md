## Description

Project containing the frontend and backend side of <a href="https://civitelladellago.com">unofficial website of village Civitella del Lago</a>

## Setup

Install PHP dependencies:

```sh
composer install
```

### Local development

1. Install PHP with `pdo_mysql`, Composer, and a local MySQL/MariaDB server.
2. Create a local database and import the schema:

   ```sh
   mysql -u root -p -e "CREATE DATABASE civitella CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
   mysql -u root -p civitella < database/schema.sql
   ```

   Alternatively, create the database and import `database/schema.sql` through phpMyAdmin.
3. Copy `.env.example` to `.env` and set `DB_USER` and `DB_PASSWORD` to the local database credentials. Leave the SMTP values empty unless you want to test sending email; never put production credentials in this file.
4. Start the site from Bash or a compatible shell in the project directory:

   ```sh
   set -a
   . ./.env
   set +a
   php -S 127.0.0.1:8000
   ```

   Open `http://127.0.0.1:8000`. Keep the server running in that terminal. On PowerShell, set the same variables with `$env:DB_DSN = '...'`, `$env:DB_USER = '...'`, and `$env:DB_PASSWORD = '...'`, then run `php -S 127.0.0.1:8000` in that same window.

The `.env` file is ignored by Git. PHP's built-in server does not load `.env` files by itself; the Bash commands above export the values into the server process.

## Automatic deployment to Hostinger

The GitHub Actions workflow in `.github/workflows/deploy.yml` deploys the site over FTPS when code is pushed to `main`. It can also be started manually from the repository's **Actions** tab. Production Composer dependencies are installed by the workflow before upload.

In **GitHub → Settings → Secrets and variables → Actions**, add these repository secrets using the values shown in Hostinger hPanel under the FTP account:

- `HOSTINGER_FTP_SERVER`: FTP hostname, without `ftp://` (for example, the hostname provided by Hostinger).
- `HOSTINGER_FTP_USERNAME`: FTP account username.
- `HOSTINGER_FTP_PASSWORD`: FTP account password.
- `HOSTINGER_FTP_SERVER_DIR`: destination directory, including its trailing slash (often `public_html/`; use the exact directory exposed by the FTP account).

The workflow uses explicit FTPS on port 21. Change the protocol or port in the workflow only if the FTP settings in hPanel specify different connection details. If the Hostinger PHP version differs from 8.2, update `php-version` in the workflow to match it.

The FTP secrets above are only for GitHub Actions to upload files. They do not configure the PHP application on Hostinger. Configure the application variables in the PHP runtime environment provided by your hosting plan:

- `DB_DSN`: for example, `mysql:host=HOST_DB;dbname=DATABASE_NAME;charset=utf8mb4`, using the database host and name shown in hPanel.
- `DB_USER` and `DB_PASSWORD`: the MySQL user and password shown/configured in hPanel.
- `SMTP_USERNAME` and `SMTP_PASSWORD`: the Hostinger mailbox address and its password; use a mailbox authorized to send mail.

The database and SMTP passwords are secrets. Store them only in the hosting runtime's private environment settings, not in GitHub Actions secrets, the repository, or a file under `public_html`. The database name, DB user, and SMTP username are configuration/identifiers rather than passwords, but should still not be published unnecessarily.

Hostinger's environment-variable controls can differ by hosting plan. Check hPanel for PHP/app environment settings or ask Hostinger support whether custom variables are exposed to PHP's `getenv()`. If your plan has no such feature, do not upload `.env.example` as a substitute: the app needs a private configuration mechanism outside the web root, which must be set up for your account before the database-backed pages and contact form can work.


## Authors

Contributors names and contact info

ex. [@PierpaoloDiDato](https://github.com/pierpaolo1989)
