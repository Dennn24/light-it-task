<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calculator</title>
    <link rel="stylesheet" href="application/public/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="application/public/css/style.css">
</head>
<body>

<div class="container-fluid">
    <div class="raw">
        <div class="cal-8">
            <form action="/encode" method="post" id="main_form">
                <input class="form-control" id="input_number" name="input_number" type="text"/>
                <button id="btn" class="btn btn-secondary">transfer</button>
            </form>
        </div>
        <div class="cal-4">
            <input class="form-control" id="output_number" type="text"/>
        </div>
    </div>
</div>

<script src="application/public/js/ajax.js"></script>
<script src="application/public/bootstrap4/js/bootstrap.js"></script>
</body>
</html>