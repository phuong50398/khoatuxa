function success(mess) {
	toastr.options.showMethod = 'slideDown';
	toastr.options.hideMethod = 'slideUp';
	toastr.options.closeMethod = 'slideUp';
	toastr.options.timeOut = 2500;
	
	toastr.success(mess);
}
function warning(mess) {
	toastr.options.showMethod = 'slideDown';
	toastr.options.hideMethod = 'slideUp';
	toastr.options.closeMethod = 'slideUp';
	toastr.options.timeOut = 2500;
	
	toastr.warning(mess);
}
function error(mess) {
	toastr.options.showMethod = 'slideDown';
	toastr.options.hideMethod = 'slideUp';
	toastr.options.closeMethod = 'slideUp';
	toastr.options.timeOut = 2500;
	toastr.error(mess);
}