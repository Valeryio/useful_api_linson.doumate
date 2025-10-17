
import { defineStore } from "pinia";
import {computed, ref} from "vue";
import { login } from "@/services/user.services";

export const useUserStore = defineStore("user", {

  state: () => ({
		userData: {}
  }),
  actions: {

		async login(data) {
			let response = await login(data);

			this.userData = await response.json();
			console.log("The response : ", response);
			return response;
		},
		
		async register(data) {
			let response = await register(data);

			console.log("The response : ", response);
			return response;
		}
	}


});

