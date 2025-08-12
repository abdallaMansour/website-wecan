# File Index - We Can Healthcare System

## 📋 Complete File Listing

### 🏠 Root Directory Files

#### Landing & Entry Points
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `index.php` | Arabic (RTL) | Main landing page | assets/css/, assets/js/, assets/img/ |
| `index-en.php` | English (LTR) | English landing page | assets-en/css/, assets-en/js/, assets-en/img/ |

#### Authentication
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `login.php` | Arabic (RTL) | User login interface | assets/css/, assets/js/ |
| `login-en.php` | English (LTR) | English login interface | assets-en/css/, assets-en/js/ |

#### Main Application Pages
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `home.php` | Arabic (RTL) | Main dashboard | assets/css/, assets/js/, components/sidebar.php |
| `home-en.php` | English (LTR) | English dashboard | assets-en/css/, assets-en/js/, components/sidebar.php |

#### Patient Management
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `patient-details.php` | Arabic (RTL) | Individual patient view | assets/css/, assets/js/, tab-components/ |
| `patient-details-en.php` | English (LTR) | English patient view | assets-en/css/, assets-en/js/, tab-components/ |
| `attached-patients.php` | Arabic (RTL) | Patient list management | assets/css/, assets/js/ |
| `attached-patients-en.php` | English (LTR) | English patient list | assets-en/css/, assets-en/js/ |

#### Hospital & Profile
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `hospital.php` | Arabic (RTL) | Hospital management | assets/css/, assets/js/ |
| `hospital-en.php` | English (LTR) | English hospital mgmt | assets-en/css/, assets-en/js/ |
| `profile.php` | Arabic (RTL) | User profile management | assets/css/, assets/js/ |
| `profile-en.php` | English (LTR) | English profile mgmt | assets-en/css/, assets-en/js/ |

#### Status & Communication
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `pending.php` | Arabic (RTL) | Pending items queue | assets/css/, assets/js/ |
| `pending-en.php` | English (LTR) | English pending queue | assets-en/css/, assets-en/js/ |
| `chat.php` | Arabic (RTL) | Real-time chat interface | assets/css/, assets/js/ |
| `chat-en.php` | English (LTR) | English chat interface | assets-en/css/, assets-en/js/ |

### 📁 Components Directory

#### Shared Components
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `components/sidebar.php` | Bilingual | Navigation sidebar | assets/css/ |

### 📁 Tab Components Directory

#### Medical Management Modules
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `tab-components/appointments.php` | Arabic (RTL) | Appointment scheduling | assets/css/, assets/js/ |
| `tab-components/appointments-en.php` | English (LTR) | English appointments | assets-en/css/, assets-en/js/ |
| `tab-components/medications.php` | Arabic (RTL) | Medication tracking | assets/css/, assets/js/ |
| `tab-components/medications-en.php` | English (LTR) | English medications | assets-en/css/, assets-en/js/ |
| `tab-components/chemotherapy.php` | Arabic (RTL) | Chemo treatment mgmt | assets/css/, assets/js/ |
| `tab-components/chemotherapy-en.php` | English (LTR) | English chemo mgmt | assets-en/css/, assets-en/js/ |

#### Health Monitoring Modules
| File | Language | Purpose | Dependencies |
|------|----------|---------|--------------|
| `tab-components/health-report.php` | Arabic (RTL) | Health reports | assets/css/, assets/js/ |
| `tab-components/health-report-en.php` | English (LTR) | English health reports | assets-en/css/, assets-en/js/ |
| `tab-components/food.php` | Arabic (RTL) | Nutrition management | assets/css/, assets/js/ |
| `tab-components/food-en.php` | English (LTR) | English nutrition | assets-en/css/, assets-en/js/ |
| `tab-components/notes.php` | Arabic (RTL) | Medical notes | assets/css/, assets/js/ |
| `tab-components/notes-en.php` | English (LTR) | English medical notes | assets-en/css/, assets-en/js/ |

### 📁 Assets Directory (Arabic/RTL)

#### CSS Files
| File | Purpose | Dependencies |
|------|---------|--------------|
| `assets/css/bootstrap.rtl.min.css` | Bootstrap RTL framework | - |
| `assets/css/style.css` | Main custom styles | bootstrap.rtl.min.css |
| `assets/css/style.css.map` | Source map for style.css | style.css |
| `assets/css/style.scss` | SCSS source file | - |
| `assets/css/responsive.css` | Responsive design rules | style.css |
| `assets/css/responsive.css.map` | Source map for responsive.css | responsive.css |
| `assets/css/responsive.scss` | SCSS source for responsive | - |
| `assets/css/dark.css` | Dark theme styles | style.css |
| `assets/css/dark.css.map` | Source map for dark.css | dark.css |
| `assets/css/dark.scss` | SCSS source for dark theme | - |
| `assets/css/rtl.css` | RTL-specific styles | style.css |
| `assets/css/rtl.css.map` | Source map for rtl.css | rtl.css |
| `assets/css/rtl.scss` | SCSS source for RTL | - |
| `assets/css/animate.min.css` | Animation library | - |
| `assets/css/owl.carousel.min.css` | Owl Carousel styles | - |
| `assets/css/owl.theme.default.min.css` | Owl Carousel theme | owl.carousel.min.css |
| `assets/css/slick.css` | Slick slider styles | - |
| `assets/css/slick-theme.css` | Slick slider theme | slick.css |
| `assets/css/magnific-popup.css` | Lightbox popup styles | - |
| `assets/css/icofont.min.css` | Icon font styles | - |

#### JavaScript Files
| File | Purpose | Dependencies |
|------|---------|--------------|
| `assets/js/jquery.min.js` | jQuery library | - |
| `assets/js/bootstrap.bundle.min.js` | Bootstrap JavaScript | jquery.min.js |
| `assets/js/custom.js` | Custom functionality | jquery.min.js, bootstrap.bundle.min.js |
| `assets/js/owl.carousel.min.js` | Owl Carousel plugin | jquery.min.js |
| `assets/js/slick.min.js` | Slick slider plugin | jquery.min.js |
| `assets/js/wow.min.js` | Scroll animations | jquery.min.js |
| `assets/js/jquery.magnific-popup.min.js` | Lightbox popup | jquery.min.js |
| `assets/js/jquery.mixitup.min.js` | Filter/mixitup plugin | jquery.min.js |
| `assets/js/form-validator.min.js` | Form validation | jquery.min.js |
| `assets/js/jquery.ajaxchimp.min.js` | AJAX form handling | jquery.min.js |
| `assets/js/contact-form-script.js` | Contact form processing | jquery.min.js |

#### Font Files
| File | Purpose | Type |
|------|---------|------|
| `assets/fonts/flaticon.css` | Flaticon icon font styles | CSS |
| `assets/fonts/flaticon.php` | Flaticon PHP helper | PHP |
| `assets/fonts/Flaticon.eot` | Flaticon EOT format | Font |
| `assets/fonts/Flaticon.woff` | Flaticon WOFF format | Font |
| `assets/fonts/Flaticon.woff2` | Flaticon WOFF2 format | Font |
| `assets/fonts/icofont.min.css` | Icofont icon styles | CSS |
| `assets/fonts/icofont.eot` | Icofont EOT format | Font |
| `assets/fonts/icofont.svg` | Icofont SVG format | Font |
| `assets/fonts/icofont.ttf` | Icofont TTF format | Font |
| `assets/fonts/icofont.woff` | Icofont WOFF format | Font |
| `assets/fonts/icofont.woff2` | Icofont WOFF2 format | Font |

#### PHP Files
| File | Purpose | Dependencies |
|------|---------|--------------|
| `assets/php/form-process.php` | Form processing backend | PHP, MySQL |

### 📁 Assets-En Directory (English/LTR)

#### CSS Files
| File | Purpose | Dependencies |
|------|---------|--------------|
| `assets-en/css/bootstrap.min.css` | Bootstrap LTR framework | - |
| `assets-en/css/style.css` | Main custom styles | bootstrap.min.css |
| `assets-en/css/style.css.map` | Source map for style.css | style.css |
| `assets-en/css/style.scss` | SCSS source file | - |
| `assets-en/css/responsive.css` | Responsive design rules | style.css |
| `assets-en/css/responsive.css.map` | Source map for responsive.css | responsive.css |
| `assets-en/css/responsive.scss` | SCSS source for responsive | - |
| `assets-en/css/dark.css` | Dark theme styles | style.css |
| `assets-en/css/dark.css.map` | Source map for dark.css | dark.css |
| `assets-en/css/dark.scss` | SCSS source for dark theme | - |
| `assets-en/css/animate.min.css` | Animation library | - |
| `assets-en/css/owl.carousel.min.css` | Owl Carousel styles | - |
| `assets-en/css/owl.theme.default.min.css` | Owl Carousel theme | owl.carousel.min.css |
| `assets-en/css/slick.css` | Slick slider styles | - |
| `assets-en/css/slick-theme.css` | Slick slider theme | slick.css |
| `assets-en/css/magnific-popup.css` | Lightbox popup styles | - |
| `assets-en/css/icofont.min.css` | Icon font styles | - |

#### JavaScript Files
| File | Purpose | Dependencies |
|------|---------|--------------|
| `assets-en/js/jquery.min.js` | jQuery library | - |
| `assets-en/js/bootstrap.bundle.min.js` | Bootstrap JavaScript | jquery.min.js |
| `assets-en/js/custom.js` | Custom functionality | jquery.min.js, bootstrap.bundle.min.js |
| `assets-en/js/owl.carousel.min.js` | Owl Carousel plugin | jquery.min.js |
| `assets-en/js/slick.min.js` | Slick slider plugin | jquery.min.js |
| `assets-en/js/wow.min.js` | Scroll animations | jquery.min.js |
| `assets-en/js/jquery.magnific-popup.min.js` | Lightbox popup | jquery.min.js |
| `assets-en/js/jquery.mixitup.min.js` | Filter/mixitup plugin | jquery.min.js |
| `assets-en/js/form-validator.min.js` | Form validation | jquery.min.js |
| `assets-en/js/jquery.ajaxchimp.min.js` | AJAX form handling | jquery.min.js |
| `assets-en/js/contact-form-script.js` | Contact form processing | jquery.min.js |

#### Font Files
| File | Purpose | Type |
|------|---------|------|
| `assets-en/fonts/flaticon.css` | Flaticon icon font styles | CSS |
| `assets-en/fonts/flaticon.php` | Flaticon PHP helper | PHP |
| `assets-en/fonts/Flaticon.eot` | Flaticon EOT format | Font |
| `assets-en/fonts/Flaticon.woff` | Flaticon WOFF format | Font |
| `assets-en/fonts/Flaticon.woff2` | Flaticon WOFF2 format | Font |
| `assets-en/fonts/icofont.min.css` | Icofont icon styles | CSS |
| `assets-en/fonts/icofont.eot` | Icofont EOT format | Font |
| `assets-en/fonts/icofont.svg` | Icofont SVG format | Font |
| `assets-en/fonts/icofont.ttf` | Icofont TTF format | Font |
| `assets-en/fonts/icofont.woff` | Icofont WOFF format | Font |
| `assets-en/fonts/icofont.woff2` | Icofont WOFF2 format | Font |

#### PHP Files
| File | Purpose | Dependencies |
|------|---------|--------------|
| `assets-en/php/form-process.php` | Form processing backend | PHP, MySQL |

### 🖼️ Image Assets

#### Arabic Assets (`assets/img/`)
- **App Landing**: Mobile app screenshots and banners
- **Creative Agency**: Marketing and presentation images
- **Personal Portfolio**: Profile and showcase images
- **Shapes**: Decorative UI elements and patterns
- **Favicon**: Site icon
- **Logos**: Brand logos (logo.png, logo-two.png)
- **Theme Icons**: Dark/light mode toggles (night.png, sunny.png)

#### English Assets (`assets-en/img/`)
- **App Landing**: English app screenshots
- **Creative Agency**: English marketing materials
- **Personal Portfolio**: English profile images
- **Sass Landing**: Additional landing page assets
- **Shapes**: Decorative elements
- **Favicon**: Site icon
- **Logos**: Brand logos
- **Theme Icons**: Dark/light mode toggles

## 🔗 File Relationships

### Language Pairs
- `index.php` ↔ `index-en.php`
- `home.php` ↔ `home-en.php`
- `login.php` ↔ `login-en.php`
- `patient-details.php` ↔ `patient-details-en.php`
- `attached-patients.php` ↔ `attached-patients-en.php`
- `hospital.php` ↔ `hospital-en.php`
- `profile.php` ↔ `profile-en.php`
- `pending.php` ↔ `pending-en.php`
- `chat.php` ↔ `chat-en.php`

### Tab Component Pairs
- `tab-components/appointments.php` ↔ `tab-components/appointments-en.php`
- `tab-components/medications.php` ↔ `tab-components/medications-en.php`
- `tab-components/chemotherapy.php` ↔ `tab-components/chemotherapy-en.php`
- `tab-components/health-report.php` ↔ `tab-components/health-report-en.php`
- `tab-components/food.php` ↔ `tab-components/food-en.php`
- `tab-components/notes.php` ↔ `tab-components/notes-en.php`

### Asset Dependencies
- **Arabic Pages**: Use `assets/` directory
- **English Pages**: Use `assets-en/` directory
- **Shared Components**: May reference both asset directories

## 📊 File Statistics

- **Total PHP Files**: 24
- **Total CSS Files**: 38 (including maps and SCSS)
- **Total JavaScript Files**: 22
- **Total Font Files**: 22
- **Total Image Files**: 200+ (estimated)
- **Total Directories**: 8 main directories

## 🎯 Development Notes

1. **Bilingual Structure**: Each feature has Arabic and English versions
2. **Asset Separation**: Arabic and English assets are completely separate
3. **Component Reuse**: Tab components are modular and reusable
4. **Responsive Design**: All pages support mobile, tablet, and desktop
5. **RTL Support**: Arabic version includes full RTL layout support
