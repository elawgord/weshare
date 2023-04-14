// document ready - виконання коду тільки після завантаження всіх елементів сторінки (кнопки, форми і т.д.)
$(document).ready(function() {
	// $('#target') - звернення до елемента (id, class, form, etc). в даному випадку звернення до всіх елементів form, які є на сайті.
	$('form').submit(function(event) {
		var json;
		// event.prevent - відключення відправи форми з браузера
		event.preventDefault();
		// alert('відправка форми');

		// Сам запрос ajax
		$.ajax({
			// Звернення до атрибутів "method" i "action"
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			// Не передавати ніяких заголовків в контенті
			contentType: false,
			// Відключення кешування
			cache: false,
			// Щоб дані не перетворювались в рядок
			processData: false,
			// Вивід результату
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
			},
		});
	});
});