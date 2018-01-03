<html>
	<head>
		<title>Artwork Information Request</title>

		<link href='//fonts.googleapis.com/css?family=Lato:200' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #000000;
				display: table;
				font-weight: 200;
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
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<table class="table">
						<tr>
							<td>
								Name:
							</td>
							<td>
								{{$artInformation->nameOfArtPiece}}
							</td>
						</tr>
						<tr>
							<td>
								Country of Origin:
							</td>
							<td>
								{{$artInformation->country_of_origin}}
							</td>
						</tr>
						<tr>
							<td>
								Date Submitted:
							</td>
							<td>
								{{$artInformation->created_at}}
							</td>
						</tr>
						<tr>
							<td>
								Additional Information:
							</td>
							<td>
								{{$artInformation->additionalInformation}}
							</td>
						</tr>
						<tr>
							<td colspan="2">
							{{link_to_route('home','Back') }}
							</td>
						</tr>
				</table>
			</div>
		</div>
	</body>
</html>
