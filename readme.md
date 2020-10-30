HOW TO USE THIS APPLICATION
===========================================================================================
# Step 1
- Upload the folder to your server

# Step 2
- While composer installed in your system, Open your CLI to download the composer dependancies:- <code>composer install</code>		
- Open the .env file and Configure your database & Mail support

		If you are importing database (data/4s.sql), you may skip step 3

# Step 3
- Open the AppServiceProvider.php (Located at App\Providers) and comment this line at the boot function; <code>self::globalVals(1);</code>
- Open your CLI, navigate to your root folder and type:- <code>php artisan migrate</code>
- Uncomment the line at 3(i) above <code>(self::globalVals(1))</code> after a successive migration.
- You may want to seed the Roles, Menus, Users, Settings and Submenus test data by running:- <code>php artisan db:seed</code> at your CLI. 
- Alternatively, you may want to do it all together in step 3(ii) above by running:- <code> php artisan migrate:refresh --seed </code>

# Step 4
- Clear all cache and views:- <code>php artisan config:cache</code>,then, <code>php artisan view:clear</code>

# Step 5
You can now loggin as follows;

	i) Instructor - {username=code doctor, password=lincoln}
	ii) Super Admin - {username=amos, password=lincoln}
	iii) Student - {username=amos, password=lincoln}
    iv) Finance Officer - {username=chihi, password=lincoln}

	NB: All menus are managed by the Super Admin, if you have any issue log in as Super Admin to rectify.