ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: './functions/image-upload.php'
        },
        toolbar: {
            items: [
                'bold', 'numberedList', 'link', 'imageUpload'
            ]
        },
        language: 'tr',
        mediaEmbed: {
            previewsInData: true
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

function validateForm() {
    var textareaValue = document.getElementById("editor").value.trim();
}

const form = document.getElementById('myForm');
const name = document.getElementById('editor');
const error = document.getElementById('error');

form.addEventListener('submit', (e) => {
    if (name.value.trim() === "") {
        e.preventDefault();
        error.textContent = "Bu alan boş bırakılamaz.";
    }
});