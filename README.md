<div align="center">

<img src="photo/logo computer pride.png" alt="Computer Pride Logo" width="140"/>

# Computer Pride

**Training • Solutions • Innovation**

A responsive multi-page website for Computer Pride — an ICT training and technology solutions provider based in Nairobi, Kenya. Built with HTML, CSS, Bootstrap 5, and a PHP/MySQL backend for course bookings and contact enquiries.

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap_5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

</div>

---

## About

Computer Pride is an ICT training institute and technology solutions company. This website presents their courses, corporate services, team, and resources, and allows visitors to:

- Browse short courses and technology services
- Read articles and view an events gallery
- Book a training session
- Send a contact enquiry

The frontend is a static Bootstrap site. PHP scripts handle form submissions and store them in MySQL, making this a small full-stack (HTML/CSS/JS + PHP/MySQL) project.

---

## Features

- Responsive Bootstrap navbar shared across all pages
- Homepage hero with background video
- Course catalogue with category filters
- Services and corporate solutions pages
- Resources hub (gallery + articles)
- Standalone Articles & Insights page
- Course booking form → saved to MySQL
- Contact form with server-side validation → saved to MySQL
- FAQ section on the Contact page
- Technology partners section (Microsoft, Cisco, AWS, CompTIA, and others)
- Responsive layout for desktop, tablet, and mobile

---

## Pages

| Page | File | Description |
|------|------|-------------|
| Home | `index.html` | Hero, stats, popular courses, services overview, partners, CTA |
| About Us | `about-us.html` | Company story, values, timeline, leadership team, locations |
| Courses | `courses.html` | Short courses with filters (Programming, Networking, Cyber Security, Data & AI, Cloud, Design, Digital Skills) |
| Services | `services.html` | Certifications, business solutions, IT infrastructure |
| Corporate | `corporate.html` | Corporate training and technology services for organisations |
| resources | `resources.html` | Photo gallery and articles hub |
| Articles | `articles.html` | Full career and technology articles |
| Contact | `contact-us.html` | Contact form, FAQ, social links, location |

---

## Technologies

| Technology | Purpose |
|------------|---------|
| HTML5 | Page structure |
| CSS3 (`style.css`) | Custom styling |
| Bootstrap 5.3.8 | Layout, components, navbar (CDN) |
| Bootstrap Icons | Icons throughout the UI (CDN) |
| JavaScript | Course filters, timeline animation, course slider |
| PHP | Form handling (`add-booking.php`, `add-contact-us.php`, `add-user.php`) |
| MySQL | Stores bookings, contact messages, and users |
| XAMPP | Local development (Apache + MySQL + PHP) |

---

## Backend

| Script | Used by | Purpose |
|--------|---------|---------|
| `add-booking.php` | Booking modal (all pages) | Saves course booking requests to the `bookings` table |
| `add-contact-us.php` | Contact form | Validates and saves enquiries to the `contact_us` table |
| `add-user.php` | Not linked from any page yet | Creates a user account with a hashed password |

Forms require PHP and a running MySQL database. Without the backend, pages still display normally, but submissions will not be saved.

**Database name:** `computerpride project`

No `.sql` schema file is included. Create the database and tables locally using the fields below.

| Table | Columns |
|-------|---------|
| `bookings` | fullname, email, phone, course, preferred_date, preferred_time |
| `contact_us` | firstname, lastname, email, phone, message |
| `users` | fullname, email, password (hashed) |

---

## Project Structure

```text
computer-pride-website/
├── index.html
├── about-us.html
├── courses.html
├── services.html
├── corporate.html
├── resources.html
├── articles.html
├── contact-us.html
├── style.css
├── add-booking.php
├── add-contact-us.php
├── add-user.php
├── photo/                  # Logo, staff photos, course images
└── videos/                 # Hero background video
```

---

## Local Setup (XAMPP)

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Place the project folder in `htdocs`:
   ```text
   C:\xampp\htdocs\computer-pride-website   (Windows)
   /Applications/XAMPP/htdocs/...           (macOS)
   /opt/lampp/htdocs/...                    (Linux)
   ```
3. Open [phpMyAdmin](http://localhost/phpmyadmin) and create a database named:
   ```text
   computerpride project
   ```
4. Create the `bookings`, `contact_us`, and `users` tables with columns matching the form fields above.
5. The PHP files use XAMPP’s default local credentials (`root`, no password). Update them only if your MySQL setup differs.
6. Open the site:
   ```text
   http://localhost/computer-pride-website/index.html
   ```

---

## GitHub & Deployment

GitHub is used for source control, versioning, and project presentation.

**GitHub Pages** only serves static files. It cannot run PHP or connect to MySQL:

- Pages, styling, and navigation work
- Booking and contact forms will not submit

For a fully working site (including forms), use a host that supports PHP and MySQL, or run locally with XAMPP.

### Updating the repository

```bash
git add .
git commit -m "Describe your changes"
git push
```

- `git add .` — stages all changes  
- `git commit -m "..."` — saves a snapshot with a message  
- `git push` — uploads commits to GitHub  

---

## Screenshots

Screenshots are not included in the repository yet. Recommended captures:

| Page | Suggested filename |
|------|--------------------|
| Homepage hero | `docs/screenshots/homepage.png` |
| Courses | `docs/screenshots/courses.png` |
| About Us | `docs/screenshots/about-us.png` |
| Contact | `docs/screenshots/contact-us.png` |

After adding them, reference with:

```markdown
![Homepage](docs/screenshots/homepage.png)
```

---

## License

No license file is included. All rights are reserved unless a license is added later.

---

## Author

**Computer Pride** — ICT training and technology solutions.  
Project built as part of coursework.
