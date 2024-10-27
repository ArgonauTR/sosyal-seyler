</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    // Quill editörünü başlatma
    const quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: {
                container: [
                    [{
                        'header': [2, 3, false]
                    }],
                    ['bold', 'link', {
                        'list': 'ordered'
                    }],
                    ['image']
                ],
                handlers: {
                    'image': imageHandler
                }
            }
        }
    });


    // Resim yükleme işlemi için handler fonksiyonu
    function imageHandler() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = () => {
            const file = input.files[0];
            if (/^image\//.test(file.type)) {
                saveImage(file);
            } else {
                console.warn('Yüklenen dosya bir resim değil.');
            }
        };
    }

    // Resmi sunucuya yükleme ve editöre ekleme
    function saveImage(file) {
        const formData = new FormData();
        formData.append('upload', file);

        // Axios ile resmi yükleme
        axios.post('../functions/upload.php', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                const range = quill.getSelection();
                quill.insertEmbed(range.index, 'image', response.data.url);

                // Eklenen imgeye class="img-fluid" ekle
                setTimeout(() => {
                    const img = document.querySelector(`img[src="${response.data.url}"]`);
                    if (img) {
                        img.classList.add('img-fluid');
                    }
                }, 100); // Zamanlayıcı, imgenin DOM'a eklenmesini beklemek için
            })
            .catch(error => {
                console.error('Resim yüklenirken bir hata oluştu:', error);
            });
    }

    const form = document.getElementById('postForm');
    form.onsubmit = function() {
        const content = quill.root.innerHTML;
        document.getElementById('editorContent').value = content;
        return true;
    };
</script>

</body>

</html>