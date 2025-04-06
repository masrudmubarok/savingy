# Savingy - Personal Finance Management Application

Savingy is a simple web application built with Vue.js 3 for the frontend and Laravel 12 for the backend to help users manage their personal finances. This application allows users to record income and expense transactions, view a list of transactions, and add and edit existing transactions.

## Key Features

* **Add Transaction:** Allows users to add new transaction records with details such as date, description, type (income/expenses), and amount.
* **View Transaction List:** Displays a list of all recorded transactions with detailed information.
* **Edit Transaction:** Enables users to modify the details of existing transactions.
* **Delete Transaction:** Allows users to remove transaction records.

## 🛠️ Tech Stack

* **Frontend:**
    * [![Vue.js](https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D)](https://vuejs.org/) - The Progressive JavaScript Framework for building user interfaces.
* **Backend:**
    * [![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/) - The PHP Framework For Web Artisans.
* **Database:**
    * [![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/) - A popular open-source relational database management system.
* **Package Manager:**
    * [![pnpm](https://img.shields.io/badge/pnpm-F69220?style=for-the-badge&logo=pnpm&logoColor=white)](https://pnpm.io/) - Fast, disk space efficient package manager.

## Prerequisites

Before running the application, ensure you have the following installed:

* [![Node.js](https://img.shields.io/badge/Node.js-339933?style=for-the-badge&logo=nodedotjs&logoColor=white)](https://nodejs.org/) (LTS version recommended)
* [![pnpm](https://img.shields.io/badge/pnpm-F69220?style=for-the-badge&logo=pnpm&logoColor=white)](https://pnpm.io/)
* [![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/) (version compatible with Laravel 12)
* [![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org/) - Dependency Manager for PHP.
* [![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

## Installation and How to Run the Application

### Frontend (Vue.js 3)

1.  Clone this repository:
    ```bash
    git clone <YOUR_REPOSITORY_URL>
    cd frontend
    ```

2.  Install dependencies using pnpm:
    ```bash
    pnpm install
    ```

3.  Configure the environment (if necessary). Typically, API URLs are configured in a `.env` file or within JavaScript configuration files. Ensure the Axios `baseURL` in your `main.js` points to the correct backend API address.

4.  Run the frontend development server:
    ```bash
    pnpm run dev
    ```

    The frontend application will be accessible at `http://localhost:<port>` (usually 5173 or another available port).

### Backend (Laravel 12)

1.  Navigate to the backend directory:
    ```bash
    cd backend
    ```

2.  Install backend dependencies using Composer:
    ```bash
    composer install
    ```

3.  Copy the `.env.example` file to `.env` and configure your database details and other environment variables.

4.  Generate the application key:
    ```bash
    php artisan key:generate
    ```

5.  Run database migrations:
    ```bash
    php artisan migrate
    ```

6.  Start the backend development server:
    ```bash
    php artisan serve
    ```

    The backend API will be accessible at `http://localhost:8000`.

## Usage

1.  Open the frontend application in your web browser.
2.  You will see the Dashboard Finance page.
3.  Use the form at the top to add new transactions. Fill in the date, description, select the transaction type (income or expenses), and enter the amount. Click the "Add" or "Save" button (if editing).
4.  The list of transactions will be displayed below.
5.  To edit a transaction, click the "Edit" button in the corresponding transaction row. The form will be populated with the transaction details, allowing you to make changes and click "Save".
6.  To delete a transaction, click the "Delete" button in the transaction row you wish to remove and confirm your action.

## Contributing

If you'd like to contribute to the Savingy project, please fork this repository and create a pull request with your proposed changes. We appreciate your contributions!

## License

[MIT](LICENSE)

## Authors
Masrud Mubarok