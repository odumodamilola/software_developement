<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Component</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN for icons (optional) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        /* Custom styles to enhance the popup */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            position: relative;
            margin: 15% auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            width: 50%;
        }
        .file-drop-zone {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .file-drop-zone.dragover {
            border-color: #34D399;
            background-color: #D1FAE5;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Upload Button -->
    <button id="uploadBtn" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none">
        Upload File
    </button>

    <!-- Modal for File Upload -->
    <div id="uploadModal" class="modal flex items-center justify-center">
        <div class="modal-content max-w-2xl w-full">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">Upload Your File</h2>
                <button id="closeModalBtn" class="text-xl font-bold text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- File Upload Area -->
            <div class="file-drop-zone" id="fileDropZone">
                <p class="text-gray-500 mb-4">Drag and drop your file here or</p>
                <label for="fileInput" class="bg-green-500 text-white px-6 py-2 rounded-md cursor-pointer hover:bg-green-600">
                    Click to Select a File
                </label>
                <input id="fileInput" type="file" class="hidden" />
            </div>

            <div class="mt-6">
                <button id="uploadFileBtn" class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-green-700 focus:outline-none disabled:opacity-50" disabled>
                    Upload
                </button>
            </div>
        </div>
    </div>

    <script>
        // Show the upload modal
        document.getElementById('uploadBtn').addEventListener('click', function() {
            document.getElementById('uploadModal').style.display = 'flex';
        });

        // Close the upload modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('uploadModal').style.display = 'none';
        });

        // Handle drag events
        const fileDropZone = document.getElementById('fileDropZone');
        fileDropZone.addEventListener('dragover', function(event) {
            event.preventDefault();
            fileDropZone.classList.add('dragover');
        });
        fileDropZone.addEventListener('dragleave', function() {
            fileDropZone.classList.remove('dragover');
        });
        fileDropZone.addEventListener('drop', function(event) {
            event.preventDefault();
            fileDropZone.classList.remove('dragover');
            handleFileUpload(event.dataTransfer.files[0]);
        });

        // Handle file input selection
        document.getElementById('fileInput').addEventListener('change', function(event) {
            handleFileUpload(event.target.files[0]);
        });

        // Handle the file upload process
        function handleFileUpload(file) {
            if (file) {
                document.getElementById('uploadFileBtn').disabled = false;
                document.getElementById('uploadFileBtn').innerText = `Ready to upload: ${file.name}`;
            } else {
                document.getElementById('uploadFileBtn').disabled = true;
            }
        }

        // Simulate the file upload on button click
        document.getElementById('uploadFileBtn').addEventListener('click', function() {
            const fileInput = document.getElementById('fileInput');
            if (fileInput.files.length > 0) {
                alert(`File "${fileInput.files[0].name}" uploaded successfully!`);
                document.getElementById('uploadModal').style.display = 'none';
            }
        });
    </script>

</body>
</html>
