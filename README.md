# We Can (نستطيع) - Healthcare Management System

A bilingual (Arabic/English) healthcare application for patient management and medical care coordination.

## 🌐 Project Overview

**We Can** is a comprehensive healthcare management system designed to facilitate patient care coordination, medical appointments, medication management, and health monitoring. The application supports both Arabic (RTL) and English (LTR) interfaces.

## 📁 Project Structure

### Core Application Files

#### Main Pages
- **`index.php`** - Arabic landing page (RTL)
- **`index-en.php`** - English landing page (LTR)
- **`home.php`** - Arabic dashboard/home page
- **`home-en.php`** - English dashboard/home page
- **`login.php`** - Arabic login page
- **`login-en.php`** - English login page

#### Patient Management
- **`patient-details.php`** - Arabic patient details view
- **`patient-details-en.php`** - English patient details view
- **`attached-patients.php`** - Arabic attached patients list
- **`attached-patients-en.php`** - English attached patients list

#### Hospital & Profile Management
- **`hospital.php`** - Arabic hospital management
- **`hospital-en.php`** - English hospital management
- **`profile.php`** - Arabic user profile
- **`profile-en.php`** - English user profile

#### Status & Communication
- **`pending.php`** - Arabic pending items
- **`pending-en.php`** - English pending items
- **`chat.php`** - Arabic chat interface
- **`chat-en.php`** - English chat interface

### Tab Components (Patient Care Modules)

#### Medical Management
- **`tab-components/appointments.php`** - Arabic appointment management
- **`tab-components/appointments-en.php`** - English appointment management
- **`tab-components/medications.php`** - Arabic medication tracking
- **`tab-components/medications-en.php`** - English medication tracking
- **`tab-components/chemotherapy.php`** - Arabic chemotherapy management
- **`tab-components/chemotherapy-en.php`** - English chemotherapy management

#### Health Monitoring
- **`tab-components/health-report.php`** - Arabic health reports
- **`tab-components/health-report-en.php`** - English health reports
- **`tab-components/food.php`** - Arabic nutrition management
- **`tab-components/food-en.php`** - English nutrition management
- **`tab-components/notes.php`** - Arabic medical notes
- **`tab-components/notes-en.php`** - English medical notes

### Shared Components
- **`components/sidebar.php`** - Navigation sidebar component

### Asset Directories

#### Arabic Assets (`assets/`)
- **CSS**: Bootstrap RTL, custom styles, responsive design
- **JavaScript**: jQuery, Bootstrap, custom functionality
- **Images**: Icons, logos, UI elements, testimonial images
- **Fonts**: Custom icon fonts (Flaticon, Icofont)
- **PHP**: Form processing scripts

#### English Assets (`assets-en/`)
- **CSS**: Bootstrap LTR, custom styles, responsive design
- **JavaScript**: Same functionality as Arabic version
- **Images**: English-specific UI elements and content
- **Fonts**: Same icon fonts as Arabic version
- **PHP**: Form processing scripts

## 🚀 Features

### Core Functionality
- **Bilingual Support**: Full Arabic (RTL) and English (LTR) interfaces
- **Patient Management**: Comprehensive patient records and details
- **Appointment Scheduling**: Medical appointment coordination
- **Medication Tracking**: Prescription and medication management
- **Health Monitoring**: Health reports and vital signs tracking
- **Nutrition Management**: Food and diet planning
- **Chemotherapy Management**: Specialized cancer treatment tracking
- **Medical Notes**: Clinical documentation and notes
- **Real-time Chat**: Communication between healthcare providers
- **Hospital Management**: Multi-hospital support

### Technical Features
- **Responsive Design**: Mobile-first approach
- **Modern UI/UX**: Clean, professional healthcare interface
- **Form Validation**: Client and server-side validation
- **AJAX Integration**: Dynamic content loading
- **Security**: Login authentication and session management

## 🛠 Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP
- **Database**: MySQL (implied by form processing)
- **Icons**: Flaticon, Icofont
- **Carousel**: Owl Carousel, Slick Slider
- **Animations**: Animate.css, WOW.js
- **Popups**: Magnific Popup

## 📱 User Interface

### Design System
- **Primary Color**: #ec1d26 (Healthcare Red)
- **Typography**: Clean, readable fonts
- **Layout**: Responsive grid system
- **Navigation**: Intuitive sidebar and top navigation
- **Cards**: Modern card-based content presentation

### Accessibility
- **RTL Support**: Full right-to-left layout for Arabic
- **Responsive**: Mobile, tablet, and desktop optimized
- **Loading States**: Pre-loader for better UX
- **Dark Mode**: Optional dark theme support

## 🔧 Installation & Setup

1. **Server Requirements**
   - PHP 7.4 or higher
   - MySQL 5.7 or higher
   - Web server (Apache/Nginx)

2. **Installation Steps**
   ```bash
   # Clone the repository
   git clone [repository-url]
   cd website-wecan
   
   # Configure database connection
   # Edit form-process.php files with your database credentials
   
   # Set up web server
   # Point document root to project directory
   ```

3. **Configuration**
   - Update database credentials in `assets/php/form-process.php`
   - Update database credentials in `assets-en/php/form-process.php`
   - Configure web server for proper URL routing

## 📊 Database Schema

The application likely uses the following main tables:
- `users` - User accounts and authentication
- `patients` - Patient information and records
- `appointments` - Medical appointment scheduling
- `medications` - Prescription and medication data
- `health_reports` - Patient health monitoring data
- `hospitals` - Hospital information and management
- `notes` - Medical notes and documentation

## 🔒 Security Considerations

- **Authentication**: Secure login system
- **Session Management**: Proper session handling
- **Input Validation**: Form data sanitization
- **SQL Injection Prevention**: Prepared statements
- **XSS Protection**: Output encoding

## 🌍 Localization

### Arabic (RTL) Features
- Right-to-left text direction
- Arabic typography and fonts
- Culturally appropriate UI elements
- Arabic content and messaging

### English (LTR) Features
- Left-to-right text direction
- English typography
- International UI standards
- English content and messaging

## 📈 Performance Optimization

- **Minified Assets**: Compressed CSS and JavaScript
- **Image Optimization**: Optimized images for web
- **Caching**: Browser caching strategies
- **CDN Ready**: Assets structured for CDN deployment

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

[Add your license information here]

## 📞 Support

For technical support or questions:
- Email: [support-email]
- Documentation: [docs-url]
- Issues: [github-issues-url]

---

**We Can (نستطيع)** - Empowering healthcare through technology
