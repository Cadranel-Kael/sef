# SEF Website Rebranding and Recreation Project

## Table of Contents

1. [Project Overview](#project-overview)
2. [Goals and Objectives](#goals-and-objectives)
3. [Project Scope](#project-scope)
4. [Technologies Used](#technologies-used)
5. [Installation Instructions](#installation-instructions)
7. [Project Structure](#project-structure)
9. [Contact Information](#contact-information)

## Project Overview

This project involves the rebranding and recreation of the website for SEF, a belgian non-profit organization dedicated to helping the homeless by giving them a home and giving opportunities to reintegrate society. The goal is to enhance the online presence of SEF, making it more appealing and user-friendly, while accurately representing the organization's mission and values.

## Goals and Objectives

- **Rebranding**: Update the visual identity of SEF to create a modern and cohesive brand image.
- **Website Redesign**: Develop a new website that is aesthetically pleasing, easy to navigate, and accessible.
- **Content Management**: Implement a content management system (CMS) to allow SEF staff to easily update and manage the website content.
- **Responsive Design**: Ensure the website is fully responsive and functions well on various devices (desktops, tablets, and smartphones).
- **SEO Optimization**: Optimize the website for search engines to increase visibility and reach.

## Project Scope

- **Brand Identity**: Design a new logo, color scheme, typography, and other branding elements.
- **Website Design**: Create wireframes and mockups for the new website layout.
- **Development**: Code the new website using modern web development technologies.
- **Content Migration**: Transfer existing content to the new website, ensuring it is formatted correctly.
- **Testing**: Conduct thorough testing to identify and fix any issues.
- **Launch**: Deploy the new website and ensure a smooth transition from the old site.

## Technologies Used

- **Frontend**: HTML5, CSS3, Typescript
- **Backend**: Bedrock, Acorn, Sage 10
- **Database**: SQL
- **CMS**: WordPress
- **Version Control**: Git, GitHub
- **Design Tools**: Adobe Photoshop, Adobe Illustrator, Figma

## Installation Instructions

**Requirements**
- PHP >= 8.0
- Composer
- [yarn](https://yarnpkg.com/)

**Plugins**
- [ACF pro](https://www.advancedcustomfields.com/pro/)

**Optional Plugins**
- [SVG Support](https://wordpress.org/plugins/svg-support/)
- [WordPress SEO by Yoast](https://wordpress.org/plugins/wordpress-seo/)

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Cadranel-Kael/sef.git
   ```
2. **Install Dependencies**:
   ```bash
   composer install
   ```
3. **Create a New Database**:
   Create a new database in your local environment and update the `.env` file with the database details (see .env.example as an example).
   ```bash
   DB_NAME=sef
   DB_USER=root
   DB_PASSWORD=
   ```
4. **Navigate to the SEF Directory**:
   ```bash
   cd web/app/themes/sef
   ```
6. **Install Dependencies**:
   ```bash
   yarn
   ```
7. **Configure Bud.js with your local dev URL**
   ```javascript
   app
    .setUrl(3000)
    .setPublicUrl(`http://example.test:3000`)
    .setProxyUrl(8080)
    .setPublicProxyUrl(`http://example.test`)
   ```
8. **Build the application**:
   ```bash
   yarn build
   ```
9. **Run the Development Server**:
   ```bash
   yarn dev
   ```
   
## Project Structure

```
themes/sef/   # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── Providers/        # → Service providers
│   ├── View/             # → View models
│   ├── filters.php       # → Theme filters
│   └── setup.php         # → Theme setup
├── composer.json         # → Autoloading for `app/` files
├── public/               # → Built theme assets (never edit)
├── functions.php         # → Theme bootloader
├── index.php             # → Theme template wrapper
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme javascript
│   ├── styles/           # → Theme stylesheets
│   └── views/            # → Theme templates
│       ├── components/   # → Component templates
│       ├── forms/        # → Form templates
│       ├── layouts/      # → Base templates
│       └── partials/     # → Partial templates
├── screenshot.png        # → Theme screenshot for WP admin
├── style.css             # → Theme meta information
├── vendor/               # → Composer packages (never edit)
└── bud.config.js         # → Bud configuration
```

## Contact Information

For any questions or suggestions, please contact:

- **Project Lead**: Kael Cadranel
- **Email**: kael.cadranel00@gmail.com
- **Website**: [kael.digital](https://www.kael.digital/)

---

Thank you for your interest in the SEF Website Rebranding and Recreation Project!
