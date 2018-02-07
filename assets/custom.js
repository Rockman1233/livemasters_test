
/** Редактирование
 * 
 *  
 */    

jQuery(function($) {
	$(document).on('click', '.js-submit', {}, function() {
		var id = $(this).attr('data-id');
		var msg = $('#row-' + id + ' :input').serialize();
		$.ajax({
			type: 'POST',
			url: 'submitform',
			data: msg,
			dataType: 'json',
			}).done(function(respose) {
			if (!respose.isError) {
				alert('Данные обновлены');
			} else {
				alert('Возникла ошибка при обновлении');
			}
		});
	});

	$(document).on('click', '.js-delete', {}, function () {
		var id = $(this).attr('data-id');
		$.ajax({
			url: 'deleteline',
			type: 'POST',
			data: {'delete_line_with_id': id},
			success: function () {
				$('[data-id =' + id + ']').hide();
				alert("Задание удалено");
			}
		});
	});

});



/**
 * 
 * Удаление строки
 */




/**
 * 
 * Добавить строку
 */
    
function call() {
        var msg   = $('#formOfNewRow').serialize();
        $.ajax({
            type: 'POST',
            url: 'addnew',
            data: msg,
            success: function(){  
            $.ajax({  
                url: "projects",  
                cache: false,  
                success: function(data){  
                    var $response=$(data);
					var freshTable = $response.find('#content-tabel').html();
					$("#content-tabel").html(freshTable);
					$('#formOfNewRow')[0].reset();
					//Переинициализация datepicker
					$('.datetimepicker1').datepicker({
						locale: 'ru',
						format: 'yyyy-mm-dd',
						autoclose: true
						//minDate: Date()
					});
					$('.datetimepicker2').datepicker({
						locale: 'ru',
						format: 'yyyy-mm-dd',
						autoclose: true
						//minDate: Date()
					});
					
                }  
            });  
        }  
        });
    }
    
  	
    
/**
 * 
 * Изменить имя проекта (Основные модели)
 */  

function editName() {
        var msg   = $('.newName').serialize();
        $.ajax({
            type: 'POST',
            url: 'projname',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }

/**
 * 
 * Изменить имя сотрудника (Основные модели)
 */  

function editWorker() {
        var msg   = $('.newWorker').serialize();
        $.ajax({
            type: 'POST',
            url: 'workername',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
 
/**
 * 
 * Изменить навзание должности (Основные модели)
 */  

function editRole() {
        var msg   = $('.newRole').serialize();
        $.ajax({
            type: 'POST',
            url: 'rolename',
            data: msg,
            success: function() {
                window.location.reload();
            }

        });
    }
    
/**
 * 
 * Туглы (Основные модели)
 */

    $(document).ready(function() {
        $('#card-1').hover(function(e) {
            e.preventDefault();
            $(".hide-when-unhover-one").toggle(500);
        })
    });

    $(document).ready(function() {
        $('#card-2').hover(function(e) {
            e.preventDefault();
            $(".hide-when-unhover-two").toggle(500);
        })
    });

    $(document).ready(function() {
        $('#card-3').hover(function(e) {
            e.preventDefault();
            $(".hide-when-unhover-three").toggle(500);
        })
    });
    
/**
 * DataPicker
 */    

$(function () {
        $('.datetimepicker1').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });
    
$(function () {
        $('.datetimepicker2').datepicker({
            locale: 'ru',
            format: 'yyyy-mm-dd',
            autoclose: true
            //minDate: Date()
        });
    });

    