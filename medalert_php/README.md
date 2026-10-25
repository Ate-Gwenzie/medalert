# MedAlert Responsive PHP Prototype

A single-file responsive PHP prototype based on the MedAlert student mobile and clinic desktop layouts.

## Included screens
- Student home with one-tap request CTA and current status
- Medical request form (issue, location, symptoms, urgency, extra details)
- Request sent confirmation with status timeline
- Request history
- Desktop clinic/admin dispatch dashboard with status updates
- Responsive navigation and layouts for phone, tablet, and desktop

## Run locally
Requires PHP 8.0+.

```bash
php -S localhost:8000
```

Open `http://localhost:8000/index.php`.

## Important prototype notes
- Requests are stored in PHP session data, not a persistent database.
- This does not notify a real nurse or clinic.
- Before production use, add authentication, role-based access control, a database, CSRF protection, robust validation, audit logging, secure hosting, and approved campus response integrations.
- Do not use this prototype as a substitute for emergency services.
