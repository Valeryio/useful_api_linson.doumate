<template>

	REGISTER FORM
	<form action="" method="post" class="max-w-[18rem] p-[1rem] border">
		<div>
			<label for="">Name</label>
			<input type="text" name="" id="" class="border">
		</div>

		<div>
			<label for="">Email</label>
			<input type="email" name="" id="" class="border">
		</div>

		<div>
			<label for="">Password</label>
			<input type="password" name="" id="" class="border">
		</div>

		<button type="submit" class="cursor-pointer">Register</button>
	</form>

</template>

<script setup>

	import { ref } from 'vue';
	const password = ref("");
	const email = ref("");
	const name = ref("");


</script>