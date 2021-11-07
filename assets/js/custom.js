$('input[name="photo"]').change(function(e){
    let image=(URL.createObjectURL(e.target.files[0]));
    $('#load').attr('src',image);
});