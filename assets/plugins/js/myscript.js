const flashData = $('.flash-data').data('flashdata');
const notif = $('.notif').data('flashdata');
const notif_gagal = $('.notif-gagal').data('flashdata');
const notif_logout = $('.notif-logout').data('flashdata');
const error = $('.error').data('flashdata');

if (flashData) {
	swal({
		title: 'Data',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

if (notif) {
	swal("Selamat Datang", "Sistem Informasi Polling BEM", "success");
}

if (notif_gagal) {
	swal("Gagal", "NPM atau password tidak ditemukan!", "warning");
}

if (notif_logout) {
	swal("Logout", "Berhasil", "success");
}
if (error) {
	swal("Error", "Data Not Found", "warning");
}
