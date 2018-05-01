<div class="comment">
	<form  id="uploadForm" action="updateVerUpload.php" enctype="multipart/form-data" method="post">
			<h1>Comments</h1>

			<div class="row">
				<div><label for="name">Name</label></div>
				<div><input id="name" type="text" name="name" maxlength="13"></div>
			</div>
			<div class="row">
				<div><label for="Review">Review</label></div>
				<div><input id="comment" type="text" name="comment" maxlength="30" size="30"></div>
			</div>
			<div class="row">
				<div><label for="upload">Select image to upload:</label></div>
				<div><input type="file" id="image" name="image" value="UPLOAD" /></div>
				<div><input type="submit" id="submit" value="submit" name="submit"/>
				</div>
			</div>

		</form>

	</div><!-- close comment grid -->
