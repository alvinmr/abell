// // Time
// function jam() {
// 	document.getElementById("jam").innerHTML =
// 		"Waktu : " +
// 		moment()
// 			.locale("en-gb")
// 			.format("LTS");

// 	var jamskrng = moment()
// 		.locale("en-gb")
// 		.format("LTS");
// }
// setInterval(jam, 1000);

// Name File Browser
$(".custom-file-input").on("change", function() {
	let fileName = $(this)
		.val()
		.split("\\")
		.pop();
	$(this)
		.next(".custom-file-label")
		.addClass("selected")
		.html(fileName);
});

// Datatables 1
$("#table-1").DataTable({
	ordering: false
});
