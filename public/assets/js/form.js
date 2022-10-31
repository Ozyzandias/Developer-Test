document.getElementById('btn-file').addEventListener('click', function() {
    document.getElementById("upfile").click();
});

function fileInputRep(obj) {
    var fileInputBtn = obj.value;
    var fileName = fileInputBtn.split("\\");
    document.getElementById("btn-file").innerHTML = 'EDIT';
    event.preventDefault();
}
document.getElementById('upfile').addEventListener('change', (e) => {
    const file = e.target.files[0];
    let fileReader = new FileReader();
    fileReader.readAsDataURL(file);
    fileReader.onload = function() {
        document.getElementById('previmg').setAttribute('src', fileReader.result);
    }
});