step1:composer install
step2:php artisan migrate
step3:php artisan db:seed 
step4:php artisan serve
step5:navigate to http://127.0.0.1:8000/admin and login using the following email:superadmin@admin.com ,password:password
step6:from dashboard you may create any role and assign CRUD permissions on categories and product to it then assign it to any user you want but only super admin can brows and cmanipulate roles and permissions
step7:create categories and products then navigate to http://127.0.0.1:8000 to brows filtered products
