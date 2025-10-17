<template>
	
	LOGIN FORM
	<form action="" method="post">
		<div>
			<label for="">Email</label>
			<input type="email" name="" id="">
		</div>

		<div>
			<label for="">Password</label>
			<input type="password" name="" id="" v-model="password">
		</div>

		<button type="submit">Login</button>
	</form>

</template>

<script setup>

	import { ref } from 'vue';

	const password = ref("");
	const email = ref("");
	const name = ref("");

</script>