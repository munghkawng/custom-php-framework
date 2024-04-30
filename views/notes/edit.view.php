<?php require base_path('views/partials/header.php') ?>
<?php  require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php"); ?>
	<main>
		
		
		<div class="mx-auto max-w-7xl py-6 sm:py-6 lg:px-8">
			
			
			<form method="POST" action="/notes">
				
				<div class="col-6">
					<label for="body" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
					<div class="mt-2">
						<textarea id="body" name="body" rows="3" cols="50" class="block rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" placeholder="Write an idea for notes"><?= $_POST['body'] ?? '' ?></textarea>
						<?php if(isset($errors['body'])) : ?>
							<p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
						<?php endif;?>
					</div>
					<p class="mt-3 text-sm leading-6 text-gray-600">
						<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
					</p>
				</div>
			
			</form>
		
		
		</div>
	</main>
<?php require base_path('views/partials/footer.php') ?>