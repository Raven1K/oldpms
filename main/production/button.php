<!-- Include Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<!-- Include Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="dropdown">
	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
		Action
	</button>
	<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<li><a class="dropdown-item bg-warning text-white" href="#" data-bs-toggle="modal" data-bs-target="#updateborrower<?php echo $fetch['borrower_id']?>">Edit</a></li>
		<li><a class="dropdown-item bg-danger text-white" href="#" data-bs-toggle="modal" data-bs-target="#deleteborrower<?php echo $fetch['borrower_id']?>">Delete</a></li>
	</ul>
</div>
