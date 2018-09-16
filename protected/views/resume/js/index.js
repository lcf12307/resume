function updateCity() {
    var city_string = oAreaM[$('#province').val()];
    var citys = city_string.split(',');
    $('#city').empty();
    for (var i=0;i<citys.length;i++){
        $('#city').append('<option value="'+ citys[i] +'">'+area[citys[i]]+'</option>')
    }
    $('#ResumeForm_area').val(citys[0]);
}