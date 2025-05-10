# pHp_website
# Task Manager - RBAC PHP Website

This project is a **Role-Based Access Control (RBAC)** Task Manager built using PHP and MySQL. It allows users to register, log in, manage tasks, and interact with an admin panel based on different user roles. The roles include **User**, **Contributor**, **Editor**, and **Admin**.

## Features

- **User Roles**: 
  - **User**: Can create and view their tasks.
  - **Contributor**: Can manage tasks, including editing and updating.
  - **Editor**: Can also update and modify tasks.
  - **Admin**: Has full control, including managing users and approving/rejecting accounts.

- **Task Management**:
  - Users can **create**, **edit**, and **delete** tasks based on their role.
  - Admins can manage user accounts, approving or rejecting them.

- **Role-Based Access Control (RBAC)**:
  - Different roles (User, Contributor, Editor, Admin) have different permissions.

- **Account Approval**: 
  - Admin can approve or reject users based on their registration status.

## Screenshots

### Registration Page
This is the page where users can register for the website by providing their email, password, and role.

![Registration Page](https://github.com/Aurpy-2005/pHp_website/blob/main/Screenshots/registration.png)

### Login Page
Users can log in to the website with their email and password.

![Login Page](https://github.com/Aurpy-2005/pHp_website/blob/main/Screenshots/login.png)

### User Dashboard
Once logged in, users can see their tasks and manage them.

![Dashboard](https://github.com/Aurpy-2005/pHp_website/blob/main/Screenshots/dashboard.png)

### Create Task
Users can create new tasks with a name and status.

![Create Task](https://github.com/Aurpy-2005/pHp_website/blob/main/Screenshots/create%20task.png)

### Edit/Update Task
Users can edit or update their tasks, changing the task name and status.

![Edit/Update Task](https://github.com/Aurpy-2005/pHp_website/blob/main/Screenshots/edit-update%20task.png)

### Admin Panel
The admin can view pending users and approve or reject their accounts.

![Admin Panel](https://github.com/Aurpy-2005/pHp_website/blob/main/Screenshots/admin%20panel.png)

## How to Use

### 1. Clone the repository
To get started with the project, first clone the repository:

```bash
git clone https://github.com/Aurpy-2005/pHp_website.git
cd pHp_website

### Technologies Used
PHP: Backend scripting language.

MySQL: Database management system for storing tasks and user data.

HTML/CSS: For the frontend design.
