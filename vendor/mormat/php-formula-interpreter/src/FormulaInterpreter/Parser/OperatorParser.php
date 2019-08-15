<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FormulaInterpreter\Parser;

/**
 * Description of FunctionParser
 *
 * @author mathieu
 */
class OperatorParser implements ParserInterface {
    
    /**
     * @var ParserInterface
     */
    protected $operandParser;
    
    function __construct(ParserInterface $operandParser) {
        $this->operandParser = $operandParser;
    }
    
    function parse($expression) {

        $expression = trim($expression);
        
        if ($expression[0] == '(' && substr($expression, -1, 1) == ')') {
            $expression = substr($expression, 1, -1);
        }
        
        if ($this->hasOperator($expression, '+') | $this->hasOperator($expression, '-')) {
            return $this->doSomething($expression, array('+', '-'));
        } elseif ($this->hasOperator($expression, '*') | $this->hasOperator($expression, '/')) {
            return $this->doSomething($expression, array('*', '/'));
        }
        
        throw new ParserException($expression);
        
    }
    
    function hasOperator($expression, $operator) {
        
        $parenthesis = 0;
        
        for ($i = 0; $i < strlen($expression); $i++) {
            switch ($expression[$i]) {
                case $operator:
                    if ($parenthesis == 0) {
                        return true;
                    }
                    break;
                case '(':
                    $parenthesis ++;
                    break;
                case ')':
                    $parenthesis --;
                    break;
            }
        }
        return false;
    }
    
    function doSomething($expression, $operators) {
        $operands = array();
        
        $parenthesis = 0;
        
        $previous = 0;
        $lastOperator = null;
        for ($i = 0; $i < strlen($expression); $i++) {
            
            switch ($expression[$i]) {
                case '(':
                    $parenthesis ++;
                    break;
                case ')';
                    $parenthesis --;
                    break;
                default:
                    if (in_array($expression[$i], $operators) && $parenthesis == 0) {
                        $operands[] = $this->doThat(
                            substr($expression, $previous, $i - $previous), 
                            $lastOperator
                        );
                        $lastOperator = $expression[$i];
                        $i++;
                        $previous = $i;
                    }                    
            }
            
        }
        
        $operands[] = $this->doThat(
                substr($expression, $previous, strlen($expression) - $previous), 
                $lastOperator
        );
        
        $firstOperand = array_shift($operands);
        
        return array(
            'type' => 'operation',
            'firstOperand' => $firstOperand['value'],
            'otherOperands' => $operands
        );
    }
    
    function doThat($value, $operator = null) {
        $machin = array();
        switch ($operator) {
            case '+':
                $machin['operator'] = 'add';
                break;
            case '-':
                $machin['operator'] = 'subtract';
                break;
            case '*':
                $machin['operator'] = 'multiply';
                break;
            case '/':
                $machin['operator'] = 'divide';
                break;
        }
        
        $value = trim($value);
        
        if ($value != '') {
            if ($value[0] == '(' && substr($value, -1, 1) == ')') {
                $value = substr($value, 1, -1);
            }
        }

        if ($value == '') {
            throw new ParserException($value);
        }

        
        $machin['value'] = $this->operandParser->parse($value);
        return $machin;
    }
    
}

?>
