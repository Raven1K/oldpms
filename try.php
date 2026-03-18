<!DOCTYPE html>
<html>
<head>
	<title>Custom Modal Box</title>
	<style>
		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.4);
		}

		.modal-content {
			background-color: #fff;
			margin: 10% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
			box-shadow: 0 0 10px #ccc;
			position: relative;
		}

		.close {
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
			position: absolute;
			top: 0;
			right: 10px;
		}

		.close:hover,
		.close:focus {
			color: black;
			text-decoration: none;
			cursor: pointer;
		}

		.message-box h2 {
			margin-top: 0;
		}

		.button-container {
			display: flex;
			justify-content: center;
			margin-top: 20px;
		}

		.button-container button {
			margin: 0 10px;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			background-color: #ccc;
			color: #fff;
			cursor: pointer;
		}

		.button-container button:hover {
			background-color: #aaa;
		}
	</style>
</head>
<body>
	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<div class="message-box">
				<h2>Do you want to continue?</h2>
				<div class="button-container">
					<button id="yes-btn">Yes</button>
					<button id="no-btn">No</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		const modal = document.getElementById('myModal');
		const yesBtn = document.getElementById('yes-btn');
		const noBtn = document.getElementById('no-btn');
		const closeBtn = document.getElementsByClassName('close')[0];

		yesBtn.addEventListener('click', () => {
			// Code to execute if user clicks Yes button
			console.log('User clicked Yes');
			modal.style.display = "none";
		});

		noBtn.addEventListener('click', () => {
			// Code to execute if user clicks No button
			console.log('User clicked No');
			modal.style.display = "none";
		});

		closeBtn.addEventListener('click', () => {
			// Code to execute if user clicks close button
			modal.style.display = "none";
		});

		window.addEventListener('click', (event) => {
			// Code to execute if user clicks outside the modal
			if (event.target == modal) {
				modal.style.display = "none";
			}
		});

		// Code to open the modal when the page loads
		modal.style.display = "block";
	</script>
</body>
</html>
