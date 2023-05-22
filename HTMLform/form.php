<!DOCTYPE html>
<html>
	<head>
		<title>Form Validation</title>
        <style>
            .required:after {
                content:" *";
                color: red;
            }
        </style>
	</head>
	
	<body>
		
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name">
            <label for="name" class="required"></label>
            <br><br>

			<label for="email">E-mail:</label>
			<input type="email" id="email" name="email" required>
            <label for="name" class="required"></label>
            <br><br>

			<label for="website">Website:</label>
			<input type="url" id="website" name="website">
            <br><br>

			<label for="comment">Comment:</label>
			<textarea id="comment" name="comment"></textarea>
            <br><br>

			<label for="gender">Gender:</label>
			<input type="radio" id="male" name="gender" value="male" required>
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="female" required>
			<label for="female">Female</label>
			<input type="radio" id="other" name="gender" value="other" required>
			<label for="other">Other</label>
            <label for="name" class="required"></label>
            <br><br>

			<input type="submit" name="submit" value="Submit">
		</form>

		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$name = test_input($_POST["name"]);
				$email = test_input($_POST["email"]);
				$website = test_input($_POST["website"]);
				$comment = test_input($_POST["comment"]);
				$gender = test_input($_POST["gender"]);

				if(!preg_match("/^[A-Za-z\s]+$/", $name))
				{
					echo "<p>Name must only contain letters and whitespace.</p>";
				}

				if(!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					echo "<p>Invalid email format.</p>";
				}

				if(!empty($website) && !filter_var($website, FILTER_VALIDATE_URL))
				{
					echo "<p>Invalid website URL.</p>";
				}
			}

			function test_input($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
	</body>
</html>