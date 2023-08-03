const flashData = $(".flash-data").data("flashdata");
const warningData = $(".er-data").data("erdata");
const notifData = $(".nt-data").data("ntdata");
const textData = $(".nt-data").data("txtdata");

if (flashData) {
	Swal.fire({
		icon: "success",
		title: flashData,
		showConfirmButton: false,
		timer: 1500,
	});
} else if (warningData) {
	Swal.fire({
		icon: "error",
		title: warningData,
	});
} else if (notifData) {
	Swal.fire({
		icon: "info",
		title: notifData,
		text: textData,
	});
}
