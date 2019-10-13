// requests for the CSRF token and adds a hidden field to the form
function addToken() {
	$.post("/includes/requestToken.php", function(data) {
		var token = document.createElement("INPUT");
		token.setAttribute("type", "hidden");
		token.setAttribute("name", "token");
		token.setAttribute("value", data);
		document.welcome.appendChild(token);
	});
} // end function addToken