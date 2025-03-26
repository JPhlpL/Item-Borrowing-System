n =  new Date();
var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; // Store month names in array
y = n.getFullYear();
m = months[n.getMonth()];
d = n.getDate();
document.getElementById("date").innerHTML = m + " " + d + ", " + y;