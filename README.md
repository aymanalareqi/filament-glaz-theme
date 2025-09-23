[![Latest Version on Packagist](https://img.shields.io/packagist/v/alareqi/filament-glaz-theme.svg?style=flat-square)](https://packagist.org/packages/alareqi/filament-glaz-theme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alareqi/filament-glaz-theme/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/aymanalareqi/filament-glaz-theme/actions?query=workflow%3Arun-tests+branch%3Amain)
![GitHub Code Style Action Status](https://github.com/aymanalareqi/filament-glaz-theme/actions/workflows/fix-php-code-style-issues.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/alareqi/filament-glaz-theme.svg?style=flat-square)](https://packagist.org/packages/alareqi/filament-glaz-theme)

# Filament Glaz Theme

A beautiful, modern Glaz theme for **Filament v4** admin panels featuring elegant light and dark modes with arctic-inspired design elements.

![Dashboard Light and Dark](https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/dashboard.jpg)

## ✨ Features

- 🎨 **Beautiful Glaz Design**: Clean, modern arctic-inspired aesthetic
- 🌙 **Light & Dark Modes**: Seamless switching between light and dark themes
- 📱 **Responsive Design**: Optimized for all screen sizes and devices
- ⚡ **Performance Optimized**: Lightweight CSS with minimal overhead
- 🎯 **Filament v4 Native**: Built specifically for Filament v4 architecture
- 🔧 **Easy Integration**: Simple installation and configuration
- 🎨 **Consistent UI**: Unified design language across all components
- ♿ **Accessibility**: WCAG compliant with proper contrast ratios

## Requirements

- **PHP**: 8.2 or higher
- **Laravel**: 11.0 or higher
- **Filament**: 4.0 or higher
- **Node.js**: 18.0 or higher (for asset compilation)

## Version Compatibility

| Filament | Filament Glaz Theme | Status |
|:---------|:-------------------|:-------|
| **4.x**  | **2.x**            | ✅ **Actively Supported** |
| 3.x      | 1.x                | ⚠️ Legacy Support Only |

> **Note**: This documentation covers version 2.x which is designed exclusively for **Filament v4**. For Filament v3 support, please refer to version 1.x documentation.

## Installation

### Step 1: Install the Package

Install the Glaz theme package via Composer:

```bash
composer require alareqi/filament-glaz-theme
```

### Step 2: Add CSS to Vite Configuration

Add the Glaz theme CSS file to the `input` array of your `vite.config.js` file:

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // Add the Glaz theme CSS
                'vendor/alareqi/filament-glaz-theme/resources/css/theme.css'
            ],
            refresh: true,
        }),
    ],
});
```

### Step 3: Build Assets

Compile the assets using Vite:

```bash
npm run build
```

For development with hot reloading:

```bash
npm run dev
```

### Step 4: Register the Plugin

Register the Glaz theme plugin in your Filament panel provider (e.g., `/app/Providers/Filament/AdminPanelProvider.php`):

```php
<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// Import the Glaz Theme Plugin
use Alareqi\FilamentGlazTheme\FilamentGlazThemePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            // Register the Glaz Theme Plugin
            ->plugin(FilamentGlazThemePlugin::make());
    }
}
```

### Step 5: Clear Cache (Optional)

Clear your application cache to ensure the theme loads properly:

```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

## Configuration

The Glaz theme works out of the box with sensible defaults, but you can customize it further:

### Basic Configuration

```php
use Alareqi\FilamentGlazTheme\FilamentGlazThemePlugin;

$panel->plugin(
    FilamentGlazThemePlugin::make()
        // Add any custom configuration here
);
```

### Advanced Configuration

For advanced customization, you can publish the theme assets:

```bash
php artisan vendor:publish --tag="filament-glaz-theme-assets"
```

This will publish the CSS files to your `resources/css/vendor/filament-glaz-theme/` directory where you can customize them.

## Multiple Panels

If you have multiple Filament panels, you can apply the Glaz theme to specific panels:

```php
// Admin Panel with Glaz Theme
public function adminPanel(Panel $panel): Panel
{
    return $panel
        ->id('admin')
        ->path('admin')
        ->plugin(FilamentGlazThemePlugin::make());
}

// User Panel without Glaz Theme
public function userPanel(Panel $panel): Panel
{
    return $panel
        ->id('user')
        ->path('user');
        // No Glaz theme plugin registered
}
```

## Troubleshooting

### Theme Not Loading

1. **Check Vite Configuration**: Ensure the CSS file is added to your `vite.config.js`
2. **Build Assets**: Run `npm run build` or `npm run dev`
3. **Clear Cache**: Run `php artisan cache:clear` and `php artisan view:clear`
4. **Check Plugin Registration**: Verify the plugin is registered in your panel provider

### Styles Not Applying

1. **Asset Compilation**: Ensure assets are properly compiled with `npm run build`
2. **CSS Order**: Make sure the Glaz theme CSS is loaded after Filament's base CSS
3. **Browser Cache**: Clear your browser cache or use hard refresh (Ctrl+F5)

### Dark Mode Issues

1. **Browser Settings**: Check if your browser/OS is set to dark mode
2. **Filament Configuration**: Ensure Filament's dark mode is properly configured
3. **CSS Variables**: Verify that CSS custom properties are loading correctly

## Browser Support

The Glaz theme supports all modern browsers:

- **Chrome**: 88+
- **Firefox**: 94+
- **Safari**: 14+
- **Edge**: 88+

## Contributing

We welcome contributions to the Filament Glaz Theme! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Setup

1. Clone the repository
2. Install dependencies: `composer install && npm install`
3. Build assets: `npm run build`
4. Run tests: `composer test`

## Security

If you discover any security-related issues, please email the maintainers instead of using the issue tracker.

## Credits

- [Ayman Alareqi](https://github.com/aymanalareqi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---

## 🎨 Appearance Showcase

The Glaz theme provides a beautiful, consistent design across all Filament components with both light and dark mode support.

### Dashboard

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Dashboard Light</th>
      <th scope="col" width="1000px">Dashboard Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/dashboard_light.png" width="100%" alt="Glaz Theme Dashboard Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/dashboard_dark.png" width="100%" alt="Glaz Theme Dashboard Dark Mode">
      </td>
    </tr>
  </tbody>
</table>

### User Menu

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">User Menu Light</th>
      <th scope="col" width="1000px">User Menu Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/user_menu_light.png" width="100%" alt="Glaz Theme User Menu Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/user_menu_dark.png" width="100%" alt="Glaz Theme User Menu Dark Mode">
      </td>
    </tr>
  </tbody>
</table>

### Product Management

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Create Product Light</th>
      <th scope="col" width="1000px">Create Product Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/product_create_light.png" width="100%" alt="Glaz Theme Create Product Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/product_create_dark.png" width="100%" alt="Glaz Theme Create Product Dark Mode">
      </td>
    </tr>
  </tbody>
</table>

### Order Management

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Order List Light</th>
      <th scope="col" width="1000px">Order List Dark</th>
      <th scope="col" width="1000px">Create Order Light</th>
      <th scope="col" width="1000px">Create Order Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/orders_light.png" width="100%" alt="Glaz Theme Order List Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/orders_dark.png" width="100%" alt="Glaz Theme Order List Dark Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/order_create_light.png" width="100%" alt="Glaz Theme Create Order Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/order_create_dark.png" width="100%" alt="Glaz Theme Create Order Dark Mode">
      </td>
    </tr>
  </tbody>
</table>

## 🚀 What's New in v2.x (Filament v4)

- ✅ **Full Filament v4 Compatibility**: Rebuilt from the ground up for Filament v4
- ✅ **Enhanced Performance**: Optimized CSS with reduced bundle size
- ✅ **Improved Accessibility**: Better contrast ratios and keyboard navigation
- ✅ **Modern Design**: Updated visual elements following latest design trends
- ✅ **Better Dark Mode**: Enhanced dark mode with improved color schemes
- ✅ **Component Coverage**: Support for all new Filament v4 components
- ✅ **Responsive Improvements**: Better mobile and tablet experience

## 📋 Changelog

### v2.0.0 (Latest - Filament v4)

- 🎉 **NEW**: Full Filament v4 support
- 🎨 **IMPROVED**: Enhanced Glaz design system
- ⚡ **IMPROVED**: Better performance and smaller CSS bundle
- 🌙 **IMPROVED**: Enhanced dark mode experience
- 📱 **IMPROVED**: Better responsive design
- ♿ **IMPROVED**: Enhanced accessibility features

### v1.x (Filament v3 - Legacy)

- 🎨 Initial Glaz theme implementation
- 🌙 Basic light and dark mode support
- 📱 Responsive design foundation

---

*Made with ❤️ for the Filament community*
