var popup_image_row = 1;

function add_popup_image() {
    html = '<article id="popup_image' + popup_image_row + '">';
    
    html += '<div class="form-group">';
    html += '<label class="col-sm-2" for="input-popup-image' + popup_image_row + '">Popup Image&nbsp;&nbsp; img_' + popup_image_row +'</label>';
    html += '<div class="col-sm-10">';
    html += '<div class="img-thumbnail">';
    html += '<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" title="" id="input-popup-image' + popup_image_row + '" class="img-responsive"/>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    html += '<div class="form-group">';
    html += '<label class="col-sm-2"></label>';
    html += '<div class="col-sm-10">';
    html += '<input type="file" name="userfile' + popup_image_row + '" id="file-inputs' + popup_image_row + '">';
    html += '<input type="hidden" id="popup_image_hidden' + popup_image_row + '" name="popup_image['+ popup_image_row +'][image]" value="" />';
    html += '</div>';
    html += '</div>';

    html += '<div class="form-group">';
    html += '<label class="col-sm-2"></label>';
    html += '<div class="col-sm-10">';
    html += '<input type="button" role="button" value="Remove" class="btn btn-danger" onclick="$(\'#popup_image' + popup_image_row + '\').remove();" />';
    html += '</div>';
    html += '</div>';

    html += '</article>';
    
    $('#images section').append(html);
    
    // Add File Selected Name To Hidden Input Value
    $('#file-inputs' + popup_image_row).on('change', function(e) {
        $(this).next().val($(this).val());
    });

    // Preview Image Before Upload
    $('#file-inputs' + popup_image_row).on('change', function(e) {
        $('#input-popup-image' + popup_image_row).attr('src', e.target.result);
    });

    popup_image_row++;
}    