const checkFormatFileImage = (file) => {
    let fileName = file.name;
    let type = file.type;

    if (fileName.lastIndexOf(".") === -1) {
        return false;
    }
    if (
        type.lastIndexOf("png") !== -1 ||
        type.lastIndexOf("jpeg") !== -1 ||
        type.lastIndexOf("jpg") !== -1
    ) {
        return true;
    }

    return false;
};

export {
    checkFormatFileImage
}
