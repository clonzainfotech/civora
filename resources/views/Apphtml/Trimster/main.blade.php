  <!DOCTYPE html>
<html lang="en">
<head>
  <!-- <title>Weeks 1-4</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  
    h4{
      font-size: 16px;
      opacity: 100%;
      font-family: "Myriad pro Semibold";
      color: black; 
    }
    h3{
      display: inline-block;
        margin: 7px;
    }

    .container{
      padding: 12px;
      background: linear-gradient(to right,#b3f0ff,#FFFFFF);
    }  
    p,li{
      font-family: "Roboto",Verdana,sans-serif;;
    }

    .button-box{
      /*top: 0;*/
      width: 100%;
      height: 60px;
      position: fixed;
      background: #FFFFFF;
      
    }
    button{
       margin-top: 7px;
    }
    .button-box1{
      margin-top: 35px auto;
      position: relative;
      box-shadow: 0 0 20px #40BECC;
      border-radius: 30px;
      width: 45px;
      height: 45px;
      color: #FFFFFF;
      /*margin-left: 20px;*/
    }
    .button-box2{
      margin-top: 35px auto;
      position: relative;
      box-shadow: 0 0 20px #40BECC;
      background-color:#40BECC; 
      border-radius: 30px;
      width: 45px;
      height: 45px;
      /*background-color: #40BECC; */
      margin-left: 20px;
    }

    .toggle-btn{
      padding: 10px 15px;
      cursor: pointer;
      background: transparent;
      border: 0;
      outline: none;
      position: relative;
      color: #FFFFFF;
      font-size: 15px;
    }

    #week11{
      color : #40BECC;
    }
   /* .week11 {
      margin-bottom: 70px;
      padding-top: 70px;
    }*/

    .test1 {
       padding-top: 0px;
    }
    .test {
       padding-top: 70px;
    } 

    /*.week12{
       padding-top: 70px;
    }*/
     #w1{
       padding-top: 70px;
    }
    /* #w2{
       padding-top: 70px;
    }

    #w3{
       padding-top: 70px;
    }
    #w4{
       padding-top: 70px;
    }
    #w5{
       padding-top: 70px;
    }*/

    body {margin:0;}

  /*.main{
    padding: 5px;
    margin-top: 30px;
  }*/
    
</style>
</head>
<body>

  @yield('content')

 <script type="text/javascript">
    // var x = document.getElementById("week1");
    // var y = document.getElementById("week2");
    var z = document.getElementById("btn");
    var x1 = document.getElementById("week11");
    var x2 = document.getElementById("week12");
    var x3 = document.getElementById("week13");
    var x4 = document.getElementById("week14");
    var x5 = document.getElementById("week15");
    var w2 = document.getElementById("w2");
    var w1 = document.getElementById("w1");
    var w3 = document.getElementById("w3");
    var w4 = document.getElementById("w4");
    var w5 = document.getElementById("w5");

    function week2(){
      // x.style.left = "-300px";
      // y.style.left = "50px";
      x2.style.backgroundColor = "#FFFFFF";
      x1.style.backgroundColor = "#40BECC";
      x3.style.backgroundColor = "#40BECC";
      x4.style.backgroundColor = "#40BECC";
      x5.style.backgroundColor = "#40BECC";
      // z.style.left = "80px";
      x2.style.color = "#40BECC";
      x1.style.color = "#FFFFFF";
      x3.style.color = "#FFFFFF";
      x4.style.color = "#FFFFFF";
      x5.style.color = "#FFFFFF";
      location.href = "#w2";
      // $("#w2").addClass("test");
      $('#w2').css('padding-top','70px');
      $('#w1').css('padding-top','70px');
      $('#w3').css('padding-top','0px');
      $('#w4').css('padding-top','0px');
      $('#w5').css('padding-top','0px');

    }
    function week1(){
      x1.style.backgroundColor = "#FFFFFF";
      x2.style.backgroundColor = "#40BECC";
      x3.style.backgroundColor = "#40BECC";
      x4.style.backgroundColor = "#40BECC";
      x5.style.backgroundColor = "#40BECC";
      // z.style.left = "0px";
      x2.style.color = "#FFFFFF";
      x1.style.color = "#40BECC";
      x3.style.color = "#FFFFFF";
      x4.style.color = "#FFFFFF";
      x5.style.color = "#FFFFFF";
      location.href = "#w1";
      // x1.style.
      // var weekdiv = document.getElementsByClassName("week11");
      $('#w1').css('padding-top','70px');
      $('#w2').css('padding-top','0px');
      $('#w3').css('padding-top','0px');
      $('#w4').css('padding-top','0px');
      $('#w5').css('padding-top','0px');
    }

    function week3(){
      x1.style.color = "#FFFFFF";
      x4.style.color = "#FFFFFF";
      x2.style.color = "#FFFFFF";
      x3.style.color = "#40BECC";
      x5.style.color = "#FFFFFF";
      x3.style.backgroundColor = "#FFFFFF";
      x2.style.backgroundColor = "#40BECC";
      x1.style.backgroundColor = "#40BECC";
      x4.style.backgroundColor = "#40BECC";
      x5.style.backgroundColor = "#40BECC";
      location.href = "#w3";
      $('#w3').css('padding-top','70px');
      $('#w2').css('padding-top','0px');
      $('#w1').css('padding-top','70px');
      $('#w4').css('padding-top','0px');
      $('#w5').css('padding-top','0px');
    }

    function week4(){
      x1.style.color = "#FFFFFF";
      x4.style.color = "#40BECC";
      x2.style.color = "#FFFFFF";
      x3.style.color = "#FFFFFF";
      x5.style.color = "#FFFFFF";
      x4.style.backgroundColor = "#FFFFFF";
      x2.style.backgroundColor = "#40BECC";
      x3.style.backgroundColor = "#40BECC";
      x1.style.backgroundColor = "#40BECC";
      x5.style.backgroundColor = "#40BECC";
      location.href = "#w4";
      $('#w4').css('padding-top','70px');
      $('#w2').css('padding-top','0px');
      $('#w3').css('padding-top','0px');
      $('#w1').css('padding-top','70px');
      $('#w5').css('padding-top','0px');

    }
    function week5() {
      x1.style.color = "#FFFFFF";
      x5.style.color = "#40BECC";
      x2.style.color = "#FFFFFF";
      x3.style.color = "#FFFFFF";
      x4.style.color = "#FFFFFF";
      x5.style.backgroundColor = "#FFFFFF";
      x2.style.backgroundColor = "#40BECC";
      x3.style.backgroundColor = "#40BECC";
      x1.style.backgroundColor = "#40BECC";
      x4.style.backgroundColor = "#40BECC";
      location.href = "#w5";
      $('#w5').css('padding-top','70px');
      $('#w2').css('padding-top','0px');
      $('#w3').css('padding-top','0px');
      $('#w4').css('padding-top','0px');
      $('#w1').css('padding-top','70px');

    }


/*
$(window).scroll(function() {
   if ($(this).scrollTop() > 100){
      $('#w2').addClass("test1");
   } else {
      $('body').removeClass("test1");
   }
});*/
  </script>
</body>
</html>