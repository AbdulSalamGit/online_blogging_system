function form_validation() {
    var error 		= true;
    var fname 		= document.getElementById("name").value;
    var lname 		= document.getElementById("lname").value;
    var email 		= document.getElementById("email").value;
    var password 	= document.getElementById("password").value;
    var dob 		= document.getElementById("dob").value;
    var image 		= document.getElementById("image").value;
    var gender 		= document.getElementById("gender").value;

    // Patterns
    var name_patt 		= /^[A-z]{1,}$/;
    var lname_patt 		= /^[A-z]{1,}$/;
    var email_patt 		= /^[A-z0-9@.#$%_]{5,30}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/;
    var password_patt 	= /^[A-z0-9@.#$%_]{5,20}$/;
    var dob_patt 		= /^\d{4}-\d{2}-\d{2}$/; // YYYY-MM-DD format
    

    // Validation checks
    var fname_res 		= name_patt.test(fname);
    var lname_res 		= lname_patt.test(lname);
    var email_res 		= email_patt.test(email);
    var password_res 	= password_patt.test(password);
    var dob_res 		= dob_patt.test(dob);
    var image_res 		= image_patt.test(image);

    if (fname === "") {
        error = false;
        document.getElementById("name_msg").innerHTML = "<span>Please fill this field</span>";
    } else if (!fname_res) {
        error = false;
        document.getElementById("name_msg").innerHTML = "<span>Invalid name format</span>";
    } else {
        document.getElementById("name_msg").innerHTML = "";
    }

    if (lname === "") {
        error = false;
        document.getElementById("lname_msg").innerHTML = "<span>Please fill this field</span>";
    } else if (!lname_res) {
        error = false;
        document.getElementById("lname_msg").innerHTML = "<span>Invalid last name format</span>";
    } else {
        document.getElementById("lname_msg").innerHTML = "";
    }

    if (email === "") {
        error = false;
        document.getElementById("email_msg").innerHTML = "<span>Please fill this field</span>";
    } else if (!email_res) {
        error = false;
        document.getElementById("email_msg").innerHTML = "<span>Invalid email format</span>";
    } else {
        document.getElementById("email_msg").innerHTML = "";
    }

    if (password === "") {
        error = false;
        document.getElementById("password_msg").innerHTML = "<span>Please fill this field</span>";
    } else if (!password_res) {
        error = false;
        document.getElementById("password_msg").innerHTML = "<span>Invalid password format</span>";
    } else {
        document.getElementById("password_msg").innerHTML = "";
    }

    if (dob === "") {
        error = false;
        document.getElementById("dob_msg").innerHTML = "<span>Please fill this field</span>";
    } else if (!dob_res) {
        error = false;
        document.getElementById("dob_msg").innerHTML = "<span>Invalid date format</span>";
    } else {
        document.getElementById("dob_msg").innerHTML = "";
    }

    if (gender === "Choose...") {
        error = false;
        document.getElementById("gender_msg").innerHTML = "<span>Please select a gender</span>";
    } else {
        document.getElementById("gender_msg").innerHTML = "";
    }

    if (image === "") {
        error = false;
        document.getElementById("image_msg").innerHTML = "<span>Please upload an image</span>";
    } else {
        document.getElementById("image_msg").innerHTML = "";
    }

    return error;
}
