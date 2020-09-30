<!-- Initialize Quill editor -->
var toolbarOptions = [
    ['bold', 'italic', 'underline'],        // toggled buttons
    ['blockquote'],
    ['link', 'image'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],
    ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Type your content here...',
    theme: 'snow'
});
// Quill.import()

var myLinkHandler = function(value) {
    if (value) {
        var href = prompt('Enter the URL');
        this.quill.format('link', href);
    } else {
        this.quill.format('link', false);
    }
};
var toolbar = quill.getModule('toolbar');
toolbar.addHandler('link', myLinkHandler);

//Initial Content
if(editor_content !== '' && editor_content !== null){
    function htmlDecode(input){
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes[0].nodeValue;
    }
    quill.root.innerHTML = htmlDecode(editor_content);
}

/*
Quill editor ends here
 */

/**
 * Copy and Paste event
 */
quill.clipboard.addMatcher(Node.TEXT_NODE, function(node, delta) {
    if (typeof(node.data) !== 'string') {
        console.log('not text!');
        return;
    }

    let formats = {
        'link': false,
        'bold': false,
        'font': false,
        'italic': false,
        'size': false,
        'strike': false,
        'indent': false,
        'list': false,
        'direction': false,
        'align': false
    };

    let ops = [];
    ops.push({ insert: node.data, attributes: formats });

    delta.ops = ops;

    return delta;
});