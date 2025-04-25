# How to Use the Project on Localhost

## Prerequisites
- Install XAMPP on your system.
- Clone or download the project files to your local machine.

## Steps to Set Up the Project

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   ```
   Or download the project as a ZIP file and extract it.

2. **Set Up the Database**
   - Start XAMPP and ensure MySQL is running.
   - Open phpMyAdmin by visiting `http://localhost/phpmyadmin`.
   - Create a new database (e.g., `popup_app`).
   - Import the `popup_app.sql` file into the database.

3. **Configure the Application**
   - Open the `config/config.php` file.
   - Update the database credentials (host, username, password, database name) to match your local setup.

4. **Run the Application**
   - Place the project folder in the `htdocs` directory of your XAMPP installation.
   - Start Apache and MySQL from the XAMPP control panel.
   - Open your browser and navigate to the following links:
     - **Admin Login:** `http://localhost:8000/admin/login`
     - **User Homepage:** `http://localhost:8000/user`

5. **Access the Application**
   - Use the following credentials to log in as Admin:
     - **Username:** admin
     - **Password:** Pass12

## Notes
- Ensure the `public/` folder is accessible.
- If you encounter any issues, check the XAMPP logs for more details.