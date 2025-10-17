<template>
	
	<section class="h-full border flex items-center" >

		<form action="" method="post" @submit.prevent="login" 
		class="max-w-[18rem] flex flex-col gap-[1rem] p-[1rem] border " >

			<p v-if="isInvalidCredentials" class="text-red-600" >
				Credentials are invalid!
			</p>
			<div class="flex flex-col" >
				<label for="" class="flex flex-col">Email</label>
				<input type="email" name="" v-model="email" id="" class="border">
			</div>

			<div class="flex flex-col" >
				<label for="" class="">Password</label>
				<input type="password" name="" id="" v-model="password" class="border">
			</div>

			<button type="submit" class="cursor-pointer py-[.8rem] hover:bg-[#EA454C] hover:text-white w-full border border-gray-200" >Login</button>
		</form>

		<picture>
			<img src="../assets/images/heroimg.png" alt="">
		</picture>

	</section>

</template>

<script setup>

	import { ref } from 'vue';
	import { useUserStore } from '@/stores/userStore';
	import { checkPassword, checkTextInput } from '@/utils/auth.utils';

	const userStore = useUserStore();
	const isInvalidCredentials = ref(false);

	const password = ref("");
	const email = ref("");


	async function login() {

		if (!checkPassword(password.value) || !checkTextInput(email.value)) {
			isInvalidCredentials.value = true;
			console.log("Les voici : ", password, name)
			return false;
		}

		let data = {
			"email": email.value,
			"password": password.value
		}

		await userStore.login(data);
	}


</script>