# NSS Management System

## Overview

The NSS Management System is a web application designed to manage and streamline NSS (National Service Scheme) activities. It helps officers, secretaries, and volunteers efficiently handle tasks, track attendance, and manage events.

## Features

- **Admin**: Manage officers, update details.
- **Officer**: Manage student profiles, assign tasks, generate reports.
- **Secretary**: Register events, manage attendance.
- **Volunteer**: Track attendance, register for events.

## Technologies Used

- **Front End**: HTML, CSS, JavaScript
- **Back End**: PHP
- **Database**: MySQL
- **Server**: XAMPP

## Project Structure

1. **Admin**: Login, manage officers, update details.
2. **Officer**: Login, manage profiles, assign tasks, upload photos.
3. **Secretary**: Login, register events, manage attendance.
4. **Volunteer**: Login, track attendance, register for events.

## Database Design

The database consists of several tables, including:

- `event_register`: Stores details of events registered by volunteers.
- `gallery`: Contains images uploaded by the system.
- `officer_profile`: Holds details of officers.
- `pass`: Stores login details of officers, secretaries, and volunteers.
- `report`: Keeps records of NSS activity reports.
- `special_achievement`: Documents special achievements of volunteers.
- `task`: Records tasks assigned to volunteers.
- `volunteer_attendence`: Tracks volunteer attendance for activities.
- `volunteer_profile`: Contains profiles of volunteers.

## Installation

To set up the project locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd NSS_Management
   ```
3. Start the XAMPP server and ensure MySQL and Apache are running.
4. Import the provided database schema into your MySQL server.
5. Update the database connection settings in the project files as necessary.
6. Access the project through your web browser.

## Team Members

- Vivian Serrao
- Hrithik
- Melisha Shalini Pinto
- Preethesh

---
