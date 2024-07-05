<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Contact Form</title>
 <style>
    hr {border-top: 1px solid #000; width:50%;}

a {color: #000;}

a:link{text-decoration:none;}

#contact2{
    letter-spacing:3px;
}



#author a{
  color: #fff;
  text-decoration: none;
    
}
 </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
    <h1 class="text-center">Contact Address</h1>
    <hr>
      <div class="row">
        <div class="col-sm-8">
          <iframe src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=RES%20ADDOUHA%20BD%20MLY%20YOUSSEF,SAFI%20MOROCCO+(SAFI%20MOTORS-Volswagen%20&amp;%20Skoda)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    
        <div class="col-sm-4" id="contact2">
            <h3>SAFI MOTORS</h3>
            <hr align="left" width="50%">
            {{-- <h4 class="pt-2">Contact</h4>
            <i class="fas fa-globe" style="color:#000"></i> address<br> --}}
            <h4 class="pt-2">Télé</h4>
            <i class="fas fa-phone" style="color:#000"></i> <a href="tel:+"> 123456 </a><br>
            <i class="fab fa-whatsapp" style="color:#000"></i><a href="tel:+"> 123456 </a><br>
            <h4 class="pt-2">Email</h4>
            <i class="fa fa-envelope" style="color:#000"></i> <a href="">motorssafi17@gmail.com</a><br>
            <h4 class="pt-2">Instagram</h4>
            <i  class="fa-brands fa-square-instagram" style="color:#000"></i> <a href="">safimotors17</a><br>
          </div>
      </div>
    </div>
    
    <i></i>
    
    <br><br>
 
    @endsection
</body>
</html>
