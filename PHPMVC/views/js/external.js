function isValid(pForm) {

	let fnameErr = document.getElementById("fnameErr");
	let lnameErr = document.getElementById("lnameErr");

	let fname = pForm.fname.value;
	let lname = pForm.lname.value;

	fnameErr.innerHTML = "";
	lnameErr.innerHTML = "";

	let flag = true;

	if (fname === "") {
		fnameErr.innerHTML = "First name can not be empty";
		flag = false;
	}
	if (lname === "") {
		lnameErr.innerHTML = "Last name can not be empty";
		flag = false;
	}

	return flag;
}