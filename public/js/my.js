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
        if (confirm("Are you sure?")) {
            let idUser = $('.delete-user').attr('data-id');
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/users/' + idUser + '/delete',
                method: "GET",
                type: 'json',
                success: function (res) {
                    $('#user-' + idUser).remove();
                }
            })
        }
    })

    $('#show-name').change(function (){
        $('.name-user').toggle();
    });
})
