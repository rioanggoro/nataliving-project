✅ Struktur Folder Laravel (Best Practice)
pgsql
Copy
Edit

app/
├── Http/
│ ├── Controllers/
│ │ ├── Admin/ <-- Untuk controller Admin
│ │ │ ├── ProductController.php
│ │ │ ├── CategoryController.php
│ │ ├── User/ <-- Untuk controller frontend user
│ │ │ ├── HomeController.php
│ │ │ ├── ProductController.php
│ │ ├── Controller.php
│
├── Models/
│ ├── Product.php
│ ├── Category.php
│ ├── ProductImage.php
│ ├── User.php

📁 Views
Letakkan blade view sesuai peran:

resources/views/
├── admin/
│ ├── dashboard.blade.php
│ ├── products/
│ ├── categories/
├── user/
│ ├── home.blade.php
│ ├── products/
│ └── show.blade.php
│
├── layouts/
│ ├── admin.blade.php
│ ├── user.blade.php

PUBLIC ASSET
public/
├── assets/
│ ├── admin/ <-- khusus CSS/JS admin
│ ├── user/ <-- khusus CSS/JS frontend
