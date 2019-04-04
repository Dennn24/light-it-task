<?php

namespace application\lib;
class Encoder
{

    public $arabian_numbers = [1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000];
    public $roman_numbers = ["I", "IV", "V", "IX", "X", "XL", "L", "XC", "C", "CD", "D", "CM", "M"];
    public $input_value;
    public $result = '';

    public function __construct($input_value)
    {
        $this->input_value = $input_value;
    }

    public function encode()
    {
        //проверка арабские или римские
        if (is_numeric($this->input_value)) {//если арабские
            $this->toRomain();
        } else {//если римские
            $this->toArabian();
        }
        return $this->result;

    }

    public function toRomain()
    {

        $index = count($this->arabian_numbers) - 1;
        while ($this->input_value > 0) {
            if ($this->input_value >= $this->arabian_numbers[$index]) {
                $this->result = $this->result . $this->roman_numbers[$index];
                $this->input_value -= $this->arabian_numbers[$index];
            } else {
                $index--;
            }
        }
    }

    public function toArabian()
    {
        $this->input_value = strtoupper($this->input_value);
        $index = count($this->arabian_numbers) - 1;
        $this->result = 0;
        $position = 0;

        while ($index >= 0 && $position < strlen($this->input_value)) {
            if (substr($this->input_value, $position, strlen($this->roman_numbers[$index])) == $this->roman_numbers[$index]) {
                $this->result += $this->arabian_numbers[$index];
                $position += strlen($this->roman_numbers[$index]);
            } else {
                $index--;
            }
        }
    }

}