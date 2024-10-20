<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<!-- Modal -->
	<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitleId">
						Modal title
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">
								<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
							</div>
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1">
							</div>
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Check me out</label>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
		<script>
		var modalId = document.getElementById('modalId');

		modalId.addEventListener('show.bs.modal', function(event) {
			// Button that triggered the modal
			let button = event.relatedTarget;
			// Extract info from data-bs-* attributes
			let recipient = button.getAttribute('data-bs-whatever');

			// Use above variables to manipulate the DOM
		});
		</script>
	</div>

</body>

</html>