<html>
	<head>
		<title>Artwork Information Request</title>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
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
				font-size: 70px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
			#numpad{
				margin:10px;
			}
			.button, #input{
				border:1px solid #B0BEC5;
				color: #B0BEC5;
				border-radius: 5px;
				height: 3em;
				display:inline-block;
				margin: 2px;
				line-height:3em;
				text-align:center;
			}
			.button{
				width: 3em;
				cursor:pointer;
			}
			#input{
				width:calc(9em + 20px);
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Enter Artwork Number:</div>
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
				<div>
					{!! Form::open(['url' => ['art'],'method'=>'get']) !!}
					<input name="id" id="input">
					{{--{!! Form::number('id',null); !!}
					{!! Form::submit('Get Information'); !!}--}}
					{!! Form::close() !!}
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
