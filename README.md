
[![Latest Version on Packagist](https://img.shields.io/packagist/v/alareqi/filament-glaz-theme.svg?style=flat-square)](https://packagist.org/packages/alareqi/filament-glaz-theme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alareqi/filament-glaz-theme/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/alareqi/filament-glaz-theme/actions?query=workflow%3Arun-tests+branch%3Amain)
![GitHub Code Style Action Status](https://github.com/alareqi/filament-glaz-theme/actions/workflows/fix-php-code-style-issues.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/alareqi/filament-glaz-theme.svg?style=flat-square)](https://packagist.org/packages/alareqi/filament-glaz-theme)

# Filament Glaz Theme

A light and dark arctic Glaz theme for Filament PHP.

![Dashboard Light and Dark](https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/dashboard.jpg)

## Version Compatibility

 Filament | Filament Glaz Theme
:---------|:-------------------
 3.x      | 1.x
 4.x      | 2.x

## Installation

```bash
composer require alareqi/filament-glaz-theme
```

Add a new item to the `input` array of your `vite.config.js` file:

```js
'vendor/alareqi/filament-glaz-theme/resources/css/theme.css'
```

Run:

```bash
npm run build
```

Register the plugin on your panel (e.g. `/app/Providers/Filament/AdminPanelProvider.php`):

```php
use Alareqi\FilamentGlazTheme\FilamentGlazThemePlugin;

$panel
  ->plugin(FilamentGlazThemePlugin::make())
```

You're all set!

## Appearance

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
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/dashboard_light.png" width="100%" alt="Dashboard Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/dashboard_dark.png" width="100%" alt="Dashboard Dark">
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
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/user_menu_light.png" width="100%" alt="User Menu Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/user_menu_dark.png" width="100%" alt="User Menu Dark">
      </td>
    </tr>
  </tbody>
</table>

### Product

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
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/product_create_light.png" width="100%" alt="Create Product Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/product_create_dark.png" width="100%" alt="Create Product Dark">
      </td>
    </tr>
  </tbody>
</table>

### Order

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
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/orders_light.png" width="100%" alt="Order List Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/orders_dark.png" width="100%" alt="Order List Dark">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/order_create_light.png" width="100%" alt="Create Order Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/alareqi/filament-glaz-theme/main/docs/order_create_dark.png" width="100%" alt="Create Order Dark">
      </td>
    </tr>
  </tbody>
</table>
