# learn-laravel

## Some Tips :
1. Fix Migrate Error in Windows : change file in `app\Providers`
```php
// add this in windows for migrate error
use Illuminate\Support\Facades\Schema;

// inside the boot function add defaultStringLength
public function boot()
    {
        // add this in windows for migrate error
        Schema::defaultStringLength(191);
    }
```
2. Controller `app\Http\Controllers` error when using new model
```php
// fixing namespace error
use App\Student;

// change get data: from query builder to eloquent ORM
public function index()
    {
        //Query Builder
        //$users = DB::table('students')->get();
        // dump($users);
        // var_dump($users);

        //Eloquent ORM
        $users = Student::all(); 
        return view('data', ['users' => $users]);
    }
```

## Composer 
Laravel utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

## Installation Via Composer Create-Project
Alternatively, you may also install Laravel by issuing the Composer create-project command in your terminal:

```php
composer create-project --prefer-dist laravel/laravel blog
```

## Local Development Server
If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command. This command will start a development server at http://localhost:8000:

```php
php artisan serve
```

## Database
Environment Configuration in `.env` :

```sql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learn_laravel (Setup DB Name)
DB_USERNAME=root
DB_PASSWORD=
```

## Routing
For most applications, you will begin by defining routes in your `routes/web.php` file. The routes defined in `routes/web.php` may be accessed by entering the defined route's URL in your browser. For example, you may access the following route by navigating to `http://your-app.test/user` in your browser:

```php
// *** Default ***
// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/service', function () {
//     return view('service');
// });

// *** Using Controller ***
// For static Pages
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/service', 'PagesController@service');

// For Dynamic Pages
Route::get('/data', 'StudentsController@index');
```

## View
Views contain the HTML served by your application and separate your controller / application logic from your presentation logic. Views are stored in the `resources/views` directory. A simple view might look something like this:
- Main Layout :

```html
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item @yield('navhomeactive')">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item @yield('navaboutactive')">
                <a class="nav-link" href="about">About</a>
            </li>
            <li class="nav-item @yield('navservicesactive')">
                <a class="nav-link" href="service">Services</a>
            </li>
            <li class="nav-item @yield('navdataactive')">
                <a class="nav-link" href="data">Data</a>
            </li>
        </ul>
    </div>
    <!-- Page Content -->
    @yield('content')
    <!-- End Page Content -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
```
- Child Layout (Extend Main Layout) :

```html
@extends('/layout/main')
@section('title', 'About Page')
@section('navaboutactive', 'active')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">About Page</h1>
            <h3>{{ $nama }}</h3>
        </div>
    </div>
</div>
@endsection
```

- Child Layout with data (Extend Main Layout) :
```html
@extends('/layout/main')
@section('title', 'Data Page')
@section('navdataactive', 'active')
@section('content')
<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <!-- <th scope="row">{{ $loop -> iteration }}</th> -->
                <th scope="row">{{ $user -> id }}</th>
                <td>{{ $user -> nim }}</td>
                <td>{{ $user -> nama }}</td>
                <td>{{ $user -> jurusan }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary">
                        Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
```
## Controller
Instead of defining all of your request handling logic as Closures in route files, you may wish to organize this behavior using Controller classes. Controllers can group related request handling logic into a single class. Controllers are stored in the `app/Http/Controllers` directory.

- Using the `make:controller` Artisan command, we can quickly create such a controller:
```php
  // default
  php artisan make:controller PagesController
  // with resource
  php artisan make:controller StudentsController --resource
```

- The Default Controller Created :
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// For Static Pages
class PagesController extends Controller
{
    public function home(){
        return view('home');
    }
    public function about(){
        return view('about', ['nama' => 'Wahid Ari']);
    }
    public function service(){
        return view('service');
    }
}
```

- The Resource Controller Created :
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// fixing namespace error
use App\Student;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Query Builder
        //$users = DB::table('students')->get();
        // dump($users);
        // var_dump($users);

        //Eloquent ORM
        $users = Student::all(); 
        return view('data', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}

```

## Model
To get started, let's create an Eloquent model. Models typically live in the `app directory`, The easiest way to create a model instance is using the `make:model` Artisan command:
```php
php artisan make:model Student
```
- will create new model :
```php
<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    //
}
```

## Migration
migration directory in `database\migrations` To create a migration, use the `make:migration` Artisan command:
```php
php artisan make:migration create_students_table
```
- will make new migration file :
```php
<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->char('nim', 12)->unique();
            $table->string('jurusan');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)