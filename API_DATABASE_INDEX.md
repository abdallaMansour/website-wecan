# API & Database Index - We Can Healthcare System

## 🗄️ Database Schema Documentation

This index documents the database structure, API endpoints, and backend functionality of the We Can healthcare system.

---

## 📊 Database Tables

### Core User Management
| Table | Purpose | Key Fields | Related Files |
|-------|---------|------------|---------------|
| **users** | User accounts and authentication | id, username, email, password, role, language | `login.php`, `profile.php` |
| **user_profiles** | Extended user information | user_id, first_name, last_name, phone, hospital_id | `profile.php`, `hospital.php` |
| **user_sessions** | Active user sessions | session_id, user_id, created_at, expires_at | `login.php` |

### Patient Management
| Table | Purpose | Key Fields | Related Files |
|-------|---------|------------|---------------|
| **patients** | Patient basic information | id, patient_id, first_name, last_name, date_of_birth, gender | `patient-details.php`, `attached-patients.php` |
| **patient_details** | Extended patient information | patient_id, blood_type, allergies, emergency_contact | `patient-details.php` |
| **patient_attachments** | Patient-doctor relationships | id, doctor_id, patient_id, relationship_type, created_at | `attached-patients.php` |

### Medical Records
| Table | Purpose | Key Fields | Related Files |
|-------|---------|------------|---------------|
| **appointments** | Medical appointment scheduling | id, patient_id, doctor_id, appointment_date, status, notes | `tab-components/appointments.php` |
| **medications** | Prescription and medication tracking | id, patient_id, medication_name, dosage, frequency, start_date, end_date | `tab-components/medications.php` |
| **chemotherapy_sessions** | Cancer treatment sessions | id, patient_id, session_date, treatment_type, dosage, side_effects | `tab-components/chemotherapy.php` |
| **health_reports** | Patient health monitoring | id, patient_id, report_date, vital_signs, blood_work, notes | `tab-components/health-report.php` |
| **medical_notes** | Clinical documentation | id, patient_id, doctor_id, note_date, note_type, content | `tab-components/notes.php` |
| **nutrition_plans** | Diet and nutrition management | id, patient_id, plan_date, meal_type, food_items, restrictions | `tab-components/food.php` |

### Hospital Management
| Table | Purpose | Key Fields | Related Files |
|-------|---------|------------|---------------|
| **hospitals** | Hospital information | id, name, address, phone, email, website | `hospital.php` |
| **hospital_staff** | Hospital personnel | id, hospital_id, user_id, position, department | `hospital.php` |
| **hospital_departments** | Hospital departments | id, hospital_id, name, description | `hospital.php` |

### Communication & Notifications
| Table | Purpose | Key Fields | Related Files |
|-------|---------|------------|---------------|
| **chat_messages** | Real-time chat messages | id, sender_id, receiver_id, message, timestamp, read_status | `chat.php` |
| **notifications** | System notifications | id, user_id, type, title, message, created_at, read_at | `pending.php` |
| **pending_tasks** | Task queue management | id, user_id, task_type, description, priority, due_date | `pending.php` |

---

## 🔌 API Endpoints

### Authentication API
| Endpoint | Method | Purpose | Parameters | Response |
|----------|--------|---------|------------|----------|
| `/login` | POST | User authentication | username, password | user_data, session_token |
| `/logout` | POST | User logout | session_token | success_message |
| `/register` | POST | User registration | user_data | user_id, success_message |
| `/reset-password` | POST | Password reset | email | reset_token |

### Patient Management API
| Endpoint | Method | Purpose | Parameters | Response |
|----------|--------|---------|------------|----------|
| `/patients` | GET | List patients | doctor_id, filters | patient_list |
| `/patients/{id}` | GET | Get patient details | patient_id | patient_data |
| `/patients` | POST | Create patient | patient_data | patient_id |
| `/patients/{id}` | PUT | Update patient | patient_id, patient_data | success_message |
| `/patients/{id}` | DELETE | Delete patient | patient_id | success_message |
| `/patients/attach` | POST | Attach patient to doctor | doctor_id, patient_id | success_message |

### Medical Records API
| Endpoint | Method | Purpose | Parameters | Response |
|----------|--------|---------|------------|----------|
| `/appointments` | GET | List appointments | patient_id, date_range | appointment_list |
| `/appointments` | POST | Create appointment | appointment_data | appointment_id |
| `/appointments/{id}` | PUT | Update appointment | appointment_id, appointment_data | success_message |
| `/medications` | GET | List medications | patient_id | medication_list |
| `/medications` | POST | Add medication | medication_data | medication_id |
| `/chemotherapy` | GET | List chemo sessions | patient_id | chemo_list |
| `/health-reports` | GET | List health reports | patient_id, date_range | report_list |
| `/medical-notes` | GET | List medical notes | patient_id | notes_list |

### Hospital Management API
| Endpoint | Method | Purpose | Parameters | Response |
|----------|--------|---------|------------|----------|
| `/hospitals` | GET | List hospitals | filters | hospital_list |
| `/hospitals/{id}` | GET | Get hospital details | hospital_id | hospital_data |
| `/hospitals/staff` | GET | List hospital staff | hospital_id | staff_list |
| `/hospitals/departments` | GET | List departments | hospital_id | department_list |

### Communication API
| Endpoint | Method | Purpose | Parameters | Response |
|----------|--------|---------|------------|----------|
| `/chat/messages` | GET | Get chat messages | user_id, other_user_id | message_list |
| `/chat/send` | POST | Send message | sender_id, receiver_id, message | message_id |
| `/notifications` | GET | Get notifications | user_id | notification_list |
| `/notifications/read` | PUT | Mark notification as read | notification_id | success_message |

---

## 🔧 Backend Processing Files

### Form Processing
| File | Purpose | Database Tables | Functions |
|------|---------|-----------------|-----------|
| `assets/php/form-process.php` | Arabic form processing | All tables | process_contact_form(), process_login(), process_registration() |
| `assets-en/php/form-process.php` | English form processing | All tables | process_contact_form(), process_login(), process_registration() |

### Database Functions
| Function | Purpose | Parameters | Return Value |
|----------|---------|------------|--------------|
| `connect_database()` | Database connection | None | Database connection object |
| `execute_query()` | Execute SQL query | query, parameters | Query result |
| `fetch_data()` | Fetch data from result | result | Data array |
| `insert_record()` | Insert new record | table, data | Record ID |
| `update_record()` | Update existing record | table, id, data | Success boolean |
| `delete_record()` | Delete record | table, id | Success boolean |

### Authentication Functions
| Function | Purpose | Parameters | Return Value |
|----------|---------|------------|--------------|
| `authenticate_user()` | User authentication | username, password | User data or false |
| `create_session()` | Create user session | user_id | Session token |
| `validate_session()` | Validate session | session_token | User data or false |
| `destroy_session()` | End user session | session_token | Success boolean |

---

## 📊 Data Relationships

### Entity Relationship Diagram
```
users (1) ←→ (many) user_profiles
users (1) ←→ (many) patient_attachments
users (1) ←→ (many) appointments
users (1) ←→ (many) medical_notes
users (1) ←→ (many) chat_messages

patients (1) ←→ (many) patient_details
patients (1) ←→ (many) appointments
patients (1) ←→ (many) medications
patients (1) ←→ (many) chemotherapy_sessions
patients (1) ←→ (many) health_reports
patients (1) ←→ (many) medical_notes
patients (1) ←→ (many) nutrition_plans

hospitals (1) ←→ (many) hospital_staff
hospitals (1) ←→ (many) hospital_departments
```

### Foreign Key Relationships
| Table | Foreign Key | References | Relationship |
|-------|-------------|------------|--------------|
| `user_profiles` | user_id | users.id | One-to-One |
| `patient_attachments` | doctor_id | users.id | Many-to-One |
| `patient_attachments` | patient_id | patients.id | Many-to-One |
| `appointments` | patient_id | patients.id | Many-to-One |
| `appointments` | doctor_id | users.id | Many-to-One |
| `medications` | patient_id | patients.id | Many-to-One |
| `chemotherapy_sessions` | patient_id | patients.id | Many-to-One |
| `health_reports` | patient_id | patients.id | Many-to-One |
| `medical_notes` | patient_id | patients.id | Many-to-One |
| `medical_notes` | doctor_id | users.id | Many-to-One |
| `nutrition_plans` | patient_id | patients.id | Many-to-One |
| `hospital_staff` | hospital_id | hospitals.id | Many-to-One |
| `hospital_staff` | user_id | users.id | Many-to-One |
| `hospital_departments` | hospital_id | hospitals.id | Many-to-One |

---

## 🔒 Security & Validation

### Input Validation
| Field Type | Validation Rules | Sanitization |
|------------|-----------------|--------------|
| **Email** | Valid email format, unique | HTML entities, SQL injection prevention |
| **Password** | Minimum 8 characters, complexity | Password hashing (bcrypt) |
| **Phone** | Valid phone format | Numeric only |
| **Date** | Valid date format | Date validation |
| **Text** | Length limits, allowed characters | HTML entities, XSS prevention |
| **File Upload** | File type, size limits | File type validation |

### Security Measures
| Security Feature | Implementation | Files |
|------------------|----------------|-------|
| **Password Hashing** | bcrypt algorithm | `form-process.php` |
| **Session Management** | Secure session handling | `login.php` |
| **SQL Injection Prevention** | Prepared statements | `form-process.php` |
| **XSS Protection** | Output encoding | All PHP files |
| **CSRF Protection** | Token validation | Form processing |
| **File Upload Security** | Type and size validation | File upload handlers |

---

## 📈 Performance Optimization

### Database Optimization
| Optimization | Implementation | Benefit |
|--------------|----------------|---------|
| **Indexing** | Primary keys, foreign keys, search fields | Faster queries |
| **Query Optimization** | Efficient SQL queries | Reduced load time |
| **Connection Pooling** | Reuse database connections | Better resource usage |
| **Caching** | Query result caching | Faster response times |

### API Optimization
| Optimization | Implementation | Benefit |
|--------------|----------------|---------|
| **Pagination** | Limit results per page | Reduced data transfer |
| **Filtering** | Query parameters for filtering | Targeted data retrieval |
| **Sorting** | Order by parameters | Organized data presentation |
| **Caching** | API response caching | Faster API calls |

---

## 🔍 Database Queries

### Common Queries
| Query Type | SQL Example | Purpose |
|------------|-------------|---------|
| **User Authentication** | `SELECT * FROM users WHERE username = ? AND password = ?` | Login verification |
| **Patient List** | `SELECT p.*, pd.* FROM patients p LEFT JOIN patient_details pd ON p.id = pd.patient_id WHERE p.doctor_id = ?` | Get patient list |
| **Appointments** | `SELECT a.*, p.first_name, p.last_name FROM appointments a JOIN patients p ON a.patient_id = p.id WHERE a.doctor_id = ? AND a.appointment_date >= ?` | Get appointments |
| **Medications** | `SELECT * FROM medications WHERE patient_id = ? ORDER BY start_date DESC` | Get patient medications |

### Complex Queries
| Query Purpose | SQL Example | Description |
|---------------|-------------|-------------|
| **Patient Statistics** | `SELECT COUNT(*) as total_patients, AVG(age) as avg_age FROM patients WHERE doctor_id = ?` | Patient analytics |
| **Appointment Summary** | `SELECT DATE(appointment_date) as date, COUNT(*) as count FROM appointments WHERE doctor_id = ? GROUP BY DATE(appointment_date)` | Appointment statistics |
| **Medication Compliance** | `SELECT medication_name, COUNT(*) as prescribed_count FROM medications WHERE patient_id = ? GROUP BY medication_name` | Medication tracking |

---

## 🚀 Deployment Configuration

### Database Configuration
| Setting | Value | Description |
|---------|-------|-------------|
| **Host** | localhost | Database server address |
| **Port** | 3306 | Database port |
| **Database** | wecan_healthcare | Database name |
| **Charset** | utf8mb4 | Character encoding |
| **Collation** | utf8mb4_unicode_ci | String comparison rules |

### Environment Variables
| Variable | Purpose | Example Value |
|----------|---------|---------------|
| `DB_HOST` | Database host | localhost |
| `DB_NAME` | Database name | wecan_healthcare |
| `DB_USER` | Database username | wecan_user |
| `DB_PASS` | Database password | secure_password |
| `APP_URL` | Application URL | https://wecan.ae |
| `APP_ENV` | Environment | production |

---

## 📊 Monitoring & Logging

### Database Monitoring
| Metric | Monitoring Method | Alert Threshold |
|--------|-------------------|-----------------|
| **Query Performance** | Slow query log | > 2 seconds |
| **Connection Count** | Active connections | > 80% capacity |
| **Disk Usage** | Database size | > 90% capacity |
| **Error Rate** | Error log monitoring | > 5% error rate |

### API Monitoring
| Metric | Monitoring Method | Alert Threshold |
|--------|-------------------|-----------------|
| **Response Time** | API response time | > 1 second |
| **Error Rate** | HTTP error codes | > 2% error rate |
| **Request Volume** | Request count | > 1000 requests/minute |
| **Availability** | Uptime monitoring | < 99.9% uptime |

---

## 🔧 Troubleshooting

### Common Database Issues
| Issue | Cause | Solution |
|-------|-------|----------|
| **Connection Failed** | Wrong credentials or host | Check database configuration |
| **Slow Queries** | Missing indexes | Add appropriate indexes |
| **Memory Issues** | Large result sets | Implement pagination |
| **Lock Timeouts** | Concurrent updates | Optimize transaction handling |

### API Issues
| Issue | Cause | Solution |
|-------|-------|----------|
| **Authentication Failed** | Invalid credentials | Check user credentials |
| **Permission Denied** | Insufficient privileges | Verify user roles |
| **Data Not Found** | Invalid IDs or filters | Validate input parameters |
| **Server Error** | Database connection issues | Check database status |

---

**💡 Tip**: Use this index to understand the backend structure and database relationships when developing or maintaining the We Can healthcare system.

**🗄️ Database Schema**: This index provides a complete overview of the database structure, API endpoints, and backend functionality.
