import './bootstrap';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import EasyImage from '@ckeditor/ckeditor5-easy-image/src/easyimage';

ClassicEditor
    .create(document.querySelector('#editor'), {
        plugins: [EasyImage],
        toolbar: ['easyImage', '|', 'undo', 'redo']
    })
    .then(editor => {
        console.log('Editor was initialized', editor);
    })
    .catch(error => {
        console.error(error.stack);
    });
