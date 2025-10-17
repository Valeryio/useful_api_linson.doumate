<template>

	REGISTER FORM
	<form action="" method="post">
		<div>
			<label for="">Name</label>
			<input type="text" name="" id="">
		</div>

		<div>
			<label for="">Email</label>
			<input type="email" name="" id="">
		</div>

		<div>
			<label for="">Password</label>
			<input type="password" name="" id="">
		</div>

		<button type="submit">Register</button>
	</form>

</template>

<script setup>

	import { ref } from 'vue';
	const password = ref("");
	const email = ref("");
	const name = ref("");


</script>