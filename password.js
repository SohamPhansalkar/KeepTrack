const password = "alpha";

var userInput = prompt("Password: ");

if (userInput != password) {
    alert("Invalid Password!");
    location.reload();
}