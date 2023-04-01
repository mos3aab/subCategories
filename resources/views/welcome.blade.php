<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<!-- Add jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Add Bootstrap library -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <style>

.treegrid-indent {
    width: 0px;
    height: 16px;
    display: inline-block;
    position: relative;
  }

  .treegrid-expander {
    width: 0px;
    height: 16px;
    display: inline-block;
    position: relative;
    left: -17px;
    cursor: pointer;
  }
    </style>
</head>
<body>
    <div class="container">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="/category/list">Task</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/category/list">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/category/add">Add Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/select">Test</a>
    </li>
  </ul>
</nav>


    <br>
    @yield('content')

</div>

</body>
</html>
