import './bootstrap';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.editor').forEach((editorElement) => {
        ClassicEditor
            .create(editorElement)
            .then(editor => {
                // ini penting supaya value ikut ke POST
                editor.model.document.on('change:data', () => {
                    editorElement.value = editor.getData();
                });
            })
            .catch(error => {
                console.error('CKEditor error:', error);
            });
    });
});
