</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   <!-- Include the Quill library -->
   <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    // Initialize Quill editor
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Function to set the content of the hidden input field before form submission
    function setContent() {
        const editorContent = document.getElementById('editorContent');
        editorContent.value = quill.root.innerHTML;
    }

    // Add an event listener to the form
    document.getElementById('postForm').addEventListener('submit', function(event) {
        setContent();
    });
</script>
</body>

</html>