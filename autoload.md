## **Brisko Autoloader**
**PSR-4 compliant**, **standalone autoloader**, designed as an lightweight alternative to Composer autoloading.

### **Features**
✅ **PSR-4 Compatible** - Supports namespace-based autoloading.  
✅ **Singleton Pattern** - Ensures only one instance is created.  
✅ **Secure File Inclusion** - Prevents duplicate loads and enforces best practices.  
✅ **Fluent Interface** - Allows method chaining for cleaner code.  
✅ **Performance Optimized** - Uses a class map to cache file paths and reduce redundant file system operations.  
✅ **Error Logging & Handling** - Logs missing classes and invalid files instead of crashing execution.

## **Installation**
Simply include the `Autoloader.php` file in your project.

```
project/
├── src/
│   ├── Controllers/
│   │   ├── HomeController.php (namespace: App\Controllers)
│   ├── Models/
│   │   ├── User.php (namespace: App\Models)
│   ├── Customize/
│   │   ├── helpers.php (non-class file)
│   ├── inc/
│   │   ├── actions.php (non-class file)
│   │   ├── template-tags.php (non-class file)
├── vendor/  (optional)
├── Autoloader.php
├── index.php
```

---

## **Usage**

### **1️⃣ Register the Autoloader**
At the start of your script (`index.php` or `bootstrap.php`), initialize the autoloader:

```php
require_once 'autoloader.php';

```

---

### **2️⃣ Add Namespaces**
Register namespaces and associate them with their respective directories.

```php
$autoloader = Brisko\Autoloader::init()
    ->addNamespace('App\\', 'src')
    ->addNamespace('Lib\\', 'lib', true); // Higher priority
```

This will automatically load classes based on their namespaces.  
For example, `App\Controllers\HomeController` will be mapped to:

```
/src/Controllers/HomeController.php
```

---

### **3️⃣ Load Additional Non-Class Files**
You can also **manually include files** that are not class-based (e.g., helper functions, configs).

```php
$autoloader->addFiles([
    "src/Customize/helpers.php",
    "src/inc/actions.php",
    "src/inc/template-tags.php",
]);
```

Now, all these files will be included without duplicate loading.

---

## **Example: How Classes Get Loaded**
Suppose you have the following file structure:

```
project/
├── src/
│   ├── Controllers/
│   │   ├── HomeController.php  (namespace: App\Controllers)
```

### **Example Class (`HomeController.php`)**
```php
<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo "Hello from HomeController!";
    }
}
```

Now, you can use it like this in `index.php`:

```php
use App\Controllers\HomeController;

$controller = new HomeController();
$controller->index();
```

✅ **No need to manually require the file!** The autoloader will handle it.

---

## **Security Features**
- **Prevents Cloning & Unserialization** – Ensures only one instance of the autoloader exists.
- **Secure Path Handling** – Uses `realpath()` to prevent directory traversal attacks.
- **Checks `is_readable()` before Loading** – Avoids including unreadable or malicious files.
- **Caches Resolved Paths** – Prevents unnecessary file system operations.

---

## **Error Handling**
- Logs missing **classes** and **files** using `error_log()`, avoiding script crashes.
- Ensures invalid directories cannot be registered as namespace paths.
- If a required file is missing, an error is logged but the application continues.

---

## **Why Use This?**
| Feature | ✅ Status |
|---------|----------|
| **PSR-4 Compliant** | ✅ |
| **Secure & Reliable** | ✅ |
| **Lightweight (No Composer Needed)** | ✅ |
| **Singleton Pattern (Prevents Multiple Instantiations)** | ✅ |
| **Optimized Performance (Class Caching)** | ✅ |
