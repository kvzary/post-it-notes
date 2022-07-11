# Post-It Note Project

This is a project manage and keep track of tasks through Post-It Notes.

-----
SETUP
-----

Download the [master repository](https://github.com/kvzary/post-it-notes/tree/master).

To run the web-application:
* Create a localhost server through git bash. command: ```php artisan serve```
* Start apache and MySQL through XAMPP Control Panel
* Stade a node in terminal. command: ```npm run dev```

* Create a database through phpMyAdmin
* Run the migration scripts. command: php artisan migrate

-----------
APPLICATION
-----------

This web-application allows the user to:
* add a new post-it note
* edit an existing post-it note
* archive a post-it note
* specify an expiration for the post-it note
* delete post-it note after expiration date
* view archived post-it notes
* restore archived post-it notes
* permanently delete post-it notes
