<p align="center">
  <a href="#">
    <img src="https://user-images.githubusercontent.com/40566790/125743825-6fabea4e-d50f-490f-bedd-2f1088718483.png" width="300" alt="DokterOne Logo">
  </a>
</p>

# DokterOne - Clinic & Patient Management System

DokterOne is a comprehensive web-based application designed to streamline clinic operations, patient management, and COVID-19 result verification. Built with **Laravel 10**, it offers a modern, verifying system for clinics to manage patient data and issue secure, verifiable test certificates.

## 🚀 Key Features

*   **Patient Management**: Complete CRUD system for patient data.
*   **Result Verification**: Generate official COVID-19 test certificates (Antigen/PCR).
*   **PDF Generation**: High-quality, printable A4 PDF certificates using DomPDF.
*   **QR Code System**: Instant verification of certificates via QR code scanning.
*   **Secure Routing**: Slug-based URLs (e.g., `/pasiens/name-id`) for privacy and professionalism.
*   **Dashboard**: Neubrutalism-styled responsive dashboard with statistics.
*   **User Management**: Role-based access for administrators and staff.

## 🛠️ Tech Stack

*   **Framework**: Laravel 10
*   **Language**: PHP 8.1+
*   **Database**: MySQL
*   **PDF Engine**: DomPDF
*   **Frontend**: Blade, Neubrutalism CSS, FontAwesome

## 📦 Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/oggiesutrisna/DokterOne.git
    cd DokterOne
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Database Setup**
    *   Create a database (e.g., `dokterone`).
    *   Update `.env` with your database credentials.
    *   Run migrations and seeders:
    ```bash
    php artisan migrate:fresh --seed
    ```

5.  **Run the Application**
    ```bash
    php artisan serve
    ```

## 🔑 Default Credentials

After seeding the database, you can log in with:
*   **Username**: `admin`
*   **Password**: `password`

## 📄 License

DokterOne is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---
Built with ❤️ by [Oggie Sutrisna](https://twitter.com/oggiesutrisna)
