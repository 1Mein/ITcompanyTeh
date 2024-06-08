<code>git clone https://github.com/1Mein/ITcompanyTeh</code>

<code>cd ITcompanyTeh</code>

<code>npm install</code>

<code>npm run build</code>

<code>composer install</code>

<code>copy .env.example .env</code>

<code>type nul > database/database.sqlite</code>

<code>php artisan migrate:fresh --seed</code>

<code>php artisan key:generate</code>

<code>php artisan storage:link</code>

<code>php artisan serve</code>

<hr>
by default server will on localhost:8000 
<hr>
<br><br><br>

database with sqlite

credentials for admin panel as default
login: admin
password: admin 


api routes:
/api/genres
/api/genres/{id}
/api/films
/api/films/{id}

pagination with 
?page={page}

images in 
/storage/{image_path}




