# 👗 Fashion-AI – AI-Powered Fashion Customization Platform

<p align="center"> <i>Design Your Style. Customize Your Fit. Wear Your Vision.</i></p>

<p align="center">
  <i>A personalized fashion platform that empowers users to design, customize, and order outfits according to their individual preferences.</i>
</p>

---

## 📌 Table of Contents

* [Overview](#-overview)
* [Problem Statement](#-problem-statement)
* [Objectives](#-objectives)
* [Key Features](#-key-features)
* [System Modules](#-system-modules)
* [System Architecture](#️-system-architecture)
* [Technology Stack](#️-technology-stack)
* [Application Workflow](#-application-workflow)
* [Installation and Setup](#️-installation-and-setup)
* [Project Structure](#-project-structure)
* [Application Screenshots](#-application-screenshots)
* [Future Enhancements](#-future-enhancements)
* [Contributing](#-contributing)
* [License](#-license)

---

## 🌸 Overview

Fashion-AI is a web-based fashion customization platform that allows users to explore outfit designs, customize their fashion choices, manage body measurements, and place orders. It integrates a PHP backend with a MySQL database to support user accounts, designer interactions, order management, and payment-related workflows.

### 🎯 Our Vision

To make personalized fashion more accessible by bringing customers, designers, and customized clothing experiences together through a convenient digital platform.

---

## ❗ Problem Statement

Conventional online clothing platforms often face limitations such as:

* Restricted customization options.
* Difficulty finding outfits that match individual body measurements.
* Limited interaction between customers and designers.
* Challenges in requesting design modifications.
* Lack of convenient management of measurements and preferences.
* Uncertainty about customized outfits before placing an order.

Fashion-AI aims to address these challenges through an integrated platform for outfit customization, measurement management, designer interaction, and order processing.

---

## 🎯 Objectives

* Develop a user-friendly web-based outfit customization platform.
* Allow users to personalize clothing according to their style preferences.
* Support body measurement input for customized fitting.
* Facilitate communication between customers and designers.
* Provide outfit previews before order confirmation.
* Support payment, order management, and delivery tracking.
* Store user preferences and measurements for future orders.
* Improve the convenience of personalized fashion shopping.

---

## 🚀 Key Features

### 👗 Personalized Outfit Customization

Create outfits based on individual preferences by selecting:

* Clothing styles.
* Fabric materials.
* Colors and combinations.
* Patterns and textures.

### 📏 Body Measurement Management

Users can provide body measurements for customized clothing.

The system supports measurement details such as:

* Height.
* Chest.
* Waist.
* Shoulder width.

The platform is designed to support manual measurement input and camera-based AI-assisted measurement features.

### 🎨 Design Preview

Explore and preview customized outfit designs before confirming the final selection.

### 💬 Designer–User Communication

Enable customers to communicate their design preferences, request modifications, and receive feedback from designers before finalizing an outfit.

### 🛍️ Order and Payment Management

Support the ordering process for customized outfits, including order details and payment options.

### 📦 Order Tracking

Allow users to monitor their order progress through stages such as:

* Order confirmation.
* Processing.
* Stitching.
* Delivery.

### 🔄 Return and Modification Requests

Provide an interface for submitting requests related to fitting issues, design mismatches, or other concerns.

### ⭐ Customer Feedback and Reviews

Collect customer ratings and written feedback to support service improvement and customer engagement.

### 💾 Saved Measurements and Preferences

Store user measurements, design selections, and preferences to make future customization more convenient.

---

## 🧩 System Modules

| Module                      | Description                                                                         |
| --------------------------- | ----------------------------------------------------------------------------------- |
| User Registration and Login | Supports account creation, authentication, and user profile management.             |
| Measurement Module          | Supports manual measurement entry and the planned AI-assisted measurement workflow. |
| Outfit Customization        | Allows users to select clothing styles, fabrics, colors, patterns, and textures.    |
| Designer Communication      | Supports design-related communication and modification requests.                    |
| Order and Payment           | Manages customized outfit orders and payment-related information.                   |
| Order Tracking              | Displays order progress from confirmation to delivery.                              |
| Return Request              | Supports submission and review of return or modification requests.                  |
| Feedback and Reviews        | Collects ratings and comments for continuous improvement.                           |

---

## 🏗️ System Architecture


<img width="2210" height="1685" alt="mermaid-diagram (1)" src="https://github.com/user-attachments/assets/41e4a000-c41f-4c78-ad4f-3ca349e60624" />

The Fashion-AI system connects the user-friendly web interface with backend services to support outfit customization, body measurement processing, and order management. The PHP backend handles user requests and interacts with the MySQL database to store and retrieve relevant information. The architecture also includes designer support and order tracking, providing a structured workflow from outfit selection to order management.


---

## 🛠️ Technology Stack

| Technology           | Purpose                                                    |
| -------------------- | ---------------------------------------------------------- |
| HTML5                | Structures web pages and forms.                            |
| CSS3                 | Styles the interface and layouts.                          |
| JavaScript           | Adds interactivity, dynamic behavior, and form validation. |
| PHP                  | Handles server-side processing and application logic.      |
| MySQL                | Stores and manages application data.                       |
| Bootstrap JavaScript | Supports interface components and interactions.            |

---

## 🔄 Application Workflow

<img width="1203" height="2278" alt="mermaid-diagram (2)" src="https://github.com/user-attachments/assets/5975de88-b0bb-4fe5-b26f-ee3e25adcce1" />


This workflow illustrates the Fashion-AI application process, from user authentication and outfit customization to body measurement handling, order placement, payment processing, and order tracking. It also highlights the supporting admin, designer, and feedback workflows.

---

## ⚙️ Installation and Setup

Follow these steps to run the project locally.

### Prerequisites

Install the following tools:

* [XAMPP](https://www.apachefriends.org/)
* [Visual Studio Code](https://code.visualstudio.com/)
* A modern web browser such as Google Chrome.

XAMPP provides the Apache web server, PHP, and MySQL/MariaDB environment required for local development.

### 1. Clone the Repository

```bash
git clone <YOUR_GITHUB_REPOSITORY_URL>
```

Navigate to the project directory:

```bash
cd <YOUR_PROJECT_FOLDER>
```

### 2. Move the Project to the XAMPP Directory

Copy the project folder into:

```text
C:\xampp\htdocs\
```

For example:

```text
C:\xampp\htdocs\Fashion-AI\
```

### 3. Start the Required Services

1. Open the XAMPP Control Panel.
2. Start **Apache**.
3. Start **MySQL**.

### 4. Configure the Database

1. Open http://localhost/phpmyadmin.
2. Create a MySQL database for the project.
3. Import the project's SQL file if one is included in the repository.
4. Update the database connection settings in the PHP configuration file.

Use the actual database name, username, and password configured in your local environment.

### 5. Run the Application

Open the following URL in your browser, replacing the folder name if necessary:

```text
http://localhost/Fashion-AI/
```

The application should now be accessible through your local web server.

---

## 📁 Project Structure


```
Fashion-AI/
│
├── 📄 index.html
├── 📄 header.html
├── 📄 aboutas.html
├── 📄 contact.html
├── 📄 return.html
│
├── 🔐 Authentication/
│   ├── login.html
│   ├── login.php
│   ├── signup.html
│   ├── signup.php
│   ├── auth.php
│   ├── google_auth.php
│   └── logout.php
│
├── 👗 Outfit & Shopping/
│   ├── dashboard.html
│   ├── cart.html
│   ├── order.html
│   ├── order_form.html
│   ├── order.php
│   ├── create_order.php
│   └── submit_order.php
│
├── 📏 Body Measurement/
│   ├── bodymeasurement.html
│   ├── process_scan.php
│   ├── save_measure.php
│   └── backensave_measure.php
│
├── 💳 Payment/
│   ├── payment.html
│   ├── payment.css
│   ├── process_payment.php
│   ├── verify_payment.php
│   └── payment_success.html
│
├── 🎨 Designer/
│   ├── designer_login.php
│   ├── designer_logout.php
│   └── designer_panel.php
│
├── 🛠️ Admin/
│   ├── admin login.php
│   ├── admin_measurements.php
│   ├── admin_feedback view
│   ├── dashboard.php
│   └── view_orders.php
│
├── 💬 Feedback/
│   ├── feedback.html
│   ├── feedback.php
│   ├── submit_feedback.php
│   └── view_feedback.php
│
├── 🗄️ Database/
│   ├── db.php
│   ├── db1.php
│   └── dp.php
│
├── 🐍 AI/
│   └── app.py
│
├── 🖼️ Images & Assets/
│   ├── ai.png
│   ├── robot.png
│   ├── robot1.png
│   ├── dress logo image.jpg
│   ├── dress2.jpeg
│   ├── dress3.jpeg
│   ├── dress4.jpeg
│   ├── dress5.jpeg
│   ├── dress6.jpeg
│   ├── fabric1.jpeg
│   ├── fabric2.jpeg
│   ├── fabric3.jpeg
│   ├── fabric4.jpeg
│   ├── fabric5.jpeg
│   ├── image1.jpg
│   ├── image2.jpeg
│   ├── image3.jpeg
│   ├── image4.jpg
│   ├── image5.jpeg
│   ├── images1.jpeg
│   ├── logo1.jpg
│   └── logo2.jpg
│
└── 🧪 Testing & Miscellaneous/
    ├── test.php
    ├── dp1.php
    └── ab? 

```
---

## 📸 Application Screenshots

### 🔐 User Login
Secure user login interface with email/password authentication and Google sign-in support.

<p align="center">
<img width="568" height="574" alt="Picture1" src="https://github.com/user-attachments/assets/195d75ed-c95c-474f-b03d-1df8259edcfc" />
</p>

---

### 📏 AI Body Measurement
AI-assisted body measurement interface where users can upload front and side photos to initiate the measurement process.

<p align="center">
<img width="1151" height="553" alt="Picture2" src="https://github.com/user-attachments/assets/430bf6f3-c772-4c8d-9438-4106c834b158" />
</p>

---

### 👗 Fashion & Fabric Exploration
Interactive fashion interface allowing users to explore different dress styles, fabrics, textures, and materials.

<p align="center">
<img width="949" height="566" alt="Picture3" src="https://github.com/user-attachments/assets/095f1c87-45c4-41d8-aab5-4a106a81c1ed" />
</p>

---

### 💳 Dress Selection & Payment
Users can select a dress, view its price, enter payment details, and complete the purchase process.

<p align="center">
<img width="1600" height="770" alt="WhatsApp Image 2026-09-25 at 11 23 20 AM" src="https://github.com/user-attachments/assets/8381d9cb-353d-4a01-b23b-dc68acfee254" />
</p>

---

### ↩️ Return Request
Return request form for submitting order-related return requests with customer and order details.

<p align="center">
<img width="505" height="579" alt="Picture5" src="https://github.com/user-attachments/assets/b0a58490-3e80-4ec9-ab8a-5b5a30b7daaa" />
</p>

---

### 💬 Customer Feedback
Feedback interface that allows users to rate dress quality, fitting, design, ordering experience, and provide additional comments.

<p align="center">
<img width="507" height="579" alt="Picture6" src="https://github.com/user-attachments/assets/a8115534-2694-43d3-8e49-5fdd03a226b6" />
</p>

---

## 🔮 Future Enhancements

The platform can be extended with the following features:

### 🤖 Advanced AI-Based Measurements

Improve camera-based body measurement estimation and provide additional measurement guidance.

### 🪞 Augmented Reality Virtual Try-On

Allow users to visualize customized outfits on a virtual representation before ordering.

### 🧍 3D Outfit Visualization

Introduce interactive 3D garment previews for a more immersive customization experience.

### 🧠 AI-Powered Fashion Recommendations

Recommend clothing styles based on user preferences, saved designs, previous orders, and fashion trends.

### 📱 Mobile Application

Develop a mobile application to improve accessibility and convenience.

### 💳 Payment Gateway Integration

Expand payment support with secure online payment gateway integrations, including UPI, cards, and digital wallets.

### 💬 Real-Time Designer Chat

Introduce live messaging between customers and designers for faster communication and modification requests.

### ☁️ Cloud Integration

Support scalable data storage, deployment, and application availability through cloud infrastructure.

### 🌐 Multi-Language Support

Make the platform accessible to a wider audience through multiple language options.

---

## 🌟 Project Highlights

* Personalized outfit design and customization.
* Body measurement management for tailored clothing.
* Designer interaction and modification requests.
* Integrated order processing and tracking.
* Customer feedback and return request interfaces.
* Web application developed using HTML, CSS, JavaScript, PHP, and MySQL.

---

## 🤝 Contributing

Contributions, suggestions, and improvements are welcome.

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Commit your changes.
5. Submit a pull request.

```bash
git checkout -b feature/your-feature
git add .
git commit -m "Add your feature"
git push origin feature/your-feature
```

---

## 📄 License

This project is developed for educational and academic purposes.

If you intend to distribute or reuse the project publicly, consider adding an appropriate open-source license.

---

## 💖 A Step Toward Personalized Fashion

Fashion-AI brings together fashion customization, measurement management, designer interaction, and online ordering in one platform.

<p align="center">
<i>Your style. Your measurements. Your design. Your vision.</i>
</p>
