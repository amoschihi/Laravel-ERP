HOW TO USE THIS APPLICATION
===========================================================================================

Step 1: Upload the folder to your server

Step 2:
	i) While composer installed in your system, Open your CLI to download the composer dependancies:- composer install 

	ii) Open the .env file and Configure your database & Mail support

If you are importing database(lincoln.sql), you may skip step 3

Step 3: 
	i) Open the AppServiceProvider.php (Located at App\Providers) and comment this line at the boot function;

		self::globalVals(1);

	ii) Open your CLI, navigate to your root folder and type:- php artisan migrate 

	iii) Uncomment the line at 3(i) above (self::globalVals(1)) after a successive migration.

	iv) You may want to seed the Roles, Menus, Users, Settings and Submenus test data by running:- php artisan db:seed at your CLI. Alternatively, you may want to do it all together in step 3(ii) above by running:- php artisan migrate:refresh --seed

Step 4: Clear all cache and views:- php artisan config:cache,then, php artisan view:clear

Step 5: You can now loggin as follows;
	
	i) Instructor - {username=code doctor, password=lincoln}
	ii) Super Admin - {username=amos, password=lincoln}
	iii) Student - {username=amos, password=lincoln}

	NB: All menus are managed by the Super Admin, if you have any issue log in as Super Admin to rectify.
