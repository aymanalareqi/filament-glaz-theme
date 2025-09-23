[![Latest Version on Packagist](https://img.shields.io/packagist/v/alareqi/filament-glaz-theme.svg?style=flat-square)](https://packagist.org/packages/alareqi/filament-glaz-theme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alareqi/filament-glaz-theme/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/aymanalareqi/filament-glaz-theme/actions?query=workflow%3Arun-tests+branch%3Amain)
![GitHub Code Style Action Status](https://github.com/aymanalareqi/filament-glaz-theme/actions/workflows/fix-php-code-style-issues.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/alareqi/filament-glaz-theme.svg?style=flat-square)](https://packagist.org/packages/alareqi/filament-glaz-theme)

# Filament Glaz Theme

A stunning **glassmorphism theme** for **Filament v4** admin panels that brings modern, elegant design with beautiful glass-like effects, featuring seamless light and dark modes with arctic-inspired aesthetics.

![Dashboard Light and Dark](https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/dashboard.png)

## 🌟 What is Glassmorphism?

**Glassmorphism** is a modern design trend that creates a frosted glass effect using:

- **Semi-transparent backgrounds** with subtle opacity
- **Backdrop blur effects** that create depth and visual hierarchy
- **Subtle borders** with soft, translucent edges
- **Layered elements** that appear to float above the background
- **Elegant shadows** that enhance the glass-like appearance

This design approach creates interfaces that feel **modern**, **sophisticated**, and **visually appealing** while maintaining excellent **readability** and **usability**. The Glaz theme implements these principles throughout the entire Filament interface, creating a cohesive and beautiful admin experience.

## ✨ Features

- 🪟 **Pure Glassmorphism Design**: Authentic glass-like effects with backdrop blur and transparency
- 🎨 **Arctic-Inspired Aesthetics**: Clean, modern design with subtle gradients and floating elements
- 🌙 **Seamless Light & Dark Modes**: Beautiful glassmorphism effects in both themes
- 📱 **Fully Responsive**: Optimized glassmorphism effects across all screen sizes
- ⚡ **Performance Optimized**: Lightweight CSS with hardware-accelerated effects
- 🎯 **Filament v4 Exclusive**: Built specifically for Filament v4 architecture and components
- 🔧 **Easy Integration**: Simple installation with zero configuration required
- 🎨 **Consistent Glass UI**: Unified glassmorphism across all Filament components
- ♿ **Accessibility First**: WCAG compliant with optimized contrast ratios for glass effects
- 🎭 **Customizable Effects**: Easily adjust transparency, blur, and glass intensity
- 🌈 **Color Harmony**: Seamless integration with Filament's color system
- ✨ **Smooth Animations**: Elegant transitions and hover effects throughout

## Requirements

- **PHP**: 8.2 or higher
- **Laravel**: 11.0 or higher
- **Filament**: 4.0 or higher *(exclusively)*
- **Node.js**: 18.0 or higher (for asset compilation)

## Version Compatibility

| Filament Version | Glaz Theme Version | Support Status |
|:-----------------|:-------------------|:---------------|
| **4.x**          | **2.x (Current)**  | ✅ **Actively Supported** |

> **⚠️ Important**: This theme is designed **exclusively for Filament v4**. It will not work with Filament v3 or earlier versions. The glassmorphism effects and modern CSS features require Filament v4's updated architecture and styling system.

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
        // The theme automatically applies glassmorphism effects
        // No additional configuration required
);
```

### Publishing Theme Assets

For advanced customization, you can publish the theme assets:

```bash
php artisan vendor:publish --tag="filament-glaz-theme-assets"
```

This will publish the CSS files to your `resources/css/vendor/filament-glaz-theme/` directory where you can customize them.

## 🎨 Theme Customization

The Glaz theme provides extensive customization options to tailor the glassmorphism effects to your needs. Here's a comprehensive guide to customizing your theme.

### Overview

The theme can be customized at multiple levels:
- **CSS Variables**: Override default glassmorphism values
- **Component Styles**: Customize individual UI components
- **Color Schemes**: Integrate with your brand colors
- **Glass Effects**: Adjust transparency, blur, and visual effects
- **Custom CSS**: Add your own glassmorphism styles

### Publishing and Modifying Theme Files

First, publish the theme assets to get access to all CSS files:

```bash
php artisan vendor:publish --tag="filament-glaz-theme-assets"
```

This creates the following structure in your project:
```
resources/css/vendor/filament-glaz-theme/
├── theme.css              # Main theme file
├── panel/
│   ├── layout.css         # Background gradients and layout
│   ├── cards.css          # Card glassmorphism effects
│   ├── sidebar.css        # Sidebar glass styling
│   ├── modal.css          # Modal glass effects
│   └── ...
├── actions/
│   └── button.css         # Button glassmorphism
├── form/
│   └── wrapper.css        # Form input glass effects
└── ...
```

### CSS Variable Customization

Override default glassmorphism values by adding custom CSS variables to your main CSS file:

```css
/* resources/css/app.css */
:root {
    /* Glass Background Opacity */
    --glass-bg-opacity: 0.15;          /* Default: 0.15 */
    --glass-bg-hover-opacity: 0.25;    /* Default: 0.2 */

    /* Backdrop Blur Intensity */
    --glass-blur: 12px;                /* Default: varies by component */
    --glass-blur-strong: 20px;         /* For modals and overlays */

    /* Border Opacity */
    --glass-border-opacity: 0.2;       /* Default: 0.2 */
    --glass-border-hover-opacity: 0.3; /* Default: 0.3 */

    /* Shadow Intensity */
    --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    --glass-shadow-hover: 0 16px 64px rgba(0, 0, 0, 0.15);
}

/* Dark mode overrides */
.dark {
    --glass-bg-opacity: 0.1;
    --glass-border-opacity: 0.15;
}
```

### Glassmorphism Effects Customization

#### Adjusting Transparency Levels

Customize the transparency of different components:

```css
/* Lighter glass effect for cards */
.fi-section,
.fi-card {
    background: rgba(255, 255, 255, 0.1) !important; /* More transparent */
}

/* Stronger glass effect for important elements */
.fi-modal-content {
    background: rgba(255, 255, 255, 0.25) !important; /* Less transparent */
}
```

#### Modifying Blur Intensity

Adjust the backdrop blur for different visual effects:

```css
/* Subtle blur for cards */
.fi-card {
    backdrop-filter: blur(8px) !important;
}

/* Strong blur for modals */
.fi-modal {
    backdrop-filter: blur(20px) !important;
}

/* No blur for a cleaner look */
.fi-topbar {
    backdrop-filter: none !important;
    background: rgba(255, 255, 255, 0.95) !important;
}
```

#### Custom Border Effects

Create unique border styles:

```css
/* Gradient borders */
.fi-card {
    border: 1px solid transparent;
    background:
        linear-gradient(rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.15)) padding-box,
        linear-gradient(45deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1)) border-box;
}

/* Colored glass borders */
.fi-btn.fi-color-primary {
    border-color: rgba(59, 130, 246, 0.3) !important;
}
```

### Color Scheme Customization

#### Integrating Brand Colors

Customize the theme to match your brand while maintaining glassmorphism effects:

```php
// In your Panel Provider
use Filament\Support\Colors\Color;

$panel
    ->colors([
        'primary' => Color::hex('#your-brand-color'),
        'secondary' => Color::hex('#your-secondary-color'),
    ])
    ->plugin(FilamentGlazThemePlugin::make());
```

#### Custom Glass Color Schemes

Create themed glass effects with custom colors:

```css
/* Brand-colored glass effects */
.fi-card {
    background: rgba(your-brand-rgb, 0.15) !important;
    border-color: rgba(your-brand-rgb, 0.2) !important;
}

/* Themed button glass effects */
.fi-btn.fi-color-primary {
    background: linear-gradient(135deg,
        rgba(your-brand-rgb, 0.9),
        rgba(your-brand-rgb, 0.7)
    ) !important;
}

/* Dark mode brand colors */
.dark .fi-card {
    background: rgba(your-brand-rgb, 0.1) !important;
}
```

### Component-Specific Customization

#### Customizing Cards and Panels

```css
/* Enhanced card glass effects */
.fi-section,
.fi-card {
    backdrop-filter: blur(16px) saturate(180%);
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow:
        0 8px 32px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

/* Hover animations */
.fi-card:hover {
    transform: translateY(-2px) scale(1.01);
    background: rgba(255, 255, 255, 0.18);
    box-shadow:
        0 16px 64px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}
```

#### Customizing Buttons

```css
/* Custom glassmorphism button styles */
.fi-btn {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Success button with green glass */
.fi-btn.fi-color-success {
    background: linear-gradient(135deg,
        rgba(34, 197, 94, 0.8),
        rgba(22, 163, 74, 0.6)
    );
    border-color: rgba(34, 197, 94, 0.4);
}
```

#### Customizing Forms

```css
/* Glass input fields */
.fi-input-wrp {
    backdrop-filter: blur(8px);
    background: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.fi-input-wrp:focus-within {
    background: rgba(255, 255, 255, 0.15) !important;
    border-color: rgba(59, 130, 246, 0.4);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}
```

### Advanced Customization Examples

#### Creating Custom Glass Components

```css
/* Custom glass notification */
.custom-glass-notification {
    backdrop-filter: blur(20px) saturate(180%);
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    box-shadow:
        0 8px 32px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

/* Animated glass loader */
.glass-loader {
    backdrop-filter: blur(15px);
    background: linear-gradient(45deg,
        rgba(255, 255, 255, 0.1),
        rgba(255, 255, 255, 0.2)
    );
    animation: glass-shimmer 2s infinite;
}

@keyframes glass-shimmer {
    0%, 100% { opacity: 0.8; }
    50% { opacity: 1; }
}
```

#### Responsive Glass Effects

```css
/* Adjust glass effects for mobile */
@media (max-width: 768px) {
    .fi-card {
        backdrop-filter: blur(8px); /* Reduced blur for performance */
        background: rgba(255, 255, 255, 0.2); /* Slightly more opaque */
    }
}

/* Enhanced effects for large screens */
@media (min-width: 1200px) {
    .fi-card {
        backdrop-filter: blur(20px) saturate(200%);
    }
}
```

### Custom CSS Integration

To add your own glassmorphism styles alongside the theme:

1. **Create a custom CSS file**:

```css
/* resources/css/custom-glass.css */
.my-custom-glass {
    backdrop-filter: blur(12px);
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
}
```

2. **Include it in your Vite configuration**:

```js
// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'vendor/alareqi/filament-glaz-theme/resources/css/theme.css',
                'resources/css/custom-glass.css' // Your custom styles
            ],
            refresh: true,
        }),
    ],
});
```

3. **Build your assets**:

```bash
npm run build
```

## 🔧 Multiple Panels Support

The Glaz theme can be applied selectively to different Filament panels, allowing you to use glassmorphism effects only where desired:

### Applying Theme to Specific Panels

```php
// Admin Panel with Glaz Theme
public function adminPanel(Panel $panel): Panel
{
    return $panel
        ->id('admin')
        ->path('admin')
        ->colors([
            'primary' => Color::Blue,
        ])
        ->plugin(FilamentGlazThemePlugin::make()); // Glassmorphism enabled
}

// User Panel with Standard Theme
public function userPanel(Panel $panel): Panel
{
    return $panel
        ->id('user')
        ->path('user')
        ->colors([
            'primary' => Color::Green,
        ]);
        // No Glaz theme plugin = standard Filament theme
}

// App Panel with Different Styling
public function appPanel(Panel $panel): Panel
{
    return $panel
        ->id('app')
        ->path('app')
        ->plugin(FilamentGlazThemePlugin::make()); // Can use same theme
}
```

### Panel-Specific Customization

You can also customize the glassmorphism effects differently for each panel:

```css
/* Admin panel - strong glass effects */
[data-panel-id="admin"] .fi-card {
    backdrop-filter: blur(20px);
    background: rgba(255, 255, 255, 0.2);
}

/* User panel - subtle glass effects */
[data-panel-id="user"] .fi-card {
    backdrop-filter: blur(8px);
    background: rgba(255, 255, 255, 0.1);
}
```

## 🔧 Troubleshooting

### Theme Not Loading

**Problem**: The glassmorphism effects are not visible after installation.

**Solutions**:
1. **Verify Vite Configuration**: Ensure the theme CSS is properly added to `vite.config.js`:
   ```js
   input: [
       'resources/css/app.css',
       'resources/js/app.js',
       'vendor/alareqi/filament-glaz-theme/resources/css/theme.css' // This line
   ]
   ```

2. **Build Assets**: Compile your assets:
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

3. **Clear All Caches**:
   ```bash
   php artisan cache:clear
   php artisan view:clear
   php artisan config:clear
   php artisan route:clear
   ```

4. **Verify Plugin Registration**: Check your panel provider:
   ```php
   ->plugin(FilamentGlazThemePlugin::make()) // Must be present
   ```

### Glassmorphism Effects Not Working

**Problem**: Basic theme loads but glass effects (blur, transparency) are missing.

**Solutions**:
1. **Browser Support**: Ensure your browser supports `backdrop-filter`:
   - Chrome 76+, Firefox 103+, Safari 14+
   - Check: [Can I Use Backdrop Filter](https://caniuse.com/css-backdrop-filter)

2. **Hardware Acceleration**: Enable GPU acceleration in your browser:
   - Chrome: `chrome://settings/` → Advanced → System → "Use hardware acceleration"
   - Firefox: `about:config` → `layers.acceleration.force-enabled` → `true`

3. **CSS Override Check**: Verify no other CSS is overriding glassmorphism:
   ```css
   /* Check if this fixes it temporarily */
   .fi-card {
       backdrop-filter: blur(12px) !important;
       background: rgba(255, 255, 255, 0.15) !important;
   }
   ```

### Performance Issues

**Problem**: Glassmorphism effects cause lag or poor performance.

**Solutions**:
1. **Reduce Blur Intensity**: Lower backdrop-filter values:
   ```css
   .fi-card {
       backdrop-filter: blur(6px); /* Instead of blur(12px) */
   }
   ```

2. **Disable Effects on Mobile**:
   ```css
   @media (max-width: 768px) {
       .fi-card {
           backdrop-filter: none;
           background: rgba(255, 255, 255, 0.95);
       }
   }
   ```

3. **Use `will-change` for Animated Elements**:
   ```css
   .fi-card {
       will-change: transform, backdrop-filter;
   }
   ```

### Dark Mode Issues

**Problem**: Glassmorphism effects look wrong in dark mode.

**Solutions**:
1. **Check Filament Dark Mode**: Ensure dark mode is properly configured:
   ```php
   $panel->darkMode() // Enable dark mode support
   ```

2. **Verify Dark Mode CSS**: Check if dark mode styles are loading:
   ```css
   .dark .fi-card {
       background: rgba(255, 255, 255, 0.1); /* Light glass on dark */
   }
   ```

3. **Browser/OS Dark Mode**: Test with different dark mode settings:
   - System dark mode
   - Browser dark mode
   - Filament's dark mode toggle

### Custom CSS Conflicts

**Problem**: Custom styles interfere with glassmorphism effects.

**Solutions**:
1. **CSS Specificity**: Use more specific selectors:
   ```css
   /* Instead of */
   .fi-card { background: red; }

   /* Use */
   .fi-panel .fi-card { background: rgba(255, 255, 255, 0.15); }
   ```

2. **Load Order**: Ensure theme CSS loads after custom CSS:
   ```js
   input: [
       'resources/css/app.css',           // Your styles first
       'resources/css/custom.css',        // Custom styles
       'vendor/alareqi/filament-glaz-theme/resources/css/theme.css' // Theme last
   ]
   ```

3. **Use CSS Layers** (modern approach):
   ```css
   @layer base, theme, custom;

   @layer theme {
       .fi-card { /* theme styles */ }
   }

   @layer custom {
       .fi-card { /* your overrides */ }
   }
   ```

### Asset Compilation Issues

**Problem**: Changes to theme files don't appear after modification.

**Solutions**:
1. **Force Rebuild**:
   ```bash
   rm -rf node_modules/.vite
   npm run build
   ```

2. **Development Mode**: Use dev mode for real-time changes:
   ```bash
   npm run dev
   ```

3. **Check File Paths**: Verify published files exist:
   ```bash
   ls -la resources/css/vendor/filament-glaz-theme/
   ```

### Getting Help

If you're still experiencing issues:

1. **Check Browser Console**: Look for CSS or JavaScript errors
2. **Inspect Elements**: Use browser dev tools to check if styles are applied
3. **Test in Incognito**: Rule out browser extensions or cached styles
4. **Create Minimal Example**: Test with a fresh Filament installation
5. **Report Issues**: [GitHub Issues](https://github.com/aymanalareqi/filament-glaz-theme/issues) with:
   - Browser version
   - PHP/Laravel/Filament versions
   - Steps to reproduce
   - Screenshots if applicable

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
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/dashboard_light.png" width="100%" alt="Glaz Theme Dashboard Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/dashboard_dark.png" width="100%" alt="Glaz Theme Dashboard Dark Mode">
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
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/user_menu_light.png" width="100%" alt="Glaz Theme User Menu Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/user_menu_dark.png" width="100%" alt="Glaz Theme User Menu Dark Mode">
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
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/product_create_light.png" width="100%" alt="Glaz Theme Create Product Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/product_create_dark.png" width="100%" alt="Glaz Theme Create Product Dark Mode">
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
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/orders_light.png" width="100%" alt="Glaz Theme Order List Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/orders_dark.png" width="100%" alt="Glaz Theme Order List Dark Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/order_create_light.png" width="100%" alt="Glaz Theme Create Order Light Mode">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/aymanalareqi/filament-glaz-theme/main/docs/order_create_dark.png" width="100%" alt="Glaz Theme Create Order Dark Mode">
      </td>
    </tr>
  </tbody>
</table>

## 🚀 What's New in v2.x (Filament v4 Exclusive)

- ✅ **Pure Glassmorphism Implementation**: Authentic glass effects with backdrop-filter and transparency
- ✅ **Filament v4 Native**: Built exclusively for Filament v4's modern architecture
- ✅ **Enhanced Performance**: Hardware-accelerated CSS with optimized glassmorphism effects
- ✅ **Advanced Customization**: Comprehensive theme customization options and CSS variables
- ✅ **Improved Accessibility**: WCAG-compliant glassmorphism with proper contrast ratios
- ✅ **Modern CSS Features**: Utilizes latest CSS capabilities for stunning visual effects
- ✅ **Better Dark Mode**: Enhanced glassmorphism effects optimized for both light and dark themes
- ✅ **Component Coverage**: Glassmorphism effects across all Filament v4 components
- ✅ **Responsive Glass Effects**: Optimized glassmorphism for all screen sizes and devices
- ✅ **Arctic Design Language**: Cohesive design system with subtle gradients and floating elements

## 📋 Changelog

### v2.0.0 (Current - Filament v4 Exclusive)

- 🎉 **NEW**: Complete glassmorphism theme implementation
- 🎉 **NEW**: Exclusive Filament v4 support with modern CSS features
- 🎨 **NEW**: Comprehensive customization system with CSS variables
- 🎨 **NEW**: Arctic-inspired design language with gradient backgrounds
- ⚡ **NEW**: Hardware-accelerated glassmorphism effects
- 🌙 **NEW**: Enhanced dark mode with optimized glass effects
- 📱 **NEW**: Responsive glassmorphism that adapts to all devices
- ♿ **NEW**: Accessibility-first approach with WCAG compliance
- 🔧 **NEW**: Advanced troubleshooting guide and customization documentation
- ✨ **NEW**: Smooth animations and hover effects throughout the interface

> **Note**: This version is designed exclusively for Filament v4 and will not work with earlier versions. The glassmorphism effects require modern CSS features and Filament v4's updated architecture.

---

*Made with ❤️ for the Filament community*
