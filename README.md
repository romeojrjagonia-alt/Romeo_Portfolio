# Personal Portfolio Website

A clean, responsive, and interactive modern portfolio website built with **Laravel** and **Tailwind CSS** as part of the Web Development Intern Challenge.

## 🚀 Live Demo
- **Deployed Site:** [https://your-app.onrender.com](https://your-app.onrender.com) *(replace with your Render / Railway / Laravel Cloud URL)*

---

## 📌 Features

- **Home Section:** Includes personal bio, profile image, tech stack tags, and title.
- **Projects Showcase:** Displays featured web projects with descriptions, tags, preview images, and Live Demo / GitHub links.
- **Interactive Contact Form:** Name, Email, and Message fields with client-side validation and an immediate success toast (no page refresh).
- **Responsive Design:** Optimized for mobile, tablet, and desktop viewports, with a collapsible mobile menu.
- **Dark Mode Support:** Toggle between light and dark themes (saved in the browser, defaults to your OS preference).
- **Smooth Navigation:** Seamless anchor links (`#home`, `#projects`, `#contact`) and CSS transitions on buttons and cards.

---

## 🛠️ Tech Stack

- **Laravel 12 (PHP 8.2+):** Routing and Blade templating
- **Tailwind CSS 4:** Utility-first styling, responsive layout, `.dark` class dark mode
- **JavaScript (ES6+):** DOM manipulation, form handling (`e.preventDefault()`), dark mode toggle
- **Vite:** Asset bundling
- **Deployment:** Any PHP-capable host (Render / Railway / Laravel Cloud)

---

## 📂 Project Structure

```
├── routes/web.php                         # "/" route + portfolio content (name, bio, projects)
├── resources/views/portfolio.blade.php    # Main Blade layout (Home, Projects, Contact)
├── resources/css/app.css                  # Tailwind import, dark variant, smooth scrolling
├── resources/js/app.js                    # Dark mode, mobile menu, contact form handling
├── public/assets/                         # Profile picture, project images, favicon
└── README.md                              # Project documentation
```

> **Customizing:** edit the placeholders (`[Your Name]`, bio, links, projects) in `routes/web.php`, and replace the images in `public/assets/` (keep the file names, or update the paths in `routes/web.php`).

---

## ⚙️ Setup & Local Installation

**Requirements:** PHP 8.2+, Composer, Node.js 20+ and npm.

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/portfolio-challenge.git
   ```

2. **Navigate to the project directory:**
   ```bash
   cd portfolio-challenge
   ```

3. **Install dependencies and set up the environment:**
   ```bash
   composer install
   npm install
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run the app (two terminals):**
   ```bash
   npm run dev
   ```
   ```bash
   php artisan serve
   ```
   Then open <http://localhost:8000>.

To create the production assets instead of running Vite, use `npm run build`.

---

## ☁️ Deployment (PHP host)

GitHub Pages cannot run PHP, so deploy to a PHP-capable host. Example for **Render** (Docker):

1. Push the repository to GitHub.
2. Add a `Dockerfile` that installs PHP 8.2 + Composer + Node, runs `composer install --no-dev --optimize-autoloader`, `npm ci && npm run build`, and serves `public/` (for example with `php artisan serve --host=0.0.0.0 --port=$PORT` for a simple demo, or Nginx + PHP-FPM for production).
3. Create a new **Web Service** on Render from the GitHub repo and choose the Docker runtime.
4. Set these environment variables:
   - `APP_ENV=production`, `APP_DEBUG=false`
   - `APP_KEY` (generate locally with `php artisan key:generate --show`)
   - `APP_URL=https://your-app.onrender.com`
   - `SESSION_DRIVER=cookie`, `CACHE_STORE=file`, `LOG_CHANNEL=stderr`
5. Deploy, then put the live URL in the **Live Demo** section above.

**Railway / Laravel Cloud:** connect the GitHub repo; they auto-detect Laravel. Set `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, and make sure `npm run build` runs during the build step.

The site uses no database, so no migrations are needed in production.

---

## 👤 Author

- **Name:** Your Name
- **GitHub:** [@your-username](https://github.com/your-username)
- **LinkedIn:** [Your LinkedIn Profile](https://linkedin.com/in/your-profile)
