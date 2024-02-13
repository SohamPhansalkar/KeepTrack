const password = "*****";

var userInput = prompt("Password: ");

if (userInput != password) {
    alert("Invalid Password!");
    location.reload();
}
