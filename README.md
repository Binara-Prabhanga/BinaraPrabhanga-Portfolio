# Binara Prabhanga - Portfolio Website

<p align="center">
<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
<img src="https://img.shields.io/badge/Node.js-43853D?style=for-the-badge&logo=node.js&logoColor=white" alt="Node.js">
<img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker">
<img src="https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white" alt="Vercel">
</p>

## About This Project

This is my personal portfolio website built with Laravel, showcasing my skills, projects, and professional experience. The application demonstrates modern web development practices with a focus on performance, scalability, and user experience.

## Tech Stack

### Backend
- **Laravel Framework** - Robust PHP framework for web applications
- **PHP 8.1.10** - Server-side scripting language
- **PostgreSQL** - Primary database (configured for production)
- **MySQL** - Alternative database support

### Frontend & Build Tools
- **Vite** - Modern frontend build tool for fast development
- **Node.js 18** - JavaScript runtime for build processes
- **Modern CSS/JavaScript** - For interactive user interfaces

### DevOps & Deployment
- **Docker** - Containerization for consistent environments
- **Vercel** - Hosting platform for seamless deployment
- **Git** - Version control system

## Features

- 🎨 **Modern Design** - Clean and responsive user interface
- ⚡ **Fast Performance** - Optimized with Vite build system
- 📱 **Mobile Responsive** - Works seamlessly across all devices
- 🐳 **Dockerized** - Easy development and deployment setup
- 🚀 **CI/CD Ready** - Automated deployment with Vercel
- 🔧 **Optimized Caching** - Laravel's built-in caching mechanisms

## Getting Started

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js 18 or higher
- Docker (optional)

### Local Development

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd BinaraPrabhanga-Portfolio
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Run the application**
   ```bash
   php artisan serve
   ```

### Docker Development

1. **Build and run with Docker**
   ```bash
   docker build -t binara-portfolio .
   docker run -p 8000:8000 binara-portfolio
   ```

## Deployment

This project is deployed on **Vercel** with automatic deployments from the main branch. The Docker configuration ensures consistent environments across development and production.

### Production Optimizations
- Automatic Laravel optimizations (config, route, view caching)
- Database migrations run automatically
- Vite asset compilation and optimization
- Proper file permissions and ownership

## Project Structure

```
├── app/                 # Laravel application logic
├── public/              # Public web assets
├── resources/           # Views, CSS, JS source files
├── routes/              # Application routes
├── database/            # Migrations and seeders
├── docker/              # Docker configuration
├── Dockerfile           # Container configuration
├── vite.config.js       # Vite build configuration
└── package.json         # Node.js dependencies
```

## Performance Features

- **Vite Hot Module Replacement** - Fast development builds
- **Laravel Caching** - Optimized configuration and route caching
- **Asset Optimization** - Minified and bundled frontend assets
- **Database Optimization** - Efficient queries and indexing

## Contact

Feel free to reach out for collaborations or opportunities!

- **Email**: [binaraprabhanga@gmail.com]
- **LinkedIn**: [(https://www.linkedin.com/in/binaraprabhanga/)]

