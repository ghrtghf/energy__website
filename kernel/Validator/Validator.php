<?php

namespace App\Kernel\Validator;

//класс для работы с валидацией
class Validator implements ValidatorInterface
{
    //создаем пустой массив с ошибками
    private array $errors = [];

    //создаем массив с данными
    private array $data;

    //функция для валидирования
    //принимает данные и правила
    public function validate(array $data, array $rules): bool
    {
        //вызываем созданные массивы
        $this->errors = [];
        //записываем данные в массив
        $this->data = $data;

        //перебираем массив с правилами
        foreach ($rules as $key => $rule){
            $rules = $rule;

            //перебираем правила
            foreach ($rules as $rule){
                
                //разбиваем правила на имя и значение по двоеточию
                $rule = explode(':', $rule);

                //разделяем из массива имя и значение если оно есть
                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                //вызываем функцию валидации
                $error = $this->validateRule($key, $ruleName, $ruleValue);

                //если в функции валидации есть ошибка то записываем ее в массив
                if($error){
                    $this->errors[$key][] = $error;
                }
            }
        }
        
        //если значение не пусто возвращаем массив с ошибками
        return empty($this->errors);
    }

    //функция для отправки результата валидации
    public function errors(): array
    {
        return $this->errors;
    }

    //функция с правилами валидации
    //принимаем значение валидируемой строки наименование валидации и значение валидации если оно есть
    private function validateRule(string $key, string $ruleName, $ruleValue = null): string|false
    {
        //получаем содержание валидируемой строки
       $value = $this->data[$key];

       //проверяем название валидации
       switch ($ruleName) {
        //если валидация required
        case 'required':
            //проверяем значение на пустоту
            if(empty($value)){
                return "Field $key is required";
            }

            break;
        //если валидация min
        case 'min':
            //проверяем длину строки на минимальное значение
            if(strlen($value)<$ruleValue){
                return "Field $key must be at least $ruleValue characters long";
            }
            break;
        //если валидация max
        case 'max':
            //проверяем длину строки на максимальное значение
            if(strlen($value)>$ruleValue){
                return "Field $key must be at most $ruleValue characters long";
            }
            break;
        //если валидация email
        case 'email':
            //проверяем значение на соответствие формату email
            if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
                return "Field $key must be a valid email address";
            }
            break;
       }
       //если ни одно значение не прошло проверку возвращаем false
       return false;
    }
}
    