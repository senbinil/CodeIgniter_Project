<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASP</title>
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <script src="asset/js/jquery.min.js"></script>
    

    <style>
        @font-face {
       font-family: Montserrat;
       src: url(asset/fonts/Montserrat-Regular.ttf);
    }
        body {
        height:100%; /* ADD this */
        /* position: relative; */
        
  min-height: 100%;
    }
        body {
      font-family: 'Montserrat',sans-serif;
      /* Margin bottom by footer height */

    }
  

.footer {
  position: relative;
  bottom: 0;
  width: 100%;
}
    
    .social-links a {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      padding-top: 10px;
      font-size: 18px;
      font-size: 1.2em;
      display: inline-block;
      margin: 0 5px;
      text-align: center;
      color: white;
      line-height: normal; }
      .social-links a.facebook {
        background-color: #204385; }
      .social-links a.twitter {
        background-color: #2aa9e0; }
      .social-links a.google-plus {
        background-color: #d3492c; }
      .social-links a.pinterest {
        background-color: #ca2128; }
    
        nav ul li{
            font-weight: normal;
            font-size: large;
            
        }
       
        .navbar-brand{
            font-size: x-large;
            font-weight: 500;
        }
     

        </style>
        <link rel="stylesheet" href="asset/css/home_style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg py-md-4 py-xs-0  navbar-dark  bg-dark  fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="home">CASP</a>
              <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-icon fa fa-arrow-right"></span> -->
                <img src="asset/img/bounce-arrow.gif"  width="40px" height="40px" alt="">
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="home">Home
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="exlog.php">Student</a>
                      <a class="dropdown-item" href="exlog.php">Staff</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="admin-login">College</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="setpass.php">Admission</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="setpass.php">Registration</a>
                  </li>
                  <li class="nav-item">
                      <a href="more.htm" class="nav-link">More</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                  </li>
                  <li class="nav-item ">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exmodal">
                      Changelog <span class="badge badge-light">new!</span>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <div class="modal fade" id="exmodal" tabindex="-1" role="dialog" aria-labelledby="exmodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Changelog</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body ">
                  <div class="content">
                    <h4>25/01/2020</h4>
                    <ul>
                      <li>Initial release 1.0</li>
                      <li>New Design !</li>
                      <li>Add changelog button</li>
                      <li>Base Rework</li>
                      <li>bootstrap Updated to 4.7.0.1</li>
                      <li>Blood Bank funtionality addded</li>
                      <li>Admin login fixed</li>
                      <li>Suggestion Box added</li>
                    </ul>
                    <p class="lead">For more information and assistance ping as on <a href="mailto:xyz@gmail.com" class="text-decoration-none">xyz@gmai.com</a></p>
                    
                  <span class="text-md">Thank You</span>
                  </center>
                  </div>
                </div>
                <div class="modal-footer bg-dark text-white">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>