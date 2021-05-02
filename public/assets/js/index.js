$('#file-input').on('change', (e) => {
    let file = e.target.files[0];
    $('#file-input-label').html(file.name);
})