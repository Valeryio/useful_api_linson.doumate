
export function checkTextInput(value) {
	if (value.trim() === "") {
		return false;
	}
	return true;
}

export function checkPassword(password) {
	if (password === "" || password.length < 8) {
		return false;
	}
	return true;
}