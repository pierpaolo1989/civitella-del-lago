## Description

Project containing the frontend and backend side of <a href="https://civitelladellago.com">unofficial website of village Civitella del Lago</a>

## Setup

Install the PHP dependencies before deploying or running the contact form:

```sh
composer install
```

## Automatic deployment to Hostinger

The GitHub Actions workflow in `.github/workflows/deploy.yml` deploys the site over FTPS when code is pushed to `main`. It can also be started manually from the repository's **Actions** tab. Production Composer dependencies are installed by the workflow before upload.

In **GitHub → Settings → Secrets and variables → Actions**, add these repository secrets using the values shown in Hostinger hPanel under the FTP account:

- `HOSTINGER_FTP_SERVER`: FTP hostname, without `ftp://` (for example, the hostname provided by Hostinger).
- `HOSTINGER_FTP_USERNAME`: FTP account username.
- `HOSTINGER_FTP_PASSWORD`: FTP account password.
- `HOSTINGER_FTP_SERVER_DIR`: destination directory, including its trailing slash (often `public_html/`; use the exact directory exposed by the FTP account).

The workflow uses explicit FTPS on port 21. Change the protocol or port in the workflow only if the FTP settings in hPanel specify different connection details. If the Hostinger PHP version differs from 8.2, update `php-version` in the workflow to match it.

The deployment workflow does not configure application runtime settings on Hostinger. Configure these PHP environment variables in the hosting environment: `DB_DSN`, `DB_USER`, `DB_PASSWORD`, `SMTP_USERNAME`, and `SMTP_PASSWORD`. The SMTP username must match the mailbox used to send contact-form messages. Do not add these values to the repository or use GitHub Actions secrets as a substitute for Hostinger's runtime configuration.


## Authors

Contributors names and contact info

ex. [@PierpaoloDiDato](https://github.com/pierpaolo1989)
