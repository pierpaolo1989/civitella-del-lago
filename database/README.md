# Database and administrator setup

1. Create a MySQL/MariaDB database and a dedicated database user with access only to it.
2. Import `schema.sql` into that database using the hosting control panel or the MySQL command-line client.
3. Configure these environment variables in the PHP hosting environment (never commit the values):

   - `DB_DSN`: `mysql:host=localhost;dbname=YOUR_DATABASE;charset=utf8mb4`
   - `DB_USER`: the database user
   - `DB_PASSWORD`: the database password

   Add `;port=3306` to the DSN if the host uses a non-default port. The PHP `pdo_mysql` extension must be enabled.
4. Before opening registration to the public, create the account `contatti@civitelladellago.com` yourself at `registrazione.php`.
5. Run `promote-admin.sql` once your account exists. Sign out and back in for the administrator role to take effect. Do not promote an account unless you personally created it and control its credentials.
6. Serve the site over HTTPS before collecting account data. `database/.htaccess` blocks direct access to SQL files on Apache; also deny access to the `database` directory in the web-server configuration if the host uses Nginx or another server.

Passwords are stored as PHP password hashes. Registration does not send email verification; administrator privileges are granted explicitly by the SQL step above, not by registering with the public contact address. The registration form records when the privacy notice was acknowledged. The site owner should review the privacy notice and retention practices with their privacy adviser before collecting real user data.
