<?php
/*
 * Анонс #121. cAPS LOCK
 * Задача: дана строка (кодировка ASCII), состоящая из латинских букв, цифр и спец.символов (пробел, дефис, восклиц.знаки, запятая, точка).
 * Необходимо перевести регистр букв на обратный.
 * Пример: str = "cAPS LOCK"
 * Answer = "Caps lock"
 */

$str = "cAPS LOCK";
echo ucfirst(strtolower($str));