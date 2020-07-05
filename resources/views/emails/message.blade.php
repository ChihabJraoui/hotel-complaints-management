<html>

<body style="background-color: #EEE; color: #212121; padding: 20px 0;">

	<section style="background-color: white; max-width: 500px; margin: 0 auto;">

		<div style="background-color: #212121; color: white; padding: 15px; text-align: center">
			<h1> AbdoGolfTours </h1>
		</div>

		<div style="padding: 30px;">
			<h5>Envoyé Par : </h5>
			<p>{{ $name }} - {{ $address }}</p>

			<h5>Message : </h5>
			<p style="text-align: justify">
				{{ $content }}
			</p>
		</div>

		<div style="border-top: 1px solid #EEE; text-align: center; padding: 20px;">
			<p>
				&copy; {{ date('Y') }} AbdoGolfTours. All rights reserved.
			</p>
		</div>

	</section>

</body>

</html>