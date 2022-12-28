<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        include "db.php";
        $sql = "select username from users where username=? and password=?";
        $sth = $conn->prepare($sql);
        $sth->execute(array($_POST['username'], $_POST['password']));
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(); {
                $_SESSION['username'] = $row['username'];
                die(header("location: shopping.php"));
            }
        } else {
            $message = "Wrong username or password";
        }
    } catch (PDOException $e) {
        $message =  $sql . "<br>" . $e->getMessage();
    }
}
if (isset($_SESSION['username']))
    die(header("location: shopping.php"));

include "header.html"
?>


<html>

<head>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Cute Store
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-light my-2 my-sm-0" href="register.php">Sign Up</a>
        </form>
    </nav>
    <div class="container" style="margin-top: 10%">
        <div class="card" style="width: 18rem; margin: auto">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form action="/login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php if (isset($message)) echo $message; ?>
                </form>
                <div class="form-group">
                    <h6 for="exampleInputEmail1">Don't have account</h6>
                    <a href="/register.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>