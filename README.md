# Ahava Medical WordPress Theme

A modern and professional WordPress theme designed specifically for medical practices and healthcare organizations. This theme provides a comprehensive solution for managing doctor profiles, appointments, locations, and more.

## Features

- **Appointment Booking System**: Easy-to-use appointment scheduling system
- **Doctor Profiles**: Detailed profiles for medical staff
- **Location Management**: Multiple location support with maps integration
- **Department Organization**: Structured department management
- **Responsive Design**: Fully responsive layout for all devices
- **Modern UI/UX**: Clean and professional design
- **Custom Post Types**: Optimized for medical content
- **Advanced Custom Fields Integration**: Flexible content management
- **Contact Form 7 Integration**: Built-in contact forms
- **SEO Optimized**: Built with search engine optimization in mind

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher
- Required Plugins:
  - Advanced Custom Fields Pro
  - Contact Form 7

## Installation

1. Download the theme files
2. Upload the theme folder to the `/wp-content/themes/` directory
3. Activate the theme through the WordPress admin panel
4. Install and activate the required plugins
5. Configure the theme options

## Theme Structure

```
theme/
├── assets/
│   ├── css/          # Stylesheets
│   ├── js/           # JavaScript files
│   └── images/       # Theme images
├── inc/              # Include files
│   ├── template-functions.php
│   └── template-tags.php
├── template-parts/   # Template parts
│   ├── content/      # Content templates
│   ├── header/       # Header templates
│   └── footer/       # Footer templates
├── functions.php     # Theme functions
├── index.php         # Main template file
└── style.css         # Theme stylesheet
```

## Customization

### Theme Options

The theme includes various customization options through the WordPress Customizer:

- Site Identity (logo, title, tagline)
- Colors
- Typography
- Header Options
- Footer Options
- Social Media Links

### Custom Post Types

The theme includes several custom post types:

- Doctors
- Locations
- Departments
- Services
- Careers

### Custom Fields

The theme uses Advanced Custom Fields for flexible content management. Key field groups include:

- Doctor Information
- Location Details
- Department Settings
- Service Options
- Career Requirements

## Development

### Building Assets

1. Install Node.js dependencies:

   ```bash
   npm install
   ```

2. Build assets:
   ```bash
   npm run build
   ```

### CSS Organization

The theme's CSS is organized into several files:

- `style.css`: Main stylesheet
- `assets/css/main.css`: Core styles
- `assets/css/tablet.css`: Tablet-specific styles
- `assets/css/mobile.css`: Mobile-specific styles

### JavaScript

The theme includes several JavaScript files:

- `assets/js/main.js`: Core functionality
- `assets/js/booking.js`: Appointment booking system
- Various third-party libraries (jQuery, Owl Carousel, etc.)

## Support

For support, please contact:

- Email: support@ahavamedical.com
- Website: https://ahavamedical.com/support

## License

This theme is licensed under the GNU General Public License v2 or later.

## Credits

- Design by Brainstorm
- Development by Brainstorm
- Icons by Font Awesome
- Fonts by Adobe Typekit
- Maps by Google Maps
- Forms by Contact Form 7

## Changelog

### 1.0.0

- Initial release
- Basic theme structure
- Core functionality implementation

## Roadmap

- [ ] Appointment system improvements
- [ ] Enhanced doctor profiles
- [ ] Additional location features
- [ ] Performance optimizations
- [ ] Accessibility improvements
