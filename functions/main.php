<?php
require_once './functions/helper.php';
$action = $_POST['action'] ?? null;

if (!empty($action)) {
    $action();
}

function sendEmail()
{
    $name = clear($_POST['name'] ?? '');
    $phone = clear($_POST['phone'] ?? '');
    $message = clear($_POST['message'] ?? '');


    if (empty($name)) {
        redirect('contacts');
        echo 'Name is required';
    } elseif (empty($phone)) {
        redirect('contacts');
        echo 'phone is required';
    } elseif (empty($message)) {
        redirect('contacts');
        echo 'message is required';
    } else {

        mail('hidclift@gmailcom', 'Mail from site', "$name,$phone, $message");
        echo 'Thank!';
    }
}

function sendEmailCourse()
{
    $name = clear($_POST['name'] ?? ''); 
    $password = clear($_POST['password'] ?? ''); 
    $select_disk = clear($_POST['select_disk'] ?? ''); 

    // Получаем выбранные курсы из POST-запроса
    // Если ни один курс не выбран, создаем пустой массив
    $select_course = isset($_POST['select_course']) ? $_POST['select_course'] : [];

    $select_course_str = ''; // Переменная для хранения строкового представления выбранных курсов
    if (is_array($select_course)) { // Проверяем, что выбранные курсы действительно являются массивом
        $select_course = array_map('clear', $select_course); // Очищаем каждый выбранный курс
        $select_course_str = implode(', ', $select_course); // Создаем строку из выбранных курсов, разделенных запятыми и пробелами
    }

    $delivery_method = clear($_POST['delivery_method'] ?? ''); 
    $delivery_address = clear($_POST['delivery_address'] ?? ''); 

    // Проверяем, что все необходимые поля заполнены
    if (empty($name) || empty($password) || empty($select_disk) || empty($select_course) || empty($delivery_method) || empty($delivery_address)) {
        echo 'All fields are required'; 
        redirect('Course_purchase'); // Перенаправляем пользователя
    } else {
        // Формируем сообщение для отправки по электронной почте
        $message = "Имя: $name\n";
        $message .= "Пароль: $password\n";
        $message .= "Диск: $select_disk\n";
        $message .= "Курс: $select_course_str\n";
        $message .= "Способ доставки: $delivery_method\n";
        $message .= "Адрес: $delivery_address\n";
        
        
        mail('hidclift@gmail.com', 'Mail from site', $message);
        echo '<div class="message">Ваш заказ успешно обработан и отправлен на почту!</div>';
    }
}


