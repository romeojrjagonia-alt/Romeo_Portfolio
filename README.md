# Personal Portfolio Website

A clean, responsive, and interactive modern portfolio website built with **Laravel** and **Tailwind CSS** as part of the Web Development Intern Challenge.

## 🚀 Live Demo
- **Deployed Site:** https://romeoportfolio-nine.vercel.app

---

## 📌 Features

- **Home Section:** Includes personal bio, profile image, tech stack tags, and title.
- **Projects Showcase:** Displays featured web projects with descriptions, tags, preview images, and Live Demo / GitHub links.
- **Interactive Contact Form:** Name, Email, and Message fields with client-side validation and an immediate success toast (no page refresh).
- **Responsive Design:** Optimized for mobile, tablet, and desktop viewports, with a collapsible mobile menu.
- **Dark Mode Support:** Toggle between light and dark themes (saved in the browser, defaults to your OS preference).
- **Smooth Navigation:** Seamless anchor links (`#home`, `#projects`, `#contact`) and CSS transitions on buttons and cards.
- **Easter Egg:** Click the profile picture 3 times in quick succession and see what beholds

---

## 🛠️ Tech Stack

- **Laravel 12 (PHP 8.2+):** Routing and Blade templating
- **Tailwind CSS 4:** Utility-first styling, responsive layout, `.dark` class dark mode
- **JavaScript (ES6+):** DOM manipulation, form handling (`e.preventDefault()`), dark mode toggle
- **Vite:** Asset bundling
- **Deployment:** Static export of the Laravel page, hosted on Vercel

---

## 📂 Project Structure

```
├── routes/web.php                         # "/" route + portfolio content (name, bio, projects)
├── resources/views/portfolio.blade.php    # Main Blade layout (Home, Projects, Contact)
├── resources/css/app.css                  # Tailwind import, dark variant, smooth scrolling
├── resources/js/app.js                    # Dark mode, mobile menu, contact form, easter egg
├── app/Console/Commands/ExportStatic.php  # `portfolio:export` command (renders the page to static HTML)
├── public/assets/                         # Profile picture, project images, favicon
├── dist/                                  # Generated static site that Vercel serves (do not edit by hand)
├── vercel.json                            # Tells Vercel to serve dist/ with no build step
└── README.md                              # Project documentation
```

---

## ⚙️ Setup & Local Installation

**Requirements:** PHP 8.2+, Composer, Node.js 20+ and npm.

1. **Clone the repository:**
   ```bash
   git clone https://github.com/romeojrjagonia-alt/Romeo_Portfolio.git
   ```

2. **Navigate to the project directory:**
   ```bash
   cd Romeo_Portfolio
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

## ☁️ Deployment (static export to Vercel)

The portfolio has no database or server-side logic, so the Laravel page is exported to plain static HTML and hosted on Vercel, which does not need PHP.

1. **Export the site** (builds the assets, then renders the page into `dist/`):
   ```bash
   npm run export
   ```
   Stop `npm run dev` first, since the export needs the production build.
2. **Commit and push** to GitHub, including the `dist/` folder.
3. On [vercel.com](https://vercel.com), choose **Add New → Project**, import the GitHub repository, and click **Deploy**. No settings need changing; `vercel.json` already points Vercel at `dist/` with no build step.
4. Put the resulting URL in the **Live Demo** section above.

Every push redeploys automatically. **Remember to run `npm run export` before committing content changes**, otherwise the old `dist/` is deployed.

---

## 👤 Author

- **Name:** Romeo Jagonia Jr.
- **GitHub:** [@romeojrjagonia-alt](https://github.com/romeojrjagonia-alt)
- **LinkedIn:** [aesire56](https://www.linkedin.com/in/aesire56)
