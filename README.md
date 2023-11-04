# Online Blood Donor Database Management

**Online Blood Donor Database Management** is a web-based platform designed to facilitate blood donation and requests. This repository contains the source code for the project, built using HTML, CSS, JavaScript, PHP, and MySQL.

## Table of Contents

- [Description](#description)
- [User Interface](#user-interface)
  - [Header Section](#header-section)
  - [Body Section (Home Page/Landing Page)](#body-section-home-pagelanding-page)
  - [Footer Section](#footer-section)
  - [Contact Us](#contact-us)
  - [Anonymous Users/Non-Verified Users](#anonymous-usersnon-verified-users)
- [User Registration](#user-registration)
  - [Logged In Users/Verified Users](#logged-in-usersverified-users)
  - [Signup for Blood Requester (Member)](#signup-for-blood-requester-member)
  - [Signup for Blood Donors](#signup-for-blood-donors)
  - [Login for Blood Donors](#login-for-blood-donors)
  - [Login for Blood Requester(Member)](#login-for-blood-requestermember)
- [User Features](#user-features)
  - [Features For Blood Donors](#features-for-blood-donors)
  - [Features For Blood Requester (Member)](#features-for-blood-requester-member)
- [Admin Features](#admin-features)
- [Installation](#installation)
- [Contributing](#contributing)
- [License](#license)

## Description

**Online Blood Donor Database Management** is a web application that aims to connect blood donors with individuals in need of blood. The system categorizes users into three segments: **Blood Donors**, **Blood Requesters (Members)**, and **Admin**. Users can register, maintain their profiles, and interact with each other to fulfill blood donation requirements.

## User Interface

### Header Section

- **Logo**: The platform's logo serves as a unique identifier.

- **Navigation Links**: Essential links for quick access to key sections such as Home, Donor Login, Member Login, About Us, Admin Login, and Contact Us.

- **User Segmentation**: Users are categorized into Blood Donors, Blood Requesters (Members), and Admin, with separate login/signup options for each.

### Body Section (Home Page/Landing Page)

- The home page features an engaging image related to blood donation along with motivational quotes to inspire visitors.

- Blood Donors can access a login/signup page tailored for them, and Blood Requesters (Members) have a distinct link for their login/signup.

![Screenshot (81)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/e0aa9ce4-704c-4b44-b4b7-bbb81721be13)


![Screenshot (94)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/be266fc5-a671-4178-b235-241d4de108d7)



### Footer Section

- Quick links include Home, About Us, Contact Us, Terms And Conditions, and Privacy Policies.

- Social media icons are provided to connect with the platform through various channels.

- A copyright symbol is displayed to safeguard content and address copyright concerns.

![Screenshot (84)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/f2015b05-8ad0-4c8d-92dd-5bac438e113c)



### Contact Us

- A dedicated feedback form allows users, including Blood Donors and Blood Requesters (Members), to share their experiences with the project.

![Screenshot (89)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/932cc5f6-18e3-4952-9ebf-e0faff6dd73a)



### Anonymous Users/Non-Verified Users

- Non-logged-in users have access to specific sections, including the landing page, motivational quotes, the 'About Us' page, and the 'Contact Us' page.

- Blood Needy Individuals who are not logged in cannot search for blood donors through the platform.

- Non-logged-in Blood Donors cannot initiate blood donations until they log in.

![Screenshot (87)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/6853fcef-2deb-4e7c-a88d-f91bea1fb515)


## User Registration

### Logged In Users/Verified Users

- Verified and logged-in Blood Donors can register within the website to contribute to the availability of blood for those in need.

- Verified and logged-in Blood Requesters (Members) can search for required blood donors and establish contact.

### Signup for Blood Requester (Member)

- Registration form includes fields for Name, Email Id, Phone Number, Address, Pin Code, Blood Group, State, City, Picture Upload, Password, Confirm Password, and Age.

- After completing the form, users receive a unique OTP via email and must input it to validate their registration.

### Signup for Blood Donors

- Similar to the registration process for Blood Requesters (Members), with additional age field constraints.

![Screenshot (95)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/6beb49ac-4fe2-4852-b9c8-d2ddeeaa3510)

![Screenshot (96)](https://github.com/ruban117/Online-Blood-Donor-Database-Management-System/assets/102974324/3dfff42d-5223-4ed6-b349-54c2269e7d73)



### Login for Blood Donors

- Registered donors can log in by entering their email id and password.

### Login for Blood Requester(Member)

- Similar login process as for Blood Donors.

## User Features

### Features For Blood Donors

- Welcome message on the donor's homepage, along with the donor's name.

- Side navigation bar with options for viewing and editing the profile, changing the password, changing availability for blood donation, and viewing contact history.

- Blood Donation Eligibility Criteria displayed in the availability tab.

- Donors can decide their eligibility for blood donation based on the criteria provided.

- Option to hide or show their profile based on their current availability status.

### Features For Blood Requester (Member)

- Welcome message on the requester's homepage, along with the requester's name.

- Side navigation bar with options for viewing and editing the profile, changing the password, searching for blood donors, and viewing contact history.

- The search for donors includes input fields for Pin Code and Blood Group.

- Profiles of potential donors are shown based on the provided search criteria.

- Requesters can contact their chosen donor and manage requests.

- Option to report any malpractice through the 'Report Donor' button.

## Admin Features

- Admin has access to the admin panel, where they can manage all donor and requester activities.

- Admin can view dashboard metrics, including Total Donors, Total Requesters, and Total Reports.

- Admin can view and verify all reports submitted by users.

- If reports are accurate, admin can send a warning message to the respective user's email.

## Installation

To set up the **Online Blood Donor Database Management** system, follow these steps:

1. Clone this repository to your local machine.
2. Set up a web server with PHP and MySQL support.
3. Import the database schema provided in the 'database' folder.
4. Update the database connection settings in `config.php`.
5. Configure your web server to point to the project directory.

## Contributing

We welcome contributions to improve this project. Feel free to submit issues or pull requests.

## License

This project is licensed under the [MIT License](LICENSE).
