# Own Hub

A modern, clean, and responsive personal website-portfolio built with Laravel. This project serves as a central hub for showcasing projects, managing a personal profile, and providing a seamless user experience with modern web technologies.

## ✨ Features

- **Minimalist Design:** Clean and modern UI with a focus on simplicity.
- **Personal Portfolio:** Designed to showcase your work and skills.
- **User Authentication:** Fully functional login and registration system.
- **Profile Management:** Users can manage their personal information and settings.
- **Dark/Light Mode:** Integrated theme toggling for a comfortable viewing experience.
- **Command Palette:** Quick navigation and actions via a powerful command interface.
- **Responsive Design:** Optimized for all devices, from mobile to desktop.
- **Modern Tech Stack:** Built with the latest versions of Laravel, Tailwind CSS, and Vite.

## 🚀 Tech Stack

- **Backend:** [Laravel 13](https://laravel.com)
- **Frontend:** [Tailwind CSS 4](https://tailwindcss.com), [Vite 8](https://vitejs.dev), Blade Components
- **Language:** PHP 8.3, JavaScript

## 🛠️ Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/own-hub.git
   cd own-hub
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration:**
   Configure your database settings in the `.env` file and run migrations:
   ```bash
   php artisan migrate
   ```

5. **Compile Assets:**
   ```bash
   npm run dev
   # or for production
   npm run build
   ```

6. **Start the Server:**
   ```bash
   php artisan serve
   ```

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).
