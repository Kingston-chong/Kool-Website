const fileData = {
    shortener: [],
    pdf: [],
    ppt: null,
    images: []
};

// File upload handlers
document.getElementById('shortenerFile').addEventListener('change', (e) => {
    handleFiles(e.target.files, 'shortener', 'shortenerFiles');
});

document.getElementById('pdfFile').addEventListener('change', (e) => {
    handleFiles(e.target.files, 'pdf', 'pdfFiles');
});

document.getElementById('pptFile').addEventListener('change', (e) => {
    handleFiles([e.target.files[0]], 'ppt', 'pptFiles', true);
});

document.getElementById('imagesFile').addEventListener('change', (e) => {
    handleFiles(e.target.files, 'images', 'imageFiles');
});

// Drag and drop
['shortenerUpload', 'pdfUpload', 'pptUpload', 'imagesUpload'].forEach(id => {
    const elem = document.getElementById(id);
    elem.addEventListener('dragover', (e) => {
        e.preventDefault();
        elem.classList.add('dragover');
    });
    elem.addEventListener('dragleave', () => {
        elem.classList.remove('dragover');
    });
    elem.addEventListener('drop', (e) => {
        e.preventDefault();
        elem.classList.remove('dragover');
        const fileInput = elem.onclick.toString().match(/getElementById\('(.+?)'\)/)[1];
        const type = id.replace('Upload', '');
        const listId = type + (type === 'images' ? 'Files' : type === 'ppt' ? 'Files' : 'Files');
        handleFiles(e.dataTransfer.files, type === 'shortener' ? 'shortener' : type === 'pdf' ? 'pdf' : type === 'ppt' ? 'ppt' : 'images', listId, type === 'ppt');
    });
});

function handleFiles(files, type, listId, single = false) {
    const fileList = document.getElementById(listId);
    
    if (single && files.length > 0) {
        fileData[type] = files[0];
        fileList.innerHTML = `
            <div class="file-item">
                <span class="file-name">📎 ${files[0].name}</span>
                <button class="remove-btn" onclick="removeFile('${type}', '${listId}')">Remove</button>
            </div>
        `;
    } else {
        Array.from(files).forEach(file => {
            fileData[type].push(file);
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item';
            fileItem.innerHTML = `
                <span class="file-name">📎 ${file.name}</span>
                <button class="remove-btn" onclick="removeFile('${type}', '${listId}', '${file.name}')">Remove</button>
            `;
            fileList.appendChild(fileItem);
        });
    }
}

function removeFile(type, listId, filename = null) {
    if (filename) {
        fileData[type] = fileData[type].filter(f => f.name !== filename);
    } else {
        fileData[type] = type === 'ppt' ? null : [];
    }
    
    const fileList = document.getElementById(listId);
    if (filename) {
        Array.from(fileList.children).forEach(child => {
            if (child.textContent.includes(filename)) {
                child.remove();
            }
        });
    } else {
        fileList.innerHTML = '';
    }
}

function updateRangeValue(range) {
    const values = ['Light', 'Medium', 'Heavy'];
    range.nextElementSibling.textContent = values[range.value - 1];
}

function processShortener() {
    const status = document.getElementById('shortenerStatus');
    if (fileData.shortener.length === 0) {
        alert('Please upload at least one file');
        return;
    }
    
    status.className = 'status-message processing';
    status.textContent = '⏳ Processing your slides...';
    
    setTimeout(() => {
        status.className = 'status-message success';
        status.textContent = `✅ Successfully shortened ${fileData.shortener.length} presentation(s)! Download ready.`;
    }, 2000);
}

function processPdfToPpt() {
    const status = document.getElementById('pdfStatus');
    if (fileData.pdf.length === 0) {
        alert('Please upload at least one PDF file');
        return;
    }
    
    status.className = 'status-message processing';
    status.textContent = '⏳ Converting PDF to PowerPoint...';
    
    setTimeout(() => {
        status.className = 'status-message success';
        status.textContent = `✅ Successfully converted ${fileData.pdf.length} PDF(s) to PowerPoint! Download ready.`;
    }, 2500);
}

function processPptImprover() {
    const status = document.getElementById('improverStatus');
    if (!fileData.ppt || fileData.images.length === 0) {
        alert('Please upload both a presentation and images');
        return;
    }
    
    status.className = 'status-message processing';
    status.textContent = '⏳ Matching images to slides...';
    
    setTimeout(() => {
        status.className = 'status-message success';
        status.textContent = `✅ Successfully enhanced presentation with ${fileData.images.length} image(s)! Download ready.`;
    }, 2200);
}


