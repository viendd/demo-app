var JS = (function (jQuery){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let modalConfirmDelete = function (id, url, type, dataType = 'json'){
        Swal.fire({
            title: 'Bạn có muốn xóa không?',
            text: "Bạn có chắc chắn muốn xóa không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có'
        }).then((result) => {
            if (result.isConfirmed) {
                callAjaxWithOutFormData(url, type, {id : id}, dataType)
                    .done(function (res){
                        if(res.code === 200){
                            Swal.fire(
                                'Đã xóa thành công!', "", "success"
                            )
                            $('.swal2-actions .swal2-confirm').click(function (){
                              location.reload();
                            })
                        }
                        if(res.code === 404){
                            Swal.fire(
                                'Not found!',
                                'Fail',
                                'error'
                            )
                        }

                        if (res.code === 400){
                            Swal.fire(res.message, "", 'error')
                        }

                    })

            }
        })
    }

    let callAjaxWithOutFormData = function (url,type, data, dataType = 'json'){
        return $.ajax({
            type : type,
            url: url,
            datatype: dataType,
            data : data,
        })
    }

    return {
        modalConfirmDelete,
        callAjaxWithOutFormData
    }
})($);
