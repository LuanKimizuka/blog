<?php

function insert (string $entidade, array $dados) : string
{
    $instrução = "insert into {$entidade}";

    $campos = implode (', ', array_keys ($dados));
    $valores = implode (', ', array_values ($dados));

    $instrucao .= " ({$campos})";
    $instrucao .= " values ({$valores})";

    return $instrucao;
}

function update (string $entidade, array $criterio = []) : string
{
        $instrucao = "update {$entidade}";

        foreach($dados as $campo => $dados){
            $set[] = "{$campo} = {$dados}"; 
        }

        $instrucao .= ' set ' . implode(',',$set);

        if (!empty($criterio)){
            $instrucao .= ' where ';

        foreach(!empty($criterio as $expressao){
                $intrucao .= ' '. implode(' ', $expressao);
        }
    }
    
    return $instrucao;
}

function delete (string $entidade, array $criterio = []) : string
{
        $instrucao  = "delete {$entidade}";

        if(!empty ($criterio)){
            $instrucao .= ' where ';

        foreach ($criterio as $expressao){
            $intrucao .= ' '. implode(' ', $expressao);
        }
    }

    return $instrucao;
}

function select (string $entidade, array $campos, array $criterio = [],
string $ordem = null) : string
{
    $instrucao = "select " . implode(',' ,$campos);
    $instrucao .= " FROM {$entidade}";

    if(!empty($criteiro)){
        $instrucao  .= ' where ';

        foreach ($criterio as  $expressao){
            $instrucao .= '  ' . implode (' ', $expressao);
        }
    }

    if(!empty($ordem)){
        $instrucao  .= " order by ordem ";
    }

    return $intrucao;
}
?>