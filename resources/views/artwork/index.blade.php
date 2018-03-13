<html>
<head>
	<title>Artwork Information Request</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
		body {
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			display: table;
			font-weight: 100;
			font-family: 'Lato';
		}

		.container {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 50px;
			margin-bottom: 30px;
		}

		.quote {
			font-size: 20px;
		}
		#numpad{
			margin:10px;
		}
		.button, #input{
			border:2px solid #000000;
			color: #000000;
			background-color: rgba(255,255,255,0.5);
			border-radius: 5px;
			height: 2em;
			display:inline-block;
			margin: 3px;
			line-height:2em;
			text-align:center;
			font-size:50pt;
		}
		.button{
			width: 2em;
			cursor:pointer;
		}
		#input{
			width:calc(6em + 20px);
			border:none;
			background-color: transparent;
		}
		@media screen and (orientation: landscape){
			.button{
				font-size:8vh;
				height:16vh;
				line-height:16vh;
				width: 25vh;
			}
			#input{
				width:calc(24vh + 20px);
			}
		}
		@media screen and (orientation: portrait){
			.button{
				font-size: 7vw;
				height:14vw;
				line-height:14vw;
				width:18vw;
				border-radius: 2vw;
				margin:1vw;
			}
			#input{
				font-size: 10vw;
				width:calc(75vw + 20px);
			}
		}
	</style>
	<script language="javascript" type="text/javascript" src="js/p5.js"></script>
	<script language="javascript" type="text/javascript" src="js/p5.dom.js"></script>
	<script language="javascript" type="text/javascript" src="js/studentart.js"></script>
	<!-- OK, YOU CAN MAKE CHANGES BELOW THIS LINE AGAIN -->
	<script src="https://cdn.ncsu.edu/brand-assets/utility-bar/ub.php?googleCustomSearchCode=[INSERT CUSTOM SEARCH CODE]&placeholder=&maxWidth=1100&color=gray&showBrick=1"></script>
	<link href="https://cdn.ncsu.edu/brand-assets/fonts/include.css"
		  rel="stylesheet" type="text/css" />
	<link href="https://cdn.ncsu.edu/brand-assets/bootstrap/css/bootstrap.css"
		  rel="stylesheet" media="screen" type="text/css" />
</head>
<body>
<div id="ncstate-utility-bar"></div>

<div class="container">
	<div class="title">Enter Artwork Number:</div>
	<div>
		<form method="get" action="art">
			<input name="id" id="input">
		</form>
	</div>
	<div id="numpad">
		<div>
			<div class="button num">1</div>
			<div class="button num">2</div>
			<div class="button num">3</div>
		</div>
		<div>
			<div class="button num">4</div>
			<div class="button num">5</div>
			<div class="button num">6</div>
		</div>
		<div>
			<div class="button num">7</div>
			<div class="button num">8</div>
			<div class="button num">9</div>
		</div>
		<div>
			<div class="button" id="backspace">Bksp</div>
			<div class="button num">0</div>
			<div class="button" id="enter">Enter</div>
		</div>
	</div>
</div>
</body>
<script>
    $('.num').click(function(){
        $('#input').val($('#input').val() + $(this).text());
    });
    $('#backspace').click(function(){
        $('#input').val($('#input').val().slice(0,$('#input').val().length - 1));
    });
    $('#enter').click(function(){
        $('form').submit();
    })
</script>
</html>

<!-- // vw for spacing in css //z index for order of layers  em is font size -->


