document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('uploadModal').classList.add('modal-active');
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('uploadModal').classList.remove('modal-active');
});

document.getElementById('dropZone').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    const files = event.target.files;
    handleFiles(files);
});

document.getElementById('dropZone').addEventListener('dragover', function(event) {
    event.preventDefault();
    event.stopPropagation();
    this.classList.add('border-blue-500');
});

document.getElementById('dropZone').addEventListener('dragleave', function(event) {
    event.preventDefault();
    event.stopPropagation();
    this.classList.remove('border-blue-500');
});

document.getElementById('dropZone').addEventListener('drop', function(event) {
    event.preventDefault();
    event.stopPropagation();
    this.classList.remove('border-blue-500');
    const files = event.dataTransfer.files;
    handleFiles(files);
});

function handleFiles(files) {
    for (let i = 0; i < files.length; i++) {
        console.log('File uploaded:', files[i].name);
        // Add your file handling logic here
    }
}
