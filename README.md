# Car Rental System

The **Car Rental System** is a web-based application built with Laravel that allows users to browse, book, and manage car rentals through a user-friendly interface. It also features an Admin Dashboard where administrators can manage cars, rentals, and customers.

## Google Drive Link [Click here to view Video](https://drive.google.com/file/d/191Pst-TWgSboPYXCPqzom5amF6VZhkqW/view?usp=drive_link)

## Features

### User Interface

-   **Browse Cars**: Users can view available cars for rent.
-   **Book Cars**: Users can select cars and book them for specific dates.
-   **Manage Bookings**: Users can view and manage their car rental bookings.
-   **User Authentication**: Secure login and registration system.
-   **Email Notifications**: Users receive confirmation emails after booking cars.

### Admin Dashboard

-   **Manage Cars**: Add, edit, and delete car listings.
-   **Manage Rentals**: View and manage all user rentals.
-   **Manage Customers**: View user information and rental history.
-   **User Role Management**: Admins can manage user roles.
-   **Car Filtering**: Admins and users can filter cars based on various criteria such as model, availability, and price.
-   **Email Notifications**: Admins receive email notifications for new bookings.

## Usage

### User

-   Register and log in.
-   Browse available cars.
-   Filter cars based on availability, model, and price.
-   Book a car for specific dates.
-   View and manage bookings.

### Admin

-   Log in to the admin dashboard.
-   Add new cars and update car information.
-   View, approve, or cancel car bookings.
-   Manage customer details.

## Email Notifications

The application sends out email notifications for the following actions:

-   **User Booking Confirmation**: After successfully booking a car, the user receives an email confirmation.
-   **Admin Notification**: Admins are notified of new bookings made by users.

## Database Schema

The system uses the following main tables:

-   **Users**: Stores user details and roles (admin, customer).
-   **Cars**: Stores information about the cars available for rent.
-   **Rentals**: Stores booking information including the user who booked, the car, and the rental dates.

## Technologies Used

-   **Backend**: Laravel Framework
-   **Frontend**: Blade Templates, Bootstrap
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze / Laravel UI
-   **Email Service**: Laravel's built-in mail functionality with SMTP (configurable in `.env`)
-   **Notifications**: Email notifications for both admin and user actions

## Future Enhancements

-   **Payment Integration**: Implement online payment for car bookings.
-   **Rating System**: Allow users to rate cars after rentals.
-   **Mobile App Support**: Build a mobile-friendly interface or mobile app.

## Contributing

Contributions are welcome! If you have any ideas or suggestions, feel free to open an issue or submit a pull request.