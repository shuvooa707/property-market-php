<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Page</title>
	<!-- Include Tailwind CSS -->
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<div class="min-h-screen flex items-center justify-center">
	<div class="bg-white p-8 rounded-lg shadow-md w-96">
		<h2 class="text-2xl font-semibold mb-4">Register</h2>
		<form action="/register" method="POST">
			@csrf
			<div class="mb-4">
				<label for="image" class="block text-gray-700">
					Image
					<img id="thumbnailFile"
					     class="h-1/4 rounded border-white max-w-full mt-4"
					     src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
					     style="max-height: 200px"
					     alt="image description">
				</label>

				<input onchange="loadFile()" accept="image/*" type="file" name="image"
				       id="image" style="width: 0px; height: 0px;" class="" placeholder="image"
				       required>
				<script>
					let loadFile = function (event) {
						let output = document.getElementById('thumbnailFile');
						output.src = URL.createObjectURL(window.event.target.files[0]);
						output.onload = function () {
							URL.revokeObjectURL(output.src) // free memory
						}
					};
				</script>
			</div>
			<div class="mb-4">
				<label for="email" class="block text-gray-700">Email</label>
				<input type="email" id="email" name="email"
				       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
			</div>
			<div class="mb-4">
				<label for="name" class="block text-gray-700">Name</label>
				<input type="text" id="name" name="name"
				       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
			</div>
			<div class="mb-4">
				<label for="password" class="block text-gray-700">Password</label>
				<input type="password" id="password" name="password"
				       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
			</div>
			<div class="flex items-center justify-between">
				<button type="submit"
				        class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
					Register
				</button>
				<a href="#" class="text-indigo-500 hover:text-indigo-700">Already have an account? Login</a>
			</div>
		</form>
	</div>
</div>
</body>

</html>
