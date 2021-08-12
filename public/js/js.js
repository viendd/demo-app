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

    let formatNumber = function(numberString, item) {
        let numberFormat = numberString.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        item.val(numberFormat)
    }

    let generateQueryStringFilterProduct = function (categories, prices, brands, sizes){
        let arrayComponent = [categories, prices, brands, sizes]
        let arrayStringComponent = ['categories', 'prices', 'brands', 'sizes']
        let query = '';
        arrayComponent.forEach((component, index) => {
            if (component.replace(arrayStringComponent[index] + "=", "")){
                query += (query === "" ? '?' : '&') + component
            }
        })

        return query
    }

    let updateQueryStringParameter =  function (uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
            return uri + separator + key + "=" + value;
        }
    }

    let redirectUrl = function (uri){
        window.location = uri
    }

    return {
        modalConfirmDelete,
        callAjaxWithOutFormData,
        formatNumber,
        generateQueryStringFilterProduct,
        updateQueryStringParameter,
        redirectUrl
    }
})($);
