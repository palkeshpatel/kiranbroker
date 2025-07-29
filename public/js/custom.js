function tinymce_init_callback(editor) {
    editor.remove();
    editor = null;

    tinymce.init({
        selector: 'textarea.richTextBox',
        skin: 'voyager',
        min_height: 100,
        height: 500,
        resize: 'vertical',
        inline_styles: false,
        keep_styles: false,
        font_formats: 'Open Sans, sans-serif',
        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern code',
        
        file_browser_callback: function (field_name, url, type, win) {
            if (type == 'image') {
                $('#upload_file').trigger('click');
            }
        },
        toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code',
        convert_urls: false,
        image_caption: true,
        image_title: true,
		valid_elements : '*[*]',
        //valid_elements: 'b[*],a[*],span[*],div[*],section[*],p[*],ul[*],li[*],ol[*],hr,br,img[*],-b,-i,-u,-h1,-h2,-h3,-h4,-h5,-h6',
        valid_children: '+li[p]'
    });
}