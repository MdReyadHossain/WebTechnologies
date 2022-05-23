function validateAndSubmit(pForm) {

	let err1 = document.getElementById("err1");
	let err2 = document.getElementById("err2");

	err1.innerHTML = "";
	err2.innerHTML = "";

	const firstname = pForm.fname.value;
	const lastname = pForm.lname.value;

	let flag = true;

	if (firstname === "") {
		err1.innerHTML = "Firstname cannot be empty";
		flag = false;
	}
	if (lastname === "") {
		err2.innerHTML = "Lastname cannot be empty";
		flag = false;
	}

	if (flag) {
		const actionURL = pForm.action;
		const actionMethod = pForm.method;

		let xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById("msg").innerHTML = this.responseText;
		}
		xhttp.open(actionMethod, actionURL);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("fname=" + firstname + "&lname=" + lastname);
	}
}