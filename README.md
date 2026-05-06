🚀 Project Management System - Laravel CRUD
LaravelPHPMySQLLicense

A professional-grade full-stack CRUD application built with Laravel 12, featuring modern UI/UX, advanced data management capabilities, and enterprise-level features.

✨ Features
Core Functionality
✅ Full CRUD Operations - Create, Read, Update, Delete projects
✅ Responsive Design - Mobile-first Bootstrap 5 interface
✅ SweetAlert2 Alerts - Elegant notification system
✅ Image Upload - Support for project images with preview
Advanced Features
🔍 Search & Filter - Real-time search with multiple filter options
📊 Pagination Control - Flexible items per page (5, 10, 25, 50, 100)
🔄 Sorting - Click column headers to sort ascending/descending
📈 Statistics Dashboard - Visual cards showing project counts by status
🗑️ Soft Delete - Recoverable deletion with timestamps
Import/Export
📥 Export Excel - Download data as .xlsx spreadsheet
📥 Export CSV - Download as comma-separated values
📥 Export PDF - Generate formatted PDF reports
📤 Import Data - Bulk import from Excel/CSV files
User Experience
🎨 Clean Modern UI - Professional design with smooth animations
📱 Fully Responsive - Works on desktop, tablet, and mobile
⌨️ Keyboard Shortcuts - Ctrl+/ to focus search
🔔 Auto-dismiss Alerts - Notifications fade after 5 seconds
✅ Form Validation - Server-side validation with error messages
🛠️ Tech Stack
Technology	Version	Purpose
Laravel	12.x	PHP Framework
PHP	8.2+	Backend Language
MySQL	8.0+	Database
Bootstrap	5.3	Frontend Framework
SweetAlert2	11.x	Alert Notifications
Font Awesome	6.5	Icon Library
Maatwebsite Excel	3.1	Excel Import/Export
DomPDF	2.x	PDF Generation
📸 Screenshots
🚀 Quick Start
Prerequisites
PHP >= 8.2
Composer >= 2.0
Node.js >= 18 (for frontend assets)
MySQL >= 8.0
Git (for version control)
Installation
Clone the repository
git clone https://github.com/YOUR_USERNAME/crud-demo.gitcd crud-demo
Install PHP dependencies
bash

composer install
Install JavaScript dependencies
bash

npm install
Environment setup
bash

cp .env.example .env
php artisan key:generate
Configure database
Edit .env file:
env

DB_DATABASE=crud_demo
DB_USERNAME=root
DB_PASSWORD=your_password
Run migrations & seed demo data
bash

php artisan migrate
php artisan db:seed --class=ProjectSeeder
Create storage link
bash

php artisan storage:link
Start development server
bash

php artisan serve
Open browser
text

http://127.0.0.1:8000
📁 Project Structure
text

crud-demo/
├── app/
│   ├── Http/Controllers/
│   │   └── ProjectController.php    # Main CRUD controller
│   ├── Models/
│   │   └── Project.php              # Eloquent model
│   └── Exports/Imports/             # Excel handlers
├── database/
│   ├── migrations/                  # Schema definitions
│   └── seeders/
│       └── ProjectSeeder.php        # Demo data seeder
├── resources/views/
│   ├── layouts/app.blade.php        # Main layout
│   └── projects/                    # Blade templates
├── routes/web.php                   # Route definitions
└── .gitignore                       # Git exclusions
🎯 Usage Guide
Basic Operations
View All Projects: Dashboard shows all records with statistics
Add New: Click "+ Add New" button → Fill form → Save
Edit: Click pencil icon on any row → Modify → Update
View Details: Click eye icon for full project view
Delete: Click trash icon → Confirm with SweetAlert
Search & Filter
Search: Type in search box (searches name & description)
Filter by Status: Select Pending/In Progress/Completed
Filter by Priority: Select Low/Medium/High
Sort: Click column headers (Name, Date, etc.)
Pagination
Use dropdown to show: 5, 10, 25, 50, or 100 items per page

Import/Export
Export: Click Export button → Choose format (Excel/CSV/PDF)
Import: Click Import button → Upload valid file
🌐 API Endpoints
Method
Endpoint
Description
GET	/projects	List all projects (paginated)
GET	/projects/create	Show create form
POST	/projects	Store new project
GET	/projects/{id}	Show single project
GET	/projects/{id}/edit	Show edit form
PUT/PATCH	/projects/{id}	Update project
DELETE	/projects/{id}	Delete project
GET	/projects/export/excel	Export Excel
GET	/projects/export/csv	Export CSV
GET	/projects/export/pdf	Export PDF
POST	/projects/import	Import from file

🤝 Contributing
Fork the repository
Create feature branch (git checkout -b feature/amazing-feature)
Commit changes (git commit -m 'Add amazing feature')
Push to branch (git push origin feature/amazing-feature)
Open a Pull Request
📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

👨‍💻 Author
Akhil Meleppura
GitHub Profile : https://github.com/akhilmeleppura
Email : akhilmeleppura@gmail.com

🙏 Acknowledgments
Laravel Team - Amazing PHP framework
Bootstrap - Frontend framework
SweetAlert2 - Beautiful alerts
Font Awesome - Icon library
