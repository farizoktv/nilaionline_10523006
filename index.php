<!DOCTYPE html>
<!-- Developed by Websquare Indonesia -->
<html class="no-js" lang="en">
<head>
    <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/logoicon.ico"/>
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Kreon:light,regular" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/style-sheet.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-sheet2.css"/>
    <link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>
</head>

<body>
<header>
    <section class="logo"><a href="#"><img src="images/logo.png" alt="Logo"/></a></section>
    <section class="title">Sistem Informasi Nilai Online <br/>
        <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
    <section class="clr">
        <center>Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center>
    </section>
</header>

<section id="container">
    <div>
        <center>
            <section id="navigator">
                <ul class="menus">
                    <h2>LOGIN GENERAL</h2>
                </ul>
            </section>
            <br/><br/>
            <?php
            include('./koneksi/koneksi.php');
            session_start();

            if (!isset($_POST['submit'])) {
                ?>
                <form enctype="multipart/form-data" method="post" class="form-login">
                    <table>
                        <tr>
                            <td><input type="text" name="username" placeholder="Username" required/></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" placeholder="Password" required/></td>
                        </tr>
                        <tr>
                            <td><input id="submit" name="submit" type="submit" value="Login"></td>
                        </tr>
                    </table>
                </form>
                <?php
            } else if (empty($_POST['username']) || empty($_POST['password'])) {
                echo "<script>alert('Please fill out Username or Password correctly!');</script>";
                echo "<script type='text/javascript'>window.location.href = './index.php';</script>";
            } else {
                $username = mysqli_real_escape_string($koneksi, $_POST['username']);
                $password = mysqli_real_escape_string($koneksi, $_POST['password']);

                $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                $eksekusi = mysqli_query($koneksi, $query);

                if (!$eksekusi) {
                    die("Query error: " . mysqli_error($koneksi));
                }

                $rowCheck = mysqli_num_rows($eksekusi);

                if ($rowCheck > 0) {
                    $data = mysqli_fetch_array($eksekusi);
                    $_SESSION['adm'] = $data[0]; 
                    header('Location: ./admin/index.php');
                    exit;
                } else {
                    echo "<script>alert('Invalid username or password!');</script>";
                    echo "<script type='text/javascript'>window.location.href = './index.php';</script>";
                }
            }
            ?>
        </center>
    </div>
    <section class="clr"></section>
</section>

<footer>
    <font color="#000">Copyright &copy; 2025 - Universitas Komputer Indonesia <br/>
        Developed By <a href="#" target="_new">Fariz Oktavian</a></font>
</footer>

</body>
</html>
