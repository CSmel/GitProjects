<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Creative Sakas: Contact</title>
	<meta content="Melanie Sakas" name="author">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

	<section>
		<form action="updateVerUpload.php" method="post" enctype="multipart/form-data">
			<h1>Comments</h1>

			<div class="row">
				<div><label for="name">Name</label></div>
				<div><input id="name" type="text" name="name" maxlength="13"></div>
			</div>

			<div class="row">
				<div><label for="name">Review</label></div>
				<div><input id="comment" type="text" name="comment" maxlength="30" size="30"></div>
			</div>

			<div class="row">
				<div><label for="upload">Select image to upload:</label></div>
				<div><input type="file" id="myDropZone" name="image" value="UPLOAD" /></div>
				<div><input type="submit" id="submit-all" name="submit" value="UPLOAD" />
				</div>
			</div>

		</form>
	</section>
</body>

</html>
