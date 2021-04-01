classNameErrorSelect2 = "select2-selection--single";
TimeOutActionNextStore = 2000;
buttonLoadingText = 'لطفا منتظر بمانید....';
buttonTextSweetAlert = "باشه";
textConfirmDelete = "آیا از حذف این مورد اطمینان دارید ؟";
buttonTextConfirm = "بلی";
//for reset modal content and sections
objectId = "";
url = "";


function resetFormInput(elementClick) {
    $(elementClick).closest('form').find('input[type=text],input[type=number],input[type=password],textarea,.hiddenEmpty').val("");
    $(elementClick).closest('form').find('select').val("").trigger("change");
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function startConfig(showProgress = false) {
    $('.help-block').remove();
    $("." + classNameErrorSelect2).css(normalCss);
    $("#progressBar").css('width', 0 + '%');
    $("#progressBar").css('background-color', '#3399ff');
    $("input[type=text],input[type=password],select,textarea").css(normalCss);
    (showProgress) ? $("#progressShow").show() : false;

}

function ajaxStore(e) {
    e.preventDefault();
    var elementClick = $(this);
    startConfig();
    var captionButton = $(elementClick).html();
    $(elementClick).html(' <i class="fa fa-circle-o-notch fa-spin"></i>' + buttonLoadingText);
    if (typeof CKEDITOR != 'undefined') {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
    }
    var data = new FormData($(elementClick).closest('form')[0]);
    data.append('status', $(elementClick).val());
    $.ajax({
        url: $(elementClick).closest('form').attr('action'),
        type: 'POST',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            $(elementClick).html(captionButton)
            resultResponse(response);
            if (elementClick.hasClass('reset-form')) {
                if (objectId != "")
                    getHttpRequestForModal(url, {book_id: objectId}, {size: 'modal-xl'});

            }

        },
        error: function (xhr) {
            $(".ajaxMessage").html("");
            refreshCaptcha();
            $(elementClick).html(captionButton)
            defaultProgress();
            errorForms(xhr);
        }
    });
}

function refreshCaptcha() {
    $.get('/img_captcha', function (response) {
        $('.captcha').html(response);
    });
}

///////////////////////////////////////////////////////////////////////////////result response
function resultResponse(result) {
    switch (parseInt(result.status)) {
        case 200:
            $("#progressBar").css('background-color', "green");
            alertMessage('success', result.msg);
            if ("url" in result && result.url != "") {
                setTimeout(function () {
                    window.location.href = result.url;
                }, TimeOutActionNextStore);
            } else if ("data" in result) {
                $(".showHtml").html(result.data)
            }
            break;
        case 200:
            $(".message-end-warranty").html(result.msg);
            $(".show-message").slideDown(1000);
            break;
        case 422:
            alertMessage('error', result.msg);
            defaultProgress();
            break;
        case 401:
            alertMessage('error', result.msg);
            defaultProgress();
            break;
        case 403:
            alertMessage('error', result.msg);
            defaultProgress();
            break;
        case 500:
            alertMessage('error', result.msg);
            defaultProgress();
            break;
    }

}

///////////////////////////////////////////////////////////////////////////////show message
function alertMessage(typeMessage, message) {
    var messageShow = "";
    switch (typeMessage) {
        case 'success':
            swal({
                title: "",
                text: message,
                icon: "success",
                button: buttonTextSweetAlert,
            });
            break;
        case 'error':
            swal({
                title: "",
                text: message,
                icon: "error",
                button: buttonTextSweetAlert,
            });
            break;
        case 'warning':
            swal({
                title: "",
                text: message,
                icon: "warinig",
                button: buttonTextSweetAlert,
            });
            break;
        case 'alert':
            alert('لطفا منتظر بمانید...')
            break;
    }
    $(".ajaxMessage").html(messageShow);
}

////////////////////////////////////////////////////////////////////////////////default progrees
function defaultProgress() {
    $("#progressBar").css('width', '0');
}

/////////////////////////////////////////////////////////////////////////////////error validation form
function errorForms(xhr) {
    if (xhr.status === 422) {
        alertMessage('error', 'لطفا خطاهای فرم را برطرف نمایید');
        var errorsValidation = JSON.parse(xhr.responseText).errors;
        $.each(errorsValidation, function (key, value) {
            var errArray = key.split('.');
            var getElement = "";
            var errorHtml = "<div class='help-block text-danger'>" + value + "</div>";
            if (typeof errArray[1] === 'undefined') {
                getElement = "[name='" + key + "']";
                showHtmlValidation(getElement, errorHtml)
            } else if (!$.isNumeric(errArray[1])) {
                getElement = "[name='" + (errArray[0] + "[" + errArray[1] + "]']");
                showHtmlValidation(getElement, errorHtml)
            } else if ($.isNumeric(errArray[1])) {
                getElement = "[name^='" + errArray[0] + "']";
                showHtmlValidation(getElement, errorHtml, indexArr = errArray[1])
            }
        });
    }
}

////////////////////////////////////////////////////////////////////////////////show html error validation
function showHtmlValidation(getElement, errorHtml, indexArr = "") {
    if (!$(getElement).hasClass('select2')) {
        if (indexArr != "") {
            $(getElement).eq(indexArr).parent().append(errorHtml);
            $(getElement).eq(indexArr).css(errorCss)
        } else {
            $(getElement).parent().append(errorHtml);
            $(getElement).css(errorCss)
        }
    } else {
        $(getElement).eq(indexArr).parent().append(errorHtml);
        $(getElement).eq(indexArr).parent().find('.' + classNameErrorSelect2).css(errorCss)
    }
}

$(document).on('click', '.timeOutChangePage', function (e) {
    e.preventDefault();
    var hrefLink = $(this).attr('href');
    alertMessage('alert', 'لطفا کمی منتظر بمانید...');
    setTimeout(function () {
        window.location.href = hrefLink;
    }, TimeOutActionNextStore);

});

////////////////////////////////////////////////////////////////////////delete ajax

function ajaxDelete(url, elementDelete) {
    swal({
        title: textConfirmDelete,
        text: "",
        icon: "warning",
        buttons: buttonTextConfirm,
    })
        .then((willDelete) => {
            if (willDelete) {
                var id = elementDelete.closest('tr').attr('data-id');
                var path = url.replace('?', id);
                $.ajax({
                    'url': path,
                    type: 'DELETE',
                    success(response) {
                        swal(response.msg, {
                            icon: "success",
                        });
                        elementDelete.closest('tr').slideUp(1000)
                    }
                });

            }
        });
};

///////////////////////////////////////////////////////////////////////ajax store use
$(document).on('click', '.request-ajax-form', ajaxStore);

////////////////////////////////////////////////////////////////////////http request and get response and put in modal
function getHttpRequestForModal(url, parameter = {}, modalConfig = {}) {
    modalSize = modalConfig.hasOwnProperty('size') ? modalConfig.size : 'modal-lg';
    modalHeader = modalConfig.hasOwnProperty('header') ? modalConfig.header : '';
    createModal({header: modalHeader, size: modalSize});
    $.get(url, parameter, function (response) {
        if (parseInt(response.status) == 200) {
            $(".modal-body").html(response.htmlForModal);
            if ($("#myModal .modal-body").find('.ck-editor').length) {
                CKEDITOR.replace($('.ck-editor').attr('name'), {
                    filebrowserUploadUrl: '/upload_ck'
                });
            }
            $('#myModal').modal({backdrop: 'static', keyboard: false});

            setTimeout(function () {
                $('#myModal').find('.select2').select2()
            }, 1000)
        }

    });


}

/////////////////////////////////////////////////////////////////////////////////modal creator
function createModal(option = {}) {
    modalSize = option.hasOwnProperty('size') ? option.size : 'modal-sm';
    modalHeader = option.hasOwnProperty('header') ? option.header : '';

    if ($("#myModal").length == 0) {
        var modalHtml = '  <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">\n' +
            '        <div class="modal-dialog ' + option.size + '">\n' +
            '            <div class="modal-content">\n' +
            '                <div class="modal-header">\n' +
            '                    <h4 class="modal-title">' + option.header + '</h4>\n' +
            '                </div>\n' +
            '                <div class="modal-body">\n' +
            '                </div>\n' +
            '               <div class="modal-footer">\n' +
            '                  <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>\n' +
            '               </div>' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>';
        $("#createModal").html(modalHtml);
        $("#myModal").modal('toggle');
    } else {
        $("#myModal").find('.modal-dialog').addClass(modalSize);
        $("#myModal").find('.modal-header').html(modalHeader);
        if (!$("#myModal").hasClass("show")) {
            $("#myModal").modal('show');
        }

    }

}

/////////////////////////////////////////////////////////////////////////////////css validation form and create div show error
var errorCss = {"border-width": "1px", "border-color": "#d2322d", "border-style": "solid"}
var normalCss = {"border-width": "1px", "border-color": "#75787D", "border-style": "solid"}

/*--------------------- empty content modal next hide modal -------------------------------*/

/**
 * Set number format
 */
$(document).on('keyup', '.number-format', function () {
    var elementKeyUp = $(this);
    elementKeyUp.val(numberFormat(elementKeyUp.val()))

});
/**
 * Create datepicker for input
 */
$(document).on("focus", ".datepicker", function () {
    $(this).datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        isRTL: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd",
        yearRange: "-50:+0",
        showAnim: 'slideDown',
        showButtonPanel: true,
    });
});

/**
 * @param Number
 * @returns {string}
 */
function numberFormat(Number) {
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    return y + z;
}


