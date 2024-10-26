Overview:
The Event Management System allows users to create, update, view, and manage events and attendees. Users can log in and perform CRUD (Create, Read, Update, Delete) operations for events, attendees, and categories. The application uses Eloquent ORM to handle database relationships effectively, and RESTFUL API routes are available to retrieve event data.

Installation & Setup:

-Clone the Repository:
    Git clone https://github.com/SatyanShakya/Event-management-System.git
    
-Install Dependencies:
    composer install 
    npm install
    
-Configure Environment:
    cp .env.example .env
    
-Generate an Application Key:
    php artisan key:generate
    
-Configure Environment:
    Create a .env file based on the .env.example file and set your database credentials and other configurations.
    
-Run Migrations:
    php artisan migrate
    
-Seed the Database:
    php artisan db:seed
    
-Compile Frontend Assets:
	npm run dev
 
-Start Development Server:
	php artisan serve
 
-Login/Register:
    Register as the new user for using the site
