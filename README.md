
# Task Manager

Simple web application that allow you to Manage your tasks with filter (with Mysql database).

**Important Note:**

Time didn't help me use all the features,
but i used some of (PHP / Laravel) features:
- Requests to validation.
- Traits.
- Migrations & Seeders.
- Simple relation in models.
- Vue js Front end with files structure.
- SPA (single page application).
- Handling Response with success and error messages dynamically.
Some advanced features i wanted to implement if I had the time:
- BaseApiController (I wrote the structure in: App\Http\Controllers\Api\BaseApiController.php)
- (Services / Repositories) Pattern.
- Handling Response with advanced way (i wrote the structure in files: App\Common\SharedMessages.php and App\Traits\Api\V1\AdvancedApiResponse.php).
- Define config file in vue js to store token and request Headers.
- Unit Testing.
## Features

- (Add / Edit / Delete) Tasks
- Change Task Status (New - Complete)
- Simple Validation


## Structure

Controllers:

```bash
App\Http\Controllers\Api\V1
```

Models:

```bash
App\Models
```

Requests:

```bash
App\Http\Requests\Api\V1
```

Traits:

```bash
App\Traits\Api\V1
```

Routes:

```bash
routes/api.php
routes/web.php
```


Vue js Components:

```bash
resources\js\components
resources\js\components\partials
```