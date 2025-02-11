<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <h3>Estás perdido?</h3>
    Route::fallback(function(){
        return "<a href = ".route('home', 'all_users', 'add_users', 'view_user', 'add_tasks', 'tasks', 'view_tasks', 'add_gifts', 'edit_gifts', 'gift', 'onegift')." >Estás perdido, volta aqui</a>";
    });
</body>
</html>
