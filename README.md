#  Service Booking Management System

A modern **CodeIgniter 4** web application designed to simplify and automate the process of managing service bookings between customers and staff.  
Built with flexibility, scalability, and performance in mind — this system is ideal for salons, repair shops, clinics, or any business offering scheduled services.

---

##  Features

### 👥 User Roles
- **Customer:**  
  - Register, log in, and manage their profile.  
  - Browse available services.  
  - Make new bookings and view booking history.  
- **Staff:**  
  - View assigned bookings.  
  - Approve, reject, or mark bookings as completed.  
  - Manage availability and assigned services.  

---

##  Tech Stack

| Layer | Technology |
|-------|-------------|
| Framework | [CodeIgniter 4](https://codeigniter.com/user_guide/) |
| Frontend | HTML5, CSS3, JavaScript (and Bootstrap if used) |
| Database | MySQL or MariaDB |
| Version Control | Git & GitHub |
| Deployment | Apache / Nginx with PHP 8+ |

---

##  1. Installation & Setup

###  Clone the repository
```bash

git clone https://github.com/yourusername/Service-Booking-Management-System.git
cd Service-Booking-Management-System

2. Install dependencies
composer install

3. Environment setup
   cp env .env

Then configure your environment variables:

app.baseURL = 'http://localhost:8080/'
database.default.hostname = localhost
database.default.database = service_booking_db
database.default.username = root
database.default.password = ''
database.default.DBDriver = MySQLi

4. Start the development server
  php spark serve
