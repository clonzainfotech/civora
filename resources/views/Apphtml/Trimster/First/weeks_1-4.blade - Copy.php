	<!DOCTYPE html>
<html lang="en">
<head>
  <title>Weeks 1-4</title>
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
  		/*color: black;*/
  		display: inline-block;
      	margin: 7px;
  	}
  	.link{
  		color: #5fc5d4
  	}
  	.link:hover {
	  /*color: #5fc5d4;*/
	  color: #ca476a;
	}
    /*li{
      font-size: 20px;
      color: #5fc5d4;
      margin-left: -20px;
    }*/
    .container{
      padding: 12px;
    }  
    p,li{
      font-family: "Roboto",Verdana,sans-serif;;
    }
    .weeks{
        background-color: #f2f2f2;
        /*width: 100% ;*/
        /*position: fixed;*/
    }
    .button-box{
    	width: 320px;
    	margin-top: 35px auto;
    	position: relative;
    	box-shadow: 0 0 20px #40BECC;
    	background-color:#40BECC; 
    	border-radius: 30px;
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
    #btn{
    	top: 0;
    	left: 0;
    	position: absolute;
    	width: 80px;
    	height: 100%;
    	background: linear-gradient(to right,#FFFFFF,#FFFFFF);
    	border-radius: 30px;
    	transition: .5s;
    }
    #week11{
    	color : #40BECC;
    }

    body {margin:0;}


.main{
	/*padding: 5px;*/
  	margin-top: 30px;
}
    
  </style>
</head>
<body>
	<div class="container">
  	<center>
  		<div class="button-box">
		  	<div id="btn"></div>
		 		<button type="button" class="toggle-btn" id="week11" onclick="week1()"><b>week1</b></button>
		  		<button type="button" class="toggle-btn" id="week12" onclick="week2()"><b>week2</b></button>
		  		<button type="button" class="toggle-btn" id="week13" onclick="week3()"><b>week3</b></button>
		  		<button type="button" class="toggle-btn" id="week14" onclick="week4()"><b>week4</b></button>
	  	</div>
	</center>
  	<div class="weeks">
		<!-- <a href="#week1" class="link"><h3>Week 1</h3></a> <a href="#week2" class="link"><h3>Week 2</h3></a> <a href="#week3" class="link"><h3>Week 3</h3></a> <a href="#week4" class="link"><h3>Week 4</h3></a> -->
	</div>
	<div class="main" id="main">
  		<!-- </div> -->
  		<div id="w1"> 
  		<h4 id = "week1">Week 1</h4>
		<p><b>Baby : </b> calculating the baby’s age quite difficult: </p>
		<p>To make it easier two kinds of ages</p>
		<li>Fetal age.</li>
		<li>Gestational age</li>
		<p>Fetal age is counted from date of conception and is usually two weeks less than gestational age in case of normal menstrual cycle or 14th ovulation happened. And so The fetal age directly depends on when the ovulation ( length of the menstrual cycle )  and intercourse happened. So it  impossible to determine the fetus’s exact fetal age. </p>
		<p>Gestational age is counted from the first day of the last menstrual period (LMP).</p>
		<p>Adding 280 days (40 weeks) to this date gives you the estimated date of delivery (EDD). You can simplify the calculation by adding 9 months and  seven days.</p>
		<p>It's easier to calculate so  pregnancy trackers, ultrasound and medical exams go by gestational age, which is counted in weeks.</p>
		<p>And no any specific finding seen on clinical examination or ultrasound.</p>
		</div>

		<div class="week2" id="w2" style="display: none;">
		<h4 id="week2">Week 2</h4>
		<p>Mother gets ready for baby.</p>
		<p>As we discussed in 1st week, this week is is gestational age not fetal age so there's is no baby inside uterus.</p>
		<p>But your body start preparing for pregnancy.</p>
		<p>Every fertile women menstrual cycle one egg released from one of the ovaries and that's good ovulation usually evolution happens on mid cycle or 14th day in regular menstrual cycle of 28 days but it can be happens between 7th to 22 days of cycles.</p>
		<p>On ultrasound we can see follicle developed in one of either ovaries.</p>
		<p>It grows 16 to 24 mm than it ruptures One egg released from this dominant follicule and it travels through fallopian tube and it can fertilised within 24 hour with sperm.</p>
		<p>So this period is fertile period and intercourse (sex ) is advised on this day to get pregnancy.</p>
		<p>Naturally in human being Only one egg released in one menstrual cycle. Very rarely two follicle develops and there is chance  of twin pregnancy.</p>
		<p>With ovulation stimulation drugs multiple follicle and so eggs form and released and that's why chance of multiple pregnancy increase in fertility drugs. </p>
		<p>End of 2nd week of last menstrual cycle you may feel slight Lower abdominal pain, slightly spotting per vagina and watery discharge.</p>
		<p>That's good sign of ovulation.</p>
		<p>Best of luck for successful pregnancy.</p>
		</div>

		<div class="week3" id="w3" style="display: none;">
		<h4 id="week3">Week 3</h4>
		<p><b>Baby : </b> In this week most precious process happens. your egg called as Ovum gets fertilised with sperm. From this two cells single cell forms called zygote develops 8n fallopian tube from where it transport to uterus. It grows by dividing form 16 to 32 cellular stages call morrula to blastocyst.</p>
		<p>At this stage it implantation happen in to inner line of uterus call endometrium. This call embryo which contains gene of both you and your husband.</p>
		<p>The embryo starts to taking nourishment itself from the mother's body. At This implantation site the placenta develops through which nutrients will pass to the baby. </p>
		<p>Approx week after fertilization the placental chorionic cells begin to secrete human chorionic gonadotropin (the hormone hCG), which signals the body to rewire for pregnancy. The amounts of the hormone grow rapidly, which is why one of the reliable ways to test for pregnancy test is to look for hCG in the blood. </p>

		<p><b>Mom : </b> In this week of pregnancy, your body begins a rapid hormonal shift. You may notice mood swings, increased sleepiness, fatigue, weakness, and even irritability. The reason for these sorts of hormonal “imbalances” is the variability in estrogen and progesterone entering the blood stream. These hormones are the ones primarily responsible for pregnancy, and their concentration in your body will be constantly rising, especially in the first trimester.</p>
		<p>There might be dull ache in lower abdomen or back. Breast size little bit increase and tenderness or pain may happens.Craving for food or taste for food or  preference to food may have changed in this period. Smell of some good may cause nausea.</p>
		<p>In this period few pregnant women may have slightly blood discharge because embryo implant on inner uterine surface that called implantation bleeding. Nothing to worry about such bleeding or spotting</p>
		<p><b>Important advice : </b> In this week embryo forms and  development started so do take medicine that have adverse effects or teratogenic agent like X Ray exposure or pesticides or herbicides.Take medicine that adviced by your obstetrician Doctors</p>
		</div>

		<div class="week4" id="w4" style="display: none;">
		<h4 id="week4">Week 4</h4>
		<p><b>Baby : </b> In this week 4 the embryo is in form of three-layered disk. There is three layers, called germ layers.</p>
		<p>The outer layer, or ectoderm --> nervous system (brain, spinal cord, and peripheral nerves), skin, hair, nails, and tooth enamel. This layer will also form the sensory organs. </p>
		<p>The middle layer, or mesoderm, is for the skeleton, muscles, kidneys, circulatory system, and genitals.</p>
		<p>The inner layer, or endoderm, --> the baby’s internal organs, including the respiratory, endocrine, and digestive systems.</p>
		<p>There is embryo and  extraembryonic membranes. These extraembryonic membrane include the chorion, which will later become the placenta; the amnion, which will become the amniotic sac; and the yolk sac, which will perform a variety of functions for the first 7–8 weeks, including blood cell formation, waste removal, immune response regulation, nutrition, and metabolism.</p>

		<p><b>Mom : </b> In week 4, still u didn't missed the period most women still don’t suspect that they’re pregnant.As PreMenstrual Symptoms and early pregnancy symptoms are very much similar for such as tender breasts, irritability, or dull pains in lower abdomen and gastric symptoms (acidity ,gas). </p>

		<p>Unusual feeling s like increased sleepiness and weakness, decreased appetite, and strong reactions to pungent smells.Moods swing or increase frequency of micturation.There is no any clinical findings or sonography find this suggestive of pregnancy.</p>
		<p>Show the hormones human chorionic gonadotropin that released from developing embryo into the blood and then into the urine.So urine pregnancy test that detect beta HCG in urine.Aur blood serum shows beta HCG level which was more accurate than urine pregnancy test. </p>
		<p>For now, there’s no way to tell you’re pregnant by appearance alone. The only ways to find out that new life has been created within you are by taking an OTC pregnancy test or an hCG blood test. The hCG test is more definitive, being nearly 98% accurate. Is the pregnancy advances beta HCG level in the blood goes on increasing doubling at rate of around 48 hours.  </p>
		<p>If you miss period  and you have pregnancy symptoms, but your pregnancy test comes back negative, try it again a few days later, once hormone levels have increased, or get an hCG test.</p>

		<p><b>Useful tips healthy pregnancy and Baby </b></p>
		<p>At 4th week of pregnancy Schedule appointment with your doctor.</p>
		<p>Start prenatal vitamins prescribed by your doctor and avoid self medications.Start healthy habits like early to bed and avoid social media other stress full activities.</p>
		<p>U can do exercise. Actually in few custom n society pregnancy or preplanning people advice for rest that unnecessary and useless even harmful to physical n mental health. U should continue physical activity as it before planning pregnancy. .u can do yoga </p>
		<p>Start meditation n relaxing music.Drink plenty of water and juice to be hydrated.Avoid to much tea or coffee smoking n alcohol. Avoid junk and spicy food Avoid intercourse. </p>

		<p>Emergency contact to doctor if you have heavy bleeding with cramping in lower abdomen.</p>
		<p>Might be signs of miscarriage but keep in mind every breathing in this time is not a sign of miscarriage.chemical pregnancy  is condition in which  on ultrasound pregnancy cannot be seen but in a blood or urine presence of beta HCG a chemical that indicates pregnancy.</p>
	</div>

  </div>
  </div>

  <script type="text/javascript">
  	var x = document.getElementById("week1");
  	var y = document.getElementById("week2");
  	var z = document.getElementById("btn");
  	var x1 = document.getElementById("week11");
  	var x2 = document.getElementById("week12");
  	var x3 = document.getElementById("week13");
  	var x4 = document.getElementById("week14");
  	var w2 = document.getElementById("w2");
  	var w1 = document.getElementById("w1");
  	var w3 = document.getElementById("w3");
  	var w4 = document.getElementById("w4");
  	var main = document.getElementById("main");


  	function week2(){
  		$('#week1').css('left','-300px');
  		// x.style.left = "-300px";
  		y.style.left = "50px";
  		z.style.left = "80px";
  		x2.style.color = "#40BECC";
  		x1.style.color = "#FFFFFF";
  		x3.style.color = "#FFFFFF";
  		x4.style.color = "#FFFFFF";
  		w2.style.display = "block";
  		w1.style.display = "none";
  		w3.style.display = "none";
  		w4.style.display = "none";
  		// main.style.marginTop = "10px";

  		// location.href = "#week2";

  	}
  	function week1(){
  		// x.style.left = "-400px";
  		// y.style.left = "50px";
  		z.style.left = "0px";
  		x2.style.color = "#FFFFFF";
  		x1.style.color = "#40BECC";
  		x3.style.color = "#FFFFFF";
  		x4.style.color = "#FFFFFF";
  		w1.style.display = "block";
  		w2.style.display = "none";
  		w3.style.display = "none";
  		w4.style.display = "none";
  		// location.href = "#week1";
  	}

  	function week3(){
  		z.style.left = "160px";
  		x1.style.color = "#FFFFFF";
  		x4.style.color = "#FFFFFF";
  		x2.style.color = "#FFFFFF";
  		x3.style.color = "#40BECC";
  		w4.style.display = "none";
  		w2.style.display = "none";
  		w1.style.display = "none";
  		w3.style.display = "block";
  		// location.href = "#week1";
  	}

  	function week4(){
  		z.style.left = "240px";
  		x1.style.color = "#FFFFFF";
  		x4.style.color = "#40BECC";
  		x2.style.color = "#FFFFFF";
  		x3.style.color = "#FFFFFF";
  		w3.style.display = "none";
  		w2.style.display = "none";
  		w1.style.display = "none";
  		w4.style.display = "block";
  	}

  </script>

</body>
</html>
