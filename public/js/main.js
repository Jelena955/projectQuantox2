
    const token = $('meta[name="csrf-token"]').attr('content');


function ajax(url, method, data, success, error, dataType = "json", contentType = "application/x-www-form-urlencoded; charset=UTF-8", processData = true) {
    $.ajax({
        url: baseUrl + url,
        method: method,
        data: data,
        dataType: dataType,
        success: success,
        error: error,
        contentType: contentType,
        processData: processData
    })
}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




var form_data = new FormData();
var currentId = null;
var allGenres = [];


function setFormDataForInsert() {
    form_data.set('name', $('#name').val());
    form_data.set('mail', $('#mail').val());
    form_data.set('pib', $('#pib').val());
    form_data.set('idnumber', $('#idnumber').val());
    form_data.set('accountnumber', $('#accountnumber').val());
    form_data.set('city', $('#city').val());
    form_data.set('street', $('#street').val());
    form_data.set('password', $('#password').val());
    form_data.set('passwordagain', $('#passwordagain').val());
    form_data.set('_token', token);
}

function register(){

    setFormDataForInsert();

    ajax(
        `/register`,
        'POST',
        form_data,
        function (data) {
            console.log(data);

        },
        function (data) {
            var errors = data.responseJSON.errors;
            printErrors(errors)





        },
        'json',
        false,
        false
    )

}

    function printErrors(errors) {
        for(error of Object.keys(errors)) {
            console.log(errors[error][0]);
            var nameer=error;
            console.log(nameer)
            var err='<h5 style="color: crimson">'+errors[error][0]+'</h5>'
            $('#'+nameer+'e').append(err)

        }
    }



$(document).on('click', '#register', function (e) {
    e.preventDefault()
    console.log('cfcvfvcf')
    register();
})
