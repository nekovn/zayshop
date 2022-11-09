
class Toaster {
    static showSuccess(message) {
        toastr.success(message);
    }

    static showError(message) {
        toastr.error(message);
    }

}
export {Toaster}
