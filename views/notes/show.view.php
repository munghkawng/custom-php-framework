<?php require base_path('views/partials/header.php') ?>
<?php  require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php"); ?>
	<main>
	
	
		<div class="mx-auto max-w-7xl py-6 sm:py-6 lg:px-8">
				<p class="mb-6">
					<a href="/notes" class="text-blue-500 hover:underline">Go Back...</a>
				</p>
				
				<p >
					<?= htmlspecialchars($note['body']) ?>
				</p>

			<form class="mt-6" method="POST">
				<input type="hidden" name="_method" value="DELETE"/>
				<input type="hidden" name="id" value="<?= $note['id'] ?>"/>
				<button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
			</form>
			
			
			
			
			
		</div>
		
	</main>
<?php require base_path( 'views/partials/footer.php'); ?>