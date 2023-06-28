<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Журнал</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Home</a></li>
        </ul>
        </header>
    <div class="bd-aside sticky-xl-top text-muted align-self-start mb-3 text-dark bg-white" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link active" aria-current="page">
            <svg class="bi me-2 text-dark" width="16" height="16"><use xlink:href="#home"></use></svg>
            Home
            </a>
        </li>
        <li>
            <a href="/6А" class="nav-link text-dark">
            <svg class="bi me-2 text-dark" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            6А класс
            </a>
        </li>
        <li>
            <a href="/6Б" class="nav-link text-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            6Б класс
            </a>
        </li>
        <li>
            <a href="/6В" class="nav-link text-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            6В класс
            </a>
        </li>
        </ul>
        <hr>
    </div>
    <div class="container">
    @yield('content')
    </div>
</body>
</html>
