
const BASE_API = "http://localhost:8000/api";


export async function login(data) {

	let response = await fetch(BASE_API + "/login", {
		method: "POST",
		body: JSON.stringify(data)
	});

	return response;
}

export async function register(data) {

	let response = await fetch(BASE_API + "/login", {
		method: "POST",
		body: JSON.stringify(data)
	});

	return response;
}