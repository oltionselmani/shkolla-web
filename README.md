# shkolla-web (Kuvendi i Lezhës)

Web application for a school site, built with plain PHP 8 + MySQL on a XAMPP stack.
Visitors can read publications and staff biographies and submit applications; logged-in
users get role-specific dashboards.

## Roles

| Role | Area | What it does |
| --- | --- | --- |
| Admin | `admin/` | Dashboard, user/profile management |
| Teacher (`prof`) | `prof/` | Grades (`notat`), student lists, reviewing and approving/rejecting applications for the natyror and shoqëror tracks |
| Parent (`prind`) | `prind/` | Registers students, submits applications, views grades and reports |
| Publisher | `publikimet/` | Creates and deletes publications and biographies |
| Public | `public/`, `index.php` | Public pages: news, biographies, contact, application form |

Authentication lives in `llogaria/` (login, signup, logout).

## Layout

```
classes/     Database, User, Nxenesi, Aplikimet, Publikimet, Drejtimet + PHPMailer
config/      config.php (BASE_URL)
css/  img/    static assets
header.php   footer.php   index.php
z-panevojshme/  scratch/older versions, not wired into the site
```

## Setup

1. Copy the project into `htdocs/` under XAMPP and start Apache + MySQL.
2. Create a MySQL database named `kuvendi-lezhes`.
3. Connection settings are in `classes/Database.php` (defaults to `root` with an empty
   password, as XAMPP ships).
4. Adjust `BASE_URL` in `config/config.php` if the folder name differs.
5. Open the site at the URL set in `BASE_URL`.

Outgoing mail uses PHPMailer over Gmail SMTP; the credentials are defined at the top of
`classes/Aplikimet.php`.

## Note

`kuvendi-lezhes/` inside the project root is an older full copy of the site, kept for
reference. The live code is the one at the root.
