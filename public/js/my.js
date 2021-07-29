$(document).ready(function () {
    // $(selector).action();
    $('#icon-eye-password').click(function () {
        let typeVale = $('#inputPassword').attr('type')
        typeVale = (typeVale === 'password') ? 'text' : 'password';
        $('#inputPassword').attr('type', typeVale);
        let classIconEye = (typeVale === 'password') ? 'fas fa-eye-slash' : 'fas fa-eye';
        // xoa class phan tu co id = #icon-eye
        $('#icon-eye').removeClass();
        // them moi class
        $('#icon-eye').addClass(classIconEye);
    });

    // $('.user-item').hover(function () {
    //     $(this).css('background-color', 'red').css('color','black')
    // }, function () {
    //     $(this).css('background-color', 'white')
    // })

    $('.delete-user').click(function (){
        if (confirm('Are you sure?')) {
            let idUser = $(this).attr('data-id');
            let origin = window.location.origin // http://localhost:8000
            // goi jquery ajax
            $.ajax({
                // url request duoc gui den
                url: origin + '/admin/users/' + idUser + '/delete',
                // method request
                method: 'GET',
                //kieu du lieu tra ve
                type: 'json',
                // neu co du lieu gui kem - form
                /*
                data: {
                   key: value
                }
                 */
                //xu ly ajax goi thanh cong
                success: function (res) {
                    //xu ly du lieu ajax tra ve
                    $('#user-' + idUser).remove();
                },
                //xu ly ajax that bai
                error: function (error) {
                    alert('error')
                }
            })
        }


    })
})
